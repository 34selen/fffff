<?php
  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $ImageController = new ImageController();
    $ImageController->store();
  }
?>

<html>
<head>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <title>Dream Image viewer</title>
  <link link='preload' href='//fonts.googleapis.com/css2?family=Press+Start+2P&display=swap' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel='stylesheet' href='/static/css/main.css' />
</head>
<body>
<div id='main' class='container'>
  <br>
  <div id='img-div'>
    <?php if (isset($_GET['message'])): ?>
      <hr><div>
        <?= htmlspecialchars($_GET['message']) ?>
      </div>
    <?php endif; ?>
    <br>
  </div>
  <hr>
  <form action='/?path=/upload' method='POST' enctype='multipart/form-data'>
    <div class='form-group'>
      <div class='row'>
        <div class='col'>
          <label for='upload' id='selectFile' class='btn btn-primary btn-block'>
            Choose File...
          </label>
        </div>
        <div class='col'>
          <button type='submit' class='btn btn-success btn-block'>Upload</button>
        </div>
        <input type='file' name='uploadFile' id='upload' style='display: none;' required>
      </div>
    </div>
  </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/cjs/popper.min.js" integrity="sha512-cccYINs21/woK1lZ16XmqaT6ohTy4BxrsgGrxnU3SEVKQACVUcU6nyPXb4meW0TG9TN9zj7OqaFK3E+ckKtmZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script>
$('#upload').change(function(){
  let path = $(this).val().replace('C:\\fakepath\\', '');
  $('#selectFile').html(path);
})
</script>
</body>
</html>
