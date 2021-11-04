<?php
include('./header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="add_books.php">
                <input type="submit" value="Thêm" class="btn btn-outline-danger">
            </a>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên sách</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Miêu tả sách</th>
                        <th scope="col">Bìa sách</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    //lấy dữ liệu từ CSDL và để ra bảng (phần lặp lại)
                    //bước 1:kết nối tời csdl(mysql) 
                    //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn
                    $sql = "SELECT * FROM books_add  ";
                    $res = mysqli_query($conn, $sql);

                    //bước 3 xử lý kết quả trả về
                    if (mysqli_num_rows($res) > 0) {
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($res)) {
                    ?>

                            <tr>
                                <th scope="row"><?php echo $i; ?> </th>
                                <td><?= $row['book_title'] ?></td>
                                <td style=" width:100px"> <?= $row['book_author'] ?></td>
                                <td><?= $row['book_descr'] ?></td>
                                <td><img src=" <?= $row['book_image'] ?>" alt="" style="width:  75px;">
                                </td>
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