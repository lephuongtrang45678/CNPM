<?php

include('header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-4">
            <p class="lead btn btn-danger mt-5 mb-3 "><a href="./check_cart.php" class="text-decoration-none text-white">Trở về đơn hàng</a></p>
        </div>

        <div class="col-12 mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col"> Mã đơn</th>
                        <th scope="col">Tên sách</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Bìa sách</th>
                        <th scope="col">số lượng</th>
                        <th scope="col">số tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //lấy dữ liệu từ CSDL và để ra bảng (phần lặp lại)
                    //bước 1:kết nối tời csdl(mysql) 
                    //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn
                    if (isset($_GET['orderid'])) {
                        $orderid = $_GET['orderid'];
                    }
                    $sql = "SELECT * FROM order_items, books WHERE orderid= '$orderid' and order_items.book_isbn = books.book_isbn";
                    $result = mysqli_query($conn, $sql);

                    //bước 3 xử lý kết quả trả về
                    if (mysqli_num_rows($result) > 0) {
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                            <tr>
                                <th scope="row"><?php echo $i; ?> </th>
                                <td><?php echo $row['orderid']; ?> </td>
                                <td><?php echo $row['book_title']; ?> </td>
                                <td><?php echo $row['book_author']; ?> </td>
                                <td><img src="<?php echo $row['book_image']; ?> " style="width: 10rem;"></td>
                                <td><?php echo $row['quantity']; ?> </td>
                                <td><?php echo $row['item_price']; ?> </td>

                                <td></td>

                            </tr>
                    <?php
                            $i++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>