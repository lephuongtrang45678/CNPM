<?php 
include('header.php');
?>

<div class="ad-index">
    <div class="container">
        <div class="row">
            <h1 class="text-center ad-title">
                Tổng quan
            </h1>
        </div>
        <?php
    $sql = "select count(*) as TongDon from orders where DATE(date) = CURDATE() ";
    $result = mysqli_query($conn, $sql);
    $tongDon=0;
if(mysqli_num_rows($result)>0){ 
    while($row=mysqli_fetch_assoc($result)){
        $tongDon = $row['TongDon'];
    }
}

$sql1 = "select count(*) as TongPhanHoi from books_add where DATE(date_add) = CURDATE() ";
    $result1 = mysqli_query($conn, $sql1);
    $tongPhanHoi=0;
if(mysqli_num_rows($result1)>0){ 
    while($row=mysqli_fetch_assoc($result1)){
        $tongPhanHoi = $row['TongPhanHoi'];
    }
}
    

?>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-3 text-center ad-total rounded-circle">
                <h1><?php echo $tongDon ?></h1>
                <p>Đơn hàng trong ngày</p>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-3 text-center ad-total rounded-circle">
                <h1><?php echo $tongPhanHoi ?></h1>
                <p>Phản hồi trong ngày</p>
            </div>
            <div class="col-md-2">
            </div>


        </div>



    </div>
</div>

<?php 
include('footer.php') ?>