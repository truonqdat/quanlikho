<?php
require './core/database.php';
require './models/baseModel.php';
require './middleware/SessionMiddleware.php';
require './controllers/baseController.php';

session_start();
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
  <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.28/sweetalert2.all.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cloudinary-jquery/2.13.1/cloudinary-jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.28/sweetalert2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Quản lí kho</title>
</head>

<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  a {
    text-decoration: none;
  }

  html {
    font-family: Arial, Helvetica, sans-serif;
  }
</style>

<body>
  <?php
  if (isset($_GET['controller'])) {
    $controllerName = $_GET['controller'] . 'Controller';
    $actionName = isset($_GET['action']) ? $_GET['action'] : 'index';
    require "./controllers/" . $controllerName . ".php";
    $controlleObject = new $controllerName;
    $controlleObject->$actionName();
  } else {
    require './views/login.php';
  }
  ?>
</body>

</html>