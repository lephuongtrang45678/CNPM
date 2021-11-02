<?php
// include('./check-login.php')

include('./header.php');

?>
orderid
book_isbn
item_price
quantity
<div class="col mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col"> Mã đơn</th>
                <th scope="col">Tên sách</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tổng số tiền</th>
                <th scope="col">Tình trạng đơn hàng</th>

                <th scope="col" style="width: 10%;">Ảnh đại diện</th>

            </tr>
        </thead>
        <tbody>
            <?php
            //lấy dữ liệu từ CSDL và để ra bảng (phần lặp lại)
            //bước 1:kết nối tời csdl(mysql) 
            //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn
            $sql = "SELECT nv.manv, nv.tennv, nv.chucvu, nv.email, nv.sodidong, dv.tendv, nv.avatar FROM db_nhanvien nv, db_donvi dv WHERE nv.madv = dv.madv order by manv";
            $result = mysqli_query($conn, $sql);

            //bước 3 xử lý kết quả trả về
            if (mysqli_num_rows($result) > 0) {
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
            ?>

                    <tr>
                        <th scope="row"><?php echo $i; ?> </th>
                        <td><?php echo $row['manv']; ?> </td>
                        <td><?php echo $row['tennv']; ?> </td>
                        <td><?php echo $row['chucvu']; ?> </td>
                        <td><?php echo $row['sodidong']; ?> </td>
                        <td><?php echo $row['email']; ?> </td>
                        <td><?php echo $row['tendv']; ?> </td>
                        <td><a href="edit-danhba.php?manv=<?php echo $row['manv']; ?>"><i class="fas fa-edit text-danger"></i></a></td>
                        <td><a href="delete-danhba.php?manv=<?php echo $row['manv']; ?>"><i class="fas fa-trash text-danger"></i></a></td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <img src="<?php echo $row['avatar']; ?>" alt="" style=" width: 50%;" ">
                                    </div>

                                </td>
                            </tr>
                    <?php
                    $i++;
                }
            }
                    ?>
                </tbody>
            </table>
        </div>