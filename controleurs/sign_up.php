<?php
    include("BDConnection.php");
    include("user.php");
    include("sendMail.php");
    if(isset($_POST['email'])){
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        if(countUsersWith($_SESSION['email']) > 0){
            //Tell the user that the choosen email is already used
            echo "Mail adress already used";
        } else{
            $_SESSION['code'] = rand(100000, 999999);
            $subject = "Find The Lost";
            $content = "This is the validation code to confirm your registration on Find The Lost : ".$_SESSION['code'];
            if(sendMailValidationCode($_SESSION['email'], $subject, $content)){
                header('Location: sign.php?sign=upValidation');
            }else{
                //Tell the user that the mail has not been successfully sent
                echo "The mail has not been successfully sent, please try again.";
            }
        }
    }
?>