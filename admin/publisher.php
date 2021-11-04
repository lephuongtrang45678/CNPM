<?php 
include('header.php');
?>

<div class="ad-index">
    <div class="ad-book">
        <div class="row">
            <h1 class="text-center ad-title">
                Quản lý nhà sản xuất
            </h1>
        </div>
		<p class="lead btn btn-danger mt-5 mb-3 "><a href="admin_add_publisher.php" class="text-decoration-none text-white">Thêm</a></p>
        <div class="container">
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            
                            <th scope="col">Mã NSX</th>
                            <th scope="col">Tên NSX</th>
                            <th scope="col">Email</th>
                            <th scope="col">Hotline</th>
                            <th scope="col">Địa chỉ</th>
							<th scope="col">Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php 
                        $sql="select * from publisher";
                        
                        $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result)>0){ 
                                while($row=mysqli_fetch_assoc($result)){
                                    $publisherid = $row['publisherid'];
                                    $publisher_name = $row['publisher_name'];
                                    $email= $row['email'];
                                    $hotline = $row['hotline'];
                                    $location = $row['location'];
                                    ?>
                    
                         
                            <td><?php echo  $publisherid ?></td>
                            <td><?php echo $publisher_name ?></td>
                            <td><?php echo $email ?></td>
                            <td><?php echo  $hotline ?></td>
                            <td><?php echo $location ?></td>

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