<?php

$_SESSION['err'] = 1;
foreach ($_POST as $key => $value) {
    if (trim($value) == '') {
        $_SESSION['err'] = 0;
    }
    break;
}

include('./function_cart.php');
include('./constants.php');
// connect database



// find customer$sql = "SELECT * FROM db_nhanvien WHERE manv=$manv ";

if (isset($_POST['order'])) {
    $address = $_POST['address'];
    $city = $_POST['city'];

    $userid = $_SESSION['userid'];

    $query = "UPDATE users SET address='$address',city='$city' WHERE userid ='$userid' ";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $sql1 = "SELECT * FROM users ";
        $res1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($res1) > 0) {
            $row = mysqli_fetch_assoc($res1);
            $userid = $row['userid'];
            $date = date("Y-m-d H:i:s");
            $sql2 = "INSERT INTO orders VALUES 
			(NULL, '" . $userid . "', '" . $_SESSION['total_price'] . "', '" . $date . "', '" . $address . "', '" . $city . "')";
            $res2 = mysqli_query($conn, $sql2);
        }
    } else {
        return null;
    }
}

foreach ($_SESSION['cart_to_buy'] as $isbn => $qty) {
    $query = "SELECT book_price FROM books WHERE book_isbn = '$isbn'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $bookprice = $row['book_price'];

        $userid = $_SESSION['userid'];

        $sql_1 = 'SELECT orderid FROM orders WHERE userid = $userid';
        $res_1 = mysqli_query($conn, $sql_1);
        if (mysqli_num_rows($res1) > 0) {
            $row_1 = mysqli_fetch_assoc($res_1);
            $orderid = $row_1['orderid'];

            $sql_2 = "INSERT INTO order_items VALUES 
		    ('$orderid', '$isbn', '$bookprice', '$qty')";
            $res_2 = mysqli_query($conn, $sql_2);
            if (!$res_2) {
                echo "Insert value false!" . mysqli_error($conn);
                exit;
            }
        }
    }
}





session_unset();

$response = 'Đơn hàng của bạn đã được xử lý thành công';
header("Location:" . SITEURL . "check_cart.php?response=$response");



if (isset($conn)) {
    mysqli_close($conn);
}
require_once "footer.php";
?>