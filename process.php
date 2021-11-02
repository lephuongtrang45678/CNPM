<?php
session_start();

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

    $userid = $_SESSION['userid'] ;

    $query = "UPDATE users SET address='$address',city='$city' WHERE userid ='$userid' ";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $sql1 = "SELECT * FROM users ";
        $res1 = mysqli_query($conn, $sql1);
        
        if(mysqli_num_rows($res1)>0){
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


// take orderid from order to insert order items
$orderid = getOrderId($conn, $userid);

foreach ($_SESSION['cart_to_buy'] as $isbn => $qty) {
    $bookprice = getbookprice($isbn);
    $query = "INSERT INTO order_items VALUES 
		('$orderid', '$isbn', '$bookprice', '$qty')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "Insert value false!" . mysqli_error($conn2);
        exit;
    }
}

session_unset();
?>
<p class="lead text-success">Đơn hàng của bạn đã được xử lý thành công.Hãy <a href="check_cart.php" class="text-decoration-none text-danger">Ấn vào đây</a> để xem tình tìnhtranjg tình trạng đơn hàng</p>

<?php
if (isset($conn)) {
    mysqli_close($conn);
}
require_once "footer.php";
?>