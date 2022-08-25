<?php
    include("BDConnection.php");
    function login($email, $password){
        global $bdd;
        $req = $bdd -> prepare("SELECT * FROM users WHERE email=:email");
        $req -> execute(array(
            "email" => $email
        ));
        $res = $req -> fetch();
        $req -> closeCursor();
        if(password_verify($password, $res['password'])){
            //echo $res['password'];
            
            $_SESSION['isAuth']=true;
            return true;
        } else{
            //echo $res['password'];
            return false;
        }
    }

    function isAuth(){
        global $bdd;
        if(isset($_SESSION['isAuth'])==false){
            header('Location: /ObjectsPerdus/vues/vues/sign/sign.php?sign=in');
        }
    }
?>

