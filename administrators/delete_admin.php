<?php

//Include constants.php file here
include('../constants.php');

// 1. get the name of admin to be deleted
$idAd  = $_GET['idAd'];


//2. Create SQL Query to Delete 
echo $sql = "DELETE FROM admin WHERE idAd  = '$idAd'";

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
