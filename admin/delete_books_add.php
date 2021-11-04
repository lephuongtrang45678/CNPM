<?php
    include("./header.php");
	$book_ad_id = $_GET['bookadid'];
	$query = "DELETE FROM books_add WHERE book_ad_id = '$book_ad_id'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: reply.php");
?>