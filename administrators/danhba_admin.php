<?php
include('index.php');
?>
<div class="col mt-5 mb-3">
    <h4>Danh bạ người quản lý</h4>
</div>
<div class="col-12  mt-4">
    <a href="./add_admin.php" class="">
        <button type="submit" name="submit" class="btn btn-danger ">
            <h5>Thêm </h5x>
        </button>
    </a>
</div>
<div class="col mt-5">
    <form action="" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ID người quản lý</th>
                    <th scope="col">Tên người quản lý</th>
                    <th scope="col"> Mật khẩu</th>
                    <th scope="col"> sửa</th>
                    <th scope="col"> Xóa</th>


                </tr>
            </thead>
            <tbody>
                <?php
                //lấy dữ liệu từ CSDL và để ra bảng (phần lặp lại)
                //bước 1:kết nối tời csdl(mysql) 
                //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn
                $sql = "SELECT * FROM `admin`";
                $result = mysqli_query($conn, $sql);


                //bước 3 xử lý kết quả trả về
                if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>

                        <tr>
                            <th scope="row"><?php echo $i; ?> </th>
                            <td><?php echo $row['idAd']; ?> </td>
                            <td><?php echo $row['name']; ?> </td>
                            <td><?php echo $row['pass']; ?> </td>
                            <td><a href="edit_admin.php?idAd=<?php echo $row['idAd']; ?>"><i class="fas fa-edit text-danger"></i></a></td>
                            <td><a href="delete_admin.php?idAd=<?php echo $row['idAd']; ?>"><i class="fas fa-trash text-danger"></i></a></td>
                            <td>
                        <?php
                        $i++;
                    }
                }
                        ?>
            </tbody>
        </table>
    </form>
</div>