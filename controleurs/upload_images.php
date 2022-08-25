<?php
    // function uploadImages($FILES, $destination){
    //     foreach($FILES as $file){
    //         //echo var_dump($file);
    //         for($i=0; $i<count($file); $i++){
    //             if($file['error'][$i]==0){
    //                 //If there is not error in uploading the file
    //                 if($file['size'][$i]<=2097152){
    //                     //If the size is not larger than 2Mo
    //                     $infosImage = pathinfo($file['name'][$i]);
    //                     $extensionImage = $infosImage['extension'];
    //                     $extensionsAutorisees = array('jpg', 'jpeg', 'png', 'gif');
    //                     if(in_array($extensionImage, $extensionsAutorisees)){
    //                         move_uploaded_file($file['tmp_name'][$i], $destination.'-'.$i);
    //                     }
    //                 }
    //             }
    //         }
    //     }
    //     return true;
    // }
    
    function uploadImages($FILES, $destination){
        foreach($FILES as $file){
            //echo var_dump($file);
            for($i=0; $i<count($file); $i++){
                if($file['error']==0){
                    //If there is not error in uploading the file
                    if($file['size']<=2097152){
                        //If the size is not larger than 2Mo
                        $infosImage = pathinfo($file['name']);
                        $extensionImage = $infosImage['extension'];
                        $extensionsAutorisees = array('jpg', 'jpeg', 'png', 'gif');
                        if(in_array($extensionImage, $extensionsAutorisees)){
                            move_uploaded_file($file['tmp_name'], $destination);
                        }
                    }
                }
            }
        }
        return true;
    }
?>