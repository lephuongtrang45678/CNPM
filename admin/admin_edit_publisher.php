<?php
include("header.php");
ob_start();
?>

<div class="container-fluid">
    <div class="row mt-5">
        <div class="col d-flex"><a href="index.php"><i class="fas fa-chevron-left "></i></a>
            <h4 class="ms-2">Trở lại trang chủ</h4>
        </div>
        <div class="col text-end"><a href="./admin_edit_publisher.php"><button class="btn btn-outline-danger"
                    type="submit">Hủy</button></a></div>
    </div>
    <?php
    if (isset($_GET['publisherid'])) {
        $publisherid = $_GET['publisherid'];
    }

    $sql_2 = " SELECT * FROM publisher WHERE publisherid = '$publisherid'";
    $res_2 = mysqli_query($conn, $sql_2);

    $row_2 = mysqli_fetch_assoc($res_2);
    ?>


    <div class="row">
        <div class="col border p-3 rounded-2 mt-3">
            <form method="POST" class="row g-3 " enctype="multipart/form-data" id="form">
                <div class="col-md-4">
                    <label for="publisher_name" class="form-label"></label>
                    <input type="" name="publisher_name" class="form-control" id="publisher_name"
                        value="<?php echo $row_2['publisher_name']; ?>">
                    <div class="text-muted"><small>Tên NSX</small></div>
                </div>
                <div class="col-md-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="" name="email" class="form-control" id="email" value="<?php echo $row_2['email']; ?>">
                </div>
                <div class="col-md-4">
                    <label for="hotline" class="form-label">Hotline</label>
                    <input type="" name="hotline" class="form-control" id="hotline"
                        value="<?php echo $row_2['hotline']; ?>">
                </div>
                <div class="col-md-4">
                    <label for="location" class="form-label">Location</label>
                    <input type="" name="location" class="form-control" id="location"
                        value="<?php echo $row_2['location']; ?>">
                    <div class="col-12 d-flex justify-content-center mt-3">
                        <button type="submit" name="submit" class="btn btn-outline-danger ">
                            <h5>Sửa</h5x>
                        </button>
                    </div>
            </form>
        </div>
    </div>

    <?php
    include("footer.php");
    if (isset($_POST['submit'])) {
        $publisher_name = $_POST['publisher_name'];
        $email = $_POST['email'];
        $hotline = $_POST['hotline'];
        $location = $_POST['location'];
        //2. SQL Query to Save the data into database
        $sql = " UPDATE `publisher` SET `publisher_name` = '$publisher_name', `email` = '$email', `hotline` = '$hotline', `location` = '$location' WHERE `publisher`.`publisherid` = '$publisherid';";
        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($conn, $sql);

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if ($res == TRUE) {
            //Data Inserted

            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='danger'>thêm thành công</div>";
            header("location: publisher.php");
        } else {

            $_SESSION['add'] = "<div class='error'>không hợp lệ</div>";
            //Redirect Page to Add Admin
            header("location: admin_edit_publisher.php");
        }
    }

    ?>
    <script type="text/javascript" src="../js/edit-js.js"></script>