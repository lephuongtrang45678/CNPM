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

echo $userid = $_SESSION['userid'];


if (isset($_POST['order'])) {
    $address = $_POST['address'];
    $city = $_POST['city'];

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
			(NULL, '" . $userid . "', '" . $_SESSION['total_price_cart'] . "', '" . $date . "', '" . $address . "', '" . $city . "', 'Đang xử lý')";
            $res2 = mysqli_query($conn, $sql2);
        }
    } else {
        return null;
    }
}

foreach ($_SESSION['cart_to_buy'] as $isbn => $qty) {
    $query = "SELECT book_price FROM books WHERE book_isbn = '$isbn'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $bookprice = $row['book_price'];

        $sql_1 = "SELECT orderid FROM orders WHERE userid ='$userid'";
        $res_1 = mysqli_query($conn, $sql_1);
        if (mysqli_num_rows($res_1) > 0) {
            $row_1 = mysqli_fetch_assoc($res_1);
            $orderid = $row_1['orderid'];

            echo $sql_2 = "INSERT INTO order_items VALUES 
		    ('$orderid', '$isbn', '$bookprice', '$qty')";
            $res_2 = mysqli_query($conn, $sql_2);
            if (!$res_2) {
                echo "Insert value false!" . mysqli_error($conn);
                exit;
            }
        }
    }
}





// session_unset();

// $_SESSION['success'] = "<div class='danger'>Thanh toán thành công đơn hàng của bạn.</div>";
// header("Location:" . SITEURL . "check_cart.php");



if (isset($conn)) {
    mysqli_close($conn);
}
require_once "footer.php";
?>