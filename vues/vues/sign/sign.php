<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/css/bootstrap.css">
    <link rel="stylesheet" href="../../styles/accueil.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <main>
    <?php
        if(isset($_GET['sign']) && $_GET['sign'] == "up"){
            include("sign_up/sign_up.php");
        } elseif(isset($_GET['sign']) && $_GET['sign'] == "upValidation"){
            include("sign_up/emailValidation.php");
        }else{
            include("login.php");
        }
    ?>
    </main>
</body>
</html>