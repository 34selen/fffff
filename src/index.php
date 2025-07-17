<?php define('WEBROOT', '/app'); ?>
<?php define('__MAIN__', 1); ?>
<?php session_start(); ?>
<?php define("FLAG","FLAG{testflag}"); ?>
<?php define("KEY","[SECRET]"); ?>
<?php ini_set('file_uploads', 'On'); ?>
<?php require_once WEBROOT . '/libs/functions.php'; ?>
<?php if (!isset($_COOKIE['PHPSESSID'])) {$_SESSION["admin"] = false;} ?>

<?php

    $admin_verify_token = password_hash(str_repeat("B",70) . KEY, PASSWORD_BCRYPT);
    $routes = ['/img','/upload','/admin','/flag','/info','/view','/list'];

    if($_GET['path'] === '/'){
        require_once WEBROOT . '/routes/main.php';
    }
    else if(in_array($_GET['path'], $routes)){
        require_once WEBROOT . '/routes' . $_GET['path'] . '.php';
    }
    else{
        require_once WEBROOT . '/routes/main.php';
    }
?>
