<?php
  if(isset($_GET['img'])) {
    $ImageController = new ImageController();
    $image = $ImageController->show($_GET['img']);
  }
?>


<html>
<head>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <title>Dream Image viewer</title>
  <link link='preload' href='//fonts.googleapis.com/css2?family=Press+Start+2P&display=swap' rel='stylesheet'>
  <link rel='stylesheet' href='/static/css/main.css' />
</head>
<body>
  <div id='main'>
    <h1 id='title'>Image Viewer</h1>
    <div id='img-div'>
      <img id='image' src='data:image/png;base64,<?= $image ?>'><br>
    </div>
  </div>
</body>
</html>