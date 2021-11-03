<?php
// include('./check-login.php');
session_start();
include('./header.php');

?>

<div class="col mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col"> Mã đơn</th>
                <th scope="col">Tên sách</th>
                <th scope="col">Tổng số tiền</th>
                <th scope="col">Ngày đặt hàng</th>
                <th scope="col">Tình trạng đơn hàng</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //lấy dữ liệu từ CSDL và để ra bảng (phần lặp lại)
            //bước 1:kết nối tời csdl(mysql) 
            //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn
            $userid = $_SESSION['userid'];
            
            $sql = "SELECT * FROM orders, books , order_items WHERE orders.orderid = order_items.orderid and books.book_isbn = order_items.book_isbn and userid = '$userid' order by orders.orderid";
            $result = mysqli_query($conn, $sql);

            //bước 3 xử lý kết quả trả về
            if (mysqli_num_rows($result) > 0) {
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
            ?>

                    <tr>
                        <th scope="row"><?php echo $i; ?> </th>
                        <td><?php echo $row['orderid']; ?> </td>
                        <td><?php echo $row['book_title']; ?> : số lượng <?php echo $row['quantity']; ?> </td>
                        <td><?php echo $row['item_price']; ?> </td>
                        <td><?php echo $row['date']; ?> </td>
                        <td><?php echo $row['order_status']; ?> </td>

                    </tr>
            <?php
                    $i++;
                }
            }
            ?>
        </tbody>
    </table>
</div>