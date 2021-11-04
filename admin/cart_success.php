<?php

include('header.php');

?>

<div class="col">
    <h5 class="mt-5">Giỏ hàng đã xử lý</h5>
    <div class="text-end">
        <p class="lead btn btn-danger mt-5 mb-3 "><a href="./handle_cart.php" class="text-decoration-none text-white">Giỏ hàng chưa xử lý</a></p>
    </div>

</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col"> Mã đơn</th>
            <th scope="col">Tổng số tiền</th>
            <th scope="col">Ngày đặt hàng</th>
            <th scope="col">Thời gian giao hàng dự kiến</th>
            <th scope="col">Tình trạng đơn hàng</th>
            <th scope="col">Xử lý</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //lấy dữ liệu từ CSDL và để ra bảng (phần lặp lại)
        //bước 1:kết nối tời csdl(mysql) 
        //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn

        $sql = "SELECT * FROM orders WHERE  order_status = 'Đang vận chuyển'";
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


                </tr>
        <?php
                $i++;
            }
        }
        ?>
    </tbody>
</table>