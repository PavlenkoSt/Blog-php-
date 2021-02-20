<?php
    $getCount = 'SELECT COUNT(*) as count FROM pages WHERE id>0';

    $resultCount = mysqli_query($link, $getCount) or die(mysqli_error($link));
    for($count = []; $row = mysqli_fetch_assoc($resultCount);$count[] = $row);

    if(isset($_POST['show'])){
        $_SESSION['show'] = $_POST['show'];
    }
    if(isset($_SESSION['show'])){
        $showItems = $_SESSION['show'];
    }else{
        $showItems = 3;
    }
    $count = $count[0]['count'];
    $pages = ceil($count / $showItems);

    if(isset($_GET['pagination'])){
        $currentPage = $_GET['pagination'];
        $items = ($currentPage - 1) * $showItems;
        $getQuery = "SELECT * FROM pages WHERE id>$items LIMIT $showItems";
    }else{
        $lastPage = ($pages-1)*$showItems;
        $getQuery = "SELECT * FROM pages WHERE id>$lastPage LIMIT $showItems";
    }

    $result = mysqli_query($link, $getQuery) or die(mysqli_error($link));
    for($data = []; $row = mysqli_fetch_assoc($result);$data[] = $row);

    include 'main-items.php';
    include 'pagination.php';
?>