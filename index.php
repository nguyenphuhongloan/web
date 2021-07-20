<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moza</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="modules/css/base.css">
    <link rel="stylesheet" href="modules/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:300,400,500,700&display=swap&subset=vietnamese"
        rel="stylesheet">
        <script src="modules/JS/validator.js"></script>
        <script src="modules/JS/main.js"></script>
        <script src="modules/JS/jquery.min.js"></script>
    <link rel="stylesheet" href="./modules/font/fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/all.min.css">
</head>
<body>
   <?php
    session_start();
      include("modules/header.php");
      include("modules/content.php");
      include("modules/footer.php");
   ?>
</body>
</html>