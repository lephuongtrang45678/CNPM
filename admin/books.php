<?php
include('header.php');
?>

<div class="ad-index">
    <div class="ad-book">
        <div class="row">
            <h1 class="text-center ad-title">
                Quản lý sách
            </h1>
        </div>
        <div class="container">
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Mã sách</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Tác giả</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Chủ đề</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Nhà sản xuất</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php 
                        $sql="select * from books";
                        $Stt=0;
                        $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result)>0){ 
                                while($row=mysqli_fetch_assoc($result)){
                                    $book_isbn = $row['book_isbn'];
                                    $book_title = $row['book_title'];
                                    $book_author = $row['book_author'];
                                    $book_image = $row['book_image'];
                                    $book_category = $row['book_Category'];
                                    $book_descr = $row['book_descr'];
                                    $book_price = $row['book_price'];
                                    $publisherid = $row['publisherid'];
                                    
                                    $sql1 = "select publisher_name from publisher where publisherid=$publisherid";
                                    $result1 = mysqli_query($conn, $sql1);
                                    if(mysqli_num_rows($result1)>0){ 
                                        while($row=mysqli_fetch_assoc($result1)){
                                            $publisher_name = $row['publisher_name'];}}
                                        else echo $sql1;
                                    ?>
                            <td><?php echo $Stt++ ?></td>
                            <td><?php echo $book_isbn ?></td>
                            <td><?php echo $book_title ?></td>
                            <td><?php echo $book_author ?></td>
                            <td>
                                <img src="../<?php echo $book_image ?>" alt="" width="100px" height="120px">
                            </td>
                            <td><?php echo $book_category ?></td>
                            <td><?php echo $book_descr ?></td>
                            <td><?php echo $book_price ?></td>
                            <td><?php echo $publisher_name ?></td>

                        </tr>

                        <?php
                                }
                            }
                          
                            else 
                            echo $sql;
                        ?>



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>