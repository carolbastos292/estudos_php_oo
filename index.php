<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRUD com MVC</title>
</head>
<body>
  <?php
    require './vendor/autoload.php';
    use Core\ConfigController as Home;

    $Url = new Home();
    $Url->carregar();
  ?>

</body>
</html>
