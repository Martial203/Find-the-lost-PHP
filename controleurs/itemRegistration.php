<?php
    include("../../../../controleurs/upload_images.php");
    if(isset($_POST['place']) && isset($_FILES['images'])){
        $name = $_POST['name'];
        $place = $_POST['place'];
        $date = $_POST['date'];
        $email = $_SESSION['email'];
        if(addItem($name, $place, $date, $email)){
            $lastId = getLastInsertItemId();
            $imgName = $lastId;
            // for($i=0; $i<count($_FILES); $i++){
            //     for($u=0; $u<count($_FILES); $u++){
            //         $names[$i][$u] = $_FILES['images'][$u][$i];
            //     }
            // }
            // echo $_FILES['images']['error'];
            // echo var_dump($names);
            $infosImage = pathinfo($_FILES['images']['name']);
            $extensionImage = $infosImage['extension'];
            if(uploadImages($_FILES, '../images/'.$imgName.'.'.$extensionImage)){
                if(addItemImage($imgName.'.'.$extensionImage, $lastId)){
                    //Item successfully registered
                    //header('Location: itemsList/itemsList.php');
                }else{
                    //Failed to save the adress of the image in the images database
                    echo "An issue occured during the process, please try again";
                }
            }
        }
        else{
            echo "erreur";
        }
    }
?>