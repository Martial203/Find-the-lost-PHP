<?php
    $myItems = getItemsFor($_SESSION['email']);
    displayMyItems($myItems);
?>