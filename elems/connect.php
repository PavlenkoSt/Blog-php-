<?php
    session_start();
    
    error_reporting(E_ALL);
    ini_set('display-errors', 'on');

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbName = 'Blog';

    $link = mysqli_connect($host, $user, $password, $dbName) or die(mysqli_error($link));
    mysqli_query($link, 'SET_Names "(utf8)"');