<?php
include('index.php');
?>
<div class="col mt-5 mb-3">
    <h4>Danh bạ người dùng</h4>
</div>
<div class="col-12  mt-4">
    <a href="./add_user.php" class="">
        <button type="submit" name="submit" class="btn btn-danger ">
            <h5>Thêm </h5x>
        </button>
    </a>
</div>
<div class="col mt-5" id="table-nhanvien">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã người dùng</th>
                <th scope="col"> Họ</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Mật khẩu</th>
                <th scope="col">status</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
                <th scope="col" style="width: 10%;">Ảnh đại diện</th>

            </tr>
        </thead>
        <tbody>
            <?php
            //lấy dữ liệu từ CSDL và để ra bảng (phần lặp lại)
            //bước 1:kết nối tời csdl(mysql) 
            //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn
            $sql = "SELECT * FROM users  order by userid";
            $result = mysqli_query($conn, $sql);


            //bước 3 xử lý kết quả trả về
            if (mysqli_num_rows($result) > 0) {
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
            ?>

                    <tr>
                        <th scope="row"><?php echo $i; ?> </th>
                        <td><?php echo $row['userid']; ?> </td>
                        <td><?php echo $row['first_name']; ?> </td>
                        <td><?php echo $row['last_name']; ?> </td>
                        <td><?php echo $row['email']; ?> </td>
                        <td><?php echo $row['password']; ?> </td>
                        <td><?php echo $row['status']; ?> </td>
                        <td><a href="edit_user.php?userid=<?php echo $row['userid']; ?>"><i class="fas fa-edit text-danger"></i></a></td>
                        <td><a href="delete_user.php?userid=<?php echo $row['userid']; ?>"><i class="fas fa-trash text-danger"></i></a></td>
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