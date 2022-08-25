<?php
    $_SESSION['items'] = (isset($_GET['search'])) ? getItemsByKeyword($_GET['search']) : getAllItems();
    if(isset($_GET['search']) && $_GET['search'] != ''){
        displayItems($_SESSION['items']);
    }else{
        $numberOfElementsToDisplayOnAPage = 5;
        $startingIndex = (isset($_GET['page'])) ? ($_GET['page']-1)*$numberOfElementsToDisplayOnAPage : 0;       
        $items = truncateTable($_SESSION['items'], $numberOfElementsToDisplayOnAPage, $startingIndex);
        displayItems($items);
        setPagination(count($_SESSION['items']), $numberOfElementsToDisplayOnAPage); //Parameter 1: Total number of elements to display.   Parameter 2: Number of elements to display per page
    }
    if(count($_SESSION['items']) == 0){
        echo "No such items";
    }
?>