<?php

//Include constants.php file here
include('../constants.php');

// 1. get the name of admin to be deleted
$name = $_GET['name'];
$pass = $_GET['pass'];

//2. Create SQL Query to Delete 
$sql = "DELETE FROM admin WHERE name='$name' and pass='$pass'";

//Execute the Query
$res = mysqli_query($conn, $sql);

// Check whether the query executed successfully or not
if ($res == true) {
    $_SESSION['delete'] = "<div class='danger'>xoa thanh cong.</div>";
    header('location:danhba_admin.php');
} else {
    $_SESSION['delete'] = "<div class='error'>xoa that bai.</div>";
    header('location:danhba_admin.php');
}
