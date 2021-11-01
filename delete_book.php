<?php

//Include constants.php file here
include('constants.php');

// 1. get the manv of dbnhanvien to be deleted
$book_isbn = $_GET['book_isbn'];

//2. Create SQL Query to Delete 
$sql = "DELETE FROM books WHERE book_isbn='$book_isbn'";

//Execute the Query
$res = mysqli_query($conn, $sql);

// Check whether the query executed successfully or not
if ($res == true) {
    $_SESSION['delete'] = "<div class='danger'>xoa thanh cong.</div>";
    header('location:' . SITEURL . 'cart.php');
} else {
    $_SESSION['delete'] = "<div class='error'>xoa that bai.</div>";
    header('location:' . SITEURL . 'cart.php');
}
