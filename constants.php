<?php

$currency = '$'; //Currency sumbol or code


    //Create Constants to Store Non Repeating Values
    $localhost = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'buy_book';

    $mysqli = new mysqli($localhost, $username, $password, $db_name);
    $conn = mysqli_connect($localhost,$username, $password , $db_name  ) ; //Database Connection
    define('SITEURL', 'http://localhost/buy_book/');




?>