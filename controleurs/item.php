<?php
    include("BDConnection.php");
    function addItem($name, $place, $date, $email){
        global $bdd;
        $req = $bdd->prepare("INSERT INTO items (name, place, date, email) VALUES(:name, :place, :date, :email)");
        $req -> execute(array(
            "name" => $name,
            "place" => $place,
            "date" => $date,
            "email" => $email
        ));
        $req -> closeCursor();
        return true;
    }
    function addItemImage($imgName, $itemId){
        global $bdd;
        $req = $bdd -> prepare("INSERT INTO images (name, itemId) VALUES(:name, :itemId)");
        $req -> execute(array(
            "name" => $imgName,
            "itemId" => $itemId
        ));
        $req -> closeCursor();
        return true;
    }
    function getLastInsertItemId(){
        global $bdd;
        $req = $bdd -> prepare("SELECT LAST_INSERT_ID() as id FROM items");
        $req -> execute(array());
        $res = $req -> fetch();
        $req -> closeCursor();
        return $res['id'];
    }
    function deleteItem($id){
        global $bdd;
        $req = $bdd -> prepare("DELETE FROM items WHERE id = :id");
        $req -> execute(array(
            "id" => $id
        ));
        $req -> closeCursor();
        return true;
    }
?>