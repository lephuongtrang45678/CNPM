<?php 

    //Include constants.php file here
    include('../constants.php');

    // 1. get the manv of dbnhanvien to be deleted
    $userid = $_GET['userid'];

    //2. Create SQL Query to Delete 
    $sql = "DELETE FROM users WHERE userid='$userid'";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {
       $_SESSION['delete'] = "<div class='danger'>xoa thanh cong.</div>";
        header('location:'.SITEURL.'danhba_user.php');
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>xoa that bai.</div>";
        header('location:'.SITEURL.'danhba_user.php');
    }
