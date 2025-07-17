<?php
class AdminController {

    public function check($isAdmin) {
        if($isAdmin) {
            return FLAG;
        }
        else {
             header('Location: /?path=/error');
             exit;
        }
    }

    public function ChangePerm($verifyToken,$admin_verify_token) {
        if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == 'localhost') {
            if (password_verify($verifyToken,$admin_verify_token)) {
                return True;
            }
            else {
                return False;
            }
        }
        else {
            header('Location: /?path=/error');
            exit;
        }
    }
}

class FileModel {
    private $file_name;

    public function __construct($file_name) {
        chdir('/www/uploads');
        $this->file_name = $file_name;
    }

    public function exists() {
        return file_exists($this->file_name);
    }

    public function getContents() {
        return file_get_contents($this->file_name);
    }

    public function getFileName() {
        return $this->file_name;
    }

    public function saveFile($file_name) {
        return file_put_contents($file_name, $this->getContents());
    }
}

class ImageController {

    public function store() {

        if (empty($_FILES['uploadFile']))
        {
            header('Location: /?path=/upload');
            exit;
        }

        $file = $_FILES['uploadFile'];
        $fname = substr(md5(time()),0,7).'.png';

        $image = new ImageModel(new FileModel(urldecode($file['tmp_name'])));

        if (!$image->isValidImage($file['name']))
        {
            header('Location: /?path=/error&error=Only PNG images are supported');
            exit;
        }

        $image->file->saveFile($fname);
        header('Location: /?path=/upload&message='.$fname);
        exit;
        
    }

    public function list() {
        $ignore_list = array('.','..');
        $file_list = array_values(array_diff(scandir('/www/uploads'), $ignore_list));
        return $file_list;
    }

    public function show($path) {

        $image = new ImageModel(new FileModel(urldecode($path)));

        if (!$image->file->exists())
        {
            header('Location: /?path=/error');
            exit;
        }

        if(!($img = $image->getFile())){
            header('Location: /?path=/error');
            exit;
        }
        
        return $img;
    }
}


class ImageModel {
    public $file;

    public function __construct($file) {
        $this->file = $file;
    }

    public function isValidImage() {
 	    $file_name = $this->file->getFileName();	
      	
	    if (mime_content_type($file_name) != 'image/png'){ 
		    return false;
	    }
        return true;
    }

    public function getFile() {
        if (!$this->isValidImage())
        {
            return false;
        }
        return base64_encode($this->file->getContents());
    }

    public function __destruct() {
        if (!empty($this->file))
        {
            $file_name = $this->file->getFileName();
            if (is_null($file_name))
            {
                header('Location: /?path=/error');
                exit;
            }
        }
    }
}

