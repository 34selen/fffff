<?php
  $ImageController = new ImageController();
  $file_list = $ImageController->list();
?>

<html>
<head>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <title>Dream Image viewer</title>
  <link link='preload' href='http://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap' rel='stylesheet'>
  <link rel='stylesheet' href='/static/css/main.css' />
</head>
<body>
  <div id='main'>
    <h1 id='title'>Uploads List</h1>
    <div id='list-div'>
        <ul>
        <?php
            foreach ($file_list as $value) {
                echo "<li><a href='/?path=/view&img=" .$value. "'>" .$value. "</a></li><br>";
            }
        ?>
        </ul>
    </div>
  </div>
</body>
</html>