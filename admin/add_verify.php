<?php
 include('./connect.php');;

$acc_name = $_POST['accName'];
$acc_emali= $_POST['accEmail'];
$acc_pass = $_POST['accPass'];
    $sql = "Insert into admin(name,email,pass) Values
    ('$acc_name', '$acc_emali', '$acc_pass')";
    $result = mysqli_query($conn, $sql);

    if($result>0){
        header("Location:admin.php");
    }
    else
        echo $sql;


?>