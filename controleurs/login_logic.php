<?php
    include("user.php");
    include("../../../controleurs/login.php");
    if(isset($_POST['email'])){
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        if(countUsersWith($_SESSION['email']) == 1){
            //Verify the password related to the given mail
            if(login($_SESSION['email'], $_SESSION['password'])){
                //login succed. Then, redirect the user to the item list page
                $_SESSION['isAuth'] = true;
                header('Location: ../items/itemsList/itemsList.php');
            }else{
              //Tell the user that the login has failed, either the password or the email is wrong
                echo "Login failed ! Either the email or the password is wrong.";
            }
        }else{
            //Tell the user that the login has failed, either the password or the email is wrong
            echo "Login failed ! Either the email or the password is wrong.";
        }
    }
?>