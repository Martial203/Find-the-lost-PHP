<?php
    if(isset($_POST['code'])){
        $code = $_POST['code'];
        if($code == $_SESSION['code']){
            //Register the user and redirect to the welcome page
            include("user.php");
            if(addUser($_SESSION['email'], $_SESSION['password'])){
                header('Location:../bienvenue.php');
            }
        }else{
            //Tell the user that he provided a wrong code
            echo "The code you provided is incorrect, please try again later";
        }
    }else{
        //Don't tell anything to the user
    }
?>