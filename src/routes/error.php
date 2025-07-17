<html>
<head>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <title>Dream Image viewer</title>
  <link link='preload' href='//fonts.googleapis.com/css2?family=Press+Start+2P&display=swap' rel='stylesheet'>
  <link rel='stylesheet' href='/static/css/main.css' />
</head>
<body>
  <div id='main'>
    <h1 id='title'>Error</h1>
    <div id='error-div'>
    <?php if (isset($_GET['error'])): ?>
      <hr><div class='alert alert-danger'>
        <?= htmlspecialchars($_GET['error']) ?>
        <?php else: ?>
         Error...
      </div>
    <?php endif; ?>
    </div>
  </div>
</body>
</html>