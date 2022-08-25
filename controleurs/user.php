<?php
    include("BDConnection.php");
    function addUser($email, $password){
        global $bdd;
        $req = $bdd -> prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
        $req -> execute(array(
            "email" => htmlspecialchars($email),
            "password" => à
        ));
        $req -> closeCursor();
        return true;
    }

    function updateUser($oldEmail, $newEmail, $oldPassword, $newPassword){
        global $bdd;
        $req = $bdd -> prepare("UPDATE users SET email=:newEmail, password=:newPassword WHERE email=:oldEmail");
        $req -> execute(array(
            "newEmail" => htmlspecialchars($newEmail),
            "newPassword" => password_hash($newPassword, PASSWORD_DEFAULT),
            "oldEmail" => $oldEmail
        ));
        $req -> closeCursor();
        return true;
    }

    function countUsersWith($email){
        global $bdd;
        $req = $bdd -> prepare("SELECT COUNT(*) as nbre FROM users WHERE email=:email");
        $req -> execute(array(
            "email" => $email
        ));
        $res = $req -> fetch();
        $req -> closeCursor();
        return $res['nbre'];
    }
?>