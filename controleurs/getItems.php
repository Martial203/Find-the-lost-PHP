<?php

    include("BDConnection.php");

    function getAllItems(){
        global $bdd;
        $req = $bdd -> prepare("SELECT items.id as itID, items.name as itName, items.place as itPlace, items.date as itDate, items.email as itEmail, images.id as imId, images.name as imName, images.itemId as imItemId FROM items, images WHERE items.id=images.itemId ORDER BY items.id DESC");
        $req -> execute(array());
        // $req -> closeCursor();
        // $don = $res -> fetch();
        //echo $don['itID'];
        $val = $req -> fetchAll();
        $req -> closeCursor();
        return $val;
    }

    function getSpecificItem($id){
        global $bdd;
        $req = $bdd -> prepare("SELECT items.id as itID, items.name as itName, items.place as itPlace, items.date as itDate, items.email as itEmail, images.id as imId, images.name as imName, images.itemId as imItemIdFROM items, images WHERE items.id=:id AND items.id=images.id ORDER BY items.id DESC");
        $res = $req -> execute(array(
            "id" => $id
        ));
        $req -> closeCursor();
        return $res;
    }

    function getItemsFor($email){
        global $bdd;
        $req = $bdd -> prepare("SELECT items.id as itID, items.name as itName, items.place as itPlace, items.date as itDate, items.email as itEmail, images.id as imId, images.name as imName, images.itemId as imItemId FROM items, images WHERE items.id=images.itemId AND items.email=:email ORDER BY items.id DESC");
        $req -> execute(array(
            "email" => $email
        ));
        $res = $req -> fetchAll();
        $req -> closeCursor();
        return $res;
    }

    function getItemsByKeyword($keyword){
        global $bdd;
        $req = $bdd -> prepare("SELECT items.id as itID, items.name as itName, items.place as itPlace, items.date as itDate, items.email as itEmail, images.id as imId, images.name as imName, images.itemId as imItemId FROM items, images WHERE items.id=images.itemId AND (items.name LIKE :keyword OR items.place LIKE :keyword OR items.date LIKE :keyword) ORDER BY items.id DESC");
        $req -> execute(array(
            "keyword" => "%".$keyword."%"
        ));
        // $req -> closeCursor();
        // $don = $res -> fetch();
        //echo $don['itID'];
        $val = $req -> fetchAll();
        $req -> closeCursor();
        return $val;
    }

    function setPagination($totalNberOfItems, $nberOfItemsPerPage){
        $nberOfPages = ($totalNberOfItems / $nberOfItemsPerPage) + 1;
        ?>
        <div class="container">
            <h3>Pages : </h3>
            <ul class="pagination">
                <?php
                $research = (isset($_GET['search'])) ? "&amp;search=".$_GET['search'] : "";
                for($i = 1; $i <= $nberOfPages - 1 ; $i++){ //Only you know why you put -1 😅
                    $activePage = (isset($_GET['page']) && $_GET['page']==$i) ? " class='active'" : '';
                    echo "<li".$activePage."><a href='/ObjectsPerdus/vues/vues/items/itemsList/itemsList.php?page=".$i."".$research."'>".$i."</a></li>";
                }
                ?>
            </ul>
        </div>
        <?php
    }

    function truncateTable($tableToTruncate, $nberOfElementsForTheNewTable, $startingIndex) {
        $starting_index = $startingIndex;
        for($i=$starting_index; $i<$starting_index+$nberOfElementsForTheNewTable; $i++) {
            $newTable[$i-$starting_index] = $tableToTruncate[$startingIndex];
            $startingIndex++; 
        }
        return $newTable;
    }

    function displayItems($items){
        foreach ($items as $item){
            //echo $item['imName'];
            ?>
            <div>
                <div class='card' style='width:400px'>
                    <img class='card-img-top' src='../images/<?php echo $item['imName']; ?>' style='width:100%'>
                    <div class='card-body'>
                        <h4 class='card-title'><?php echo $item['itName']; ?></h4>
                        <p class='card-text'><p>Found at : <?php echo $item['itPlace']; ?></p><p>On the : <?php echo $item['itDate']; ?></p></p>
                        <p><a href='mailto:<?php echo $item['itEmail']; ?>' class='btn btn-success'>Contact the author</a></p>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    
    function displayMyItems($items){
        foreach ($items as $item){
            //echo $item['imName'];
            ?>
            <div>
                <div class='card' style='width:400px'>
                    <img class='card-img-top' src='../images/<?php echo $item['imName']; ?>' style='width:100%'>
                    <div class='card-body'>
                        <h4 class='card-title'><?php echo $item['itName'];?></h4>
                        <p class='card-text'><p>Found at : <?php echo $item['itPlace']; ?></p><p>On the : <?php echo $item['itDate']; ?></p></p>
                        <p><a href='mailto:<?php echo $item['itEmail']; ?>' class='btn btn-success'>Contact the author</a><button type='submit' data-toggle="modal" data-target="#myModal-<?php echo $item['itID']; ?>" class="btn btn-danger">Delete it</button></p>
                    </div>
                    <div class="modal" id="myModal-<?php echo $item['itID']; ?>">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
          <h4 class="modal-title"><?php echo $item['itName']; ?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          Do you really want to delete this item ?
        </div>
        <div class="modal-footer">
        <a class="btn btn-danger" href="/ObjectsPerdus/vues/vues/items/itemsList/itemsList.php?del=<?php echo $item['itID']; ?>#menu2">Confirm</a><button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
        </div>
    </div>
  </div>
                </div>
            </div>
            <?php
        }
    }
?>