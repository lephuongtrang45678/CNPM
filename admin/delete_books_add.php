<?php
    include("./header.php");
	$book_title = $_GET['booktitle'];
	$query = "DELETE FROM books_add WHERE book_title = '$book_title'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: reply.php");
?>