<?php

$currency = '$'; //Currency sumbol or code
if(!isset($_SESSION)){
    session_start();
}
    //Create Constants to Store Non Repeating Values
    $localhost = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'buy_book';

    $mysqli = new mysqli($localhost, $username, $password, $db_name);
    $conn = mysqli_connect($localhost,$username, $password , $db_name  ) ; //Database Connection
    define('SITEURL', 'http://localhost/PROJECT/');

    function getPubName($conn, $pubid){
		$query = "SELECT publisher_name FROM publisher WHERE publisherid = '$pubid'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		if(mysqli_num_rows($result) == 0){
			echo "Empty books ! Something wrong! check again";
			exit;
		}

		$row = mysqli_fetch_assoc($result);
		return $row['publisher_name'];
	}
?>