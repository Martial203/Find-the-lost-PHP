<?php 
    session_start();
    include("../../../../controleurs/getItems.php");
    include("../../../../controleurs/item.php");
    include("../../../../controleurs/login.php");
    include("../../../../controleurs/itemRegistration.php");
    if(isset($_GET['del'])){
        deleteItem($_GET['del']);
    }

    isAuth();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Find the lost</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" type="image/x-icon" href="../../../styles/index.jpg">
</head>
<body>

<div class="container">
  <h2>Find The Lost</h2>
  <!-- <p>To make the tabs toggleable, add the data-toggle="tab" attribute to each link. Then add a .tab-pane class with a unique ID for every tab and wrap them inside a div element with class .tab-content.</p> -->
<div>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Item list</a></li>
    <li><a data-toggle="tab" href="#menu1">Add an item</a></li>
    <li><a data-toggle="tab" href="#menu2">My posts</a></li>
    <li><a data-toggle="tab" href="#menu3">Settings</a></li>
    <li><a data-toggle="tab" href="#menu4">Sign out</a></li>
    <li class="fa fa-align-right" aria-hidden="true">
      <form class="form-inline my-2 my-lg-0" method="get" action="#">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form></li>
    </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active" style="height:100%">
      <h3>Item list</h3>
      <p><?php include("list.php"); ?></p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Add an item</h3>
      <p><?php include("../itemRegistration.php"); ?></p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>My posts</h3>
      <p><?php include("myItems.php"); ?></p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Settings</h3>
      <p><a href="#">Change my email adress</a></p>
      <p><a href="#">Change my password</a></p>
    </div>
    <div id="menu4" class="tab-pane fade">
      <h3>Sign out</h3>
      <p>Do you really want to sign out ?</p>
    <p class="form-group" style="display:flex; flex-direction:row;">
        <p><a href="/ObjectsPerdus/vues/vues/accueil.php?sign=out" class="btn btn-default">YES</a></p>
        <p><a type="button" OnClick="javascript:window.location.reload()"  class="btn btn-default">NO</a></p>
    </p>
    </div>
  </div>
</div>
</body>
</html>
