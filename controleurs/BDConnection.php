<?php
    try{
        $bdd = new PDO("mysql:host=localhost;dbname=findthelost;charset=utf8","root","");
    }catch (Exception $e){
        die($e->getMessage());
    }
?>