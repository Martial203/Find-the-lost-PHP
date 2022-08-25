<?php
    if(isset($_GET['sign']) && $_GET['sign'] == 'out'){
        session_start();
        session_destroy();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- <link href="../styles/bootstrap-5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="../styles/bootstrap-5.1.3/dist/js/bootstrap.min.js"></script> -->



    <link rel="stylesheet" href="styles/css/bootstrap.css">
    <link rel="stylesheet" href="../styles/accueil.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Find The Lost</title>
    <link rel="icon" type="image/x-icon" href="../styles/index.jpg">
</head>
<body>
    <main>
        <h1>FIND THE LOST</h1>
        <div>
            <div>Did you lose any item ? Come and check it here !</div>
            <div>Or did you find any lost item ? Post it here, and let's help the owner to find it out !</div>
        </div>
        <div>
            <a class="btn btn-primary" href="sign/sign.php?sign=in">Login</a>
            <a class="btn btn-primary" href="sign/sign.php?sign=up">Sign Up</a>
        </div>
    </main>
</body>
</html>