<?php
ob_start();
include('./header.php');

?>
<div class="col">
    <h5 class="mt-5">Giỏ hàng cần xử lý</h5>
    <div class="text-end">
        <p class="lead btn btn-danger mt-5 mb-3 "><a href="./cart_success.php" class="text-decoration-none text-white">Giỏ hàng đã xử lý</a></p>
    </div>

</div>
<div class="col mt-5">
    <form method="post">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col"> Mã đơn</th>
                    <th scope="col">Tổng số tiền</th>
                    <th scope="col">Ngày đặt hàng</th>
                    <th scope="col">Thời gian giao hàng dự kiến</th>
                    <th scope="col">Tình trạng đơn hàng</th>
                    <th scope="col">Chi Tiết</th>
                    <th scope="col">Xử lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //lấy dữ liệu từ CSDL và để ra bảng (phần lặp lại)
                //bước 1:kết nối tời csdl(mysql) 
                //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn

                $sql = "SELECT * FROM orders WHERE  order_status = 'Đang xử lý'";
                $result = mysqli_query($conn, $sql);

                //bước 3 xử lý kết quả trả về
                if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>

                        <tr>
                            <th scope="row"><?php echo $i; ?> </th>
                            <td><?php echo $row['orderid']; ?> </td>
                            <td><?php echo $row['amount']; ?> </td>
                            <td><?php echo $row['date']; ?> </td>
                            <td><?php echo $row['date_ship']; ?> </td>
                            <td><?php echo $row['order_status']; ?> </td>
                            <td><a href="detail_cart.php?orderid=<?php echo $row['orderid'] ?>" class="text-decotion-none text-danger "><i class="fas fa-info-circle"></i></a></td>

                            <td><input type="submit" name="confirm" value="Xác nhận đơn hàng" class="btn btn-outline-danger"></td>
                            <td><input type="hidden" name="orderid" value="<?php echo $row['orderid'] ?>"></td>

                        </tr>
                <?php
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
    </form>
</div>

<?php

include('footer.php');

if (isset($_POST['confirm'])) {

    $orderid = $_POST['orderid'];

    $sql = "UPDATE orders SET order_status='Đang vận chuyển' WHERE  orderid='$orderid'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "Xử lý đơn hàng thành công";
        header('location: cart_success.php');
    }
}


?>