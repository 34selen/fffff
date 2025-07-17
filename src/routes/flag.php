<?php
  $Controller = new AdminController();
  $flag = $Controller->check($_SESSION['admin']);
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
    <h1 id='title'>Success~~</h1>
    <div id='flag-div'>
      <span><?= $flag ?></span>
    </div>
  </div>
</body>
</html>