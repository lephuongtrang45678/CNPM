<?php
include("./header.php");
ob_start();
?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col d-flex"><a href="index.php"><i class="fas fa-chevron-left "></i></a>
            <h4 class="ms-2">Trở lại trang chủ</h4>
        </div>
        <div class="col text-end"><a href="./publisher.php"><button class="btn btn-outline-danger" type="submit">Hủy</button></a></div>
    </div>
    <?php

    if (isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
    {
        echo $_SESSION['add']; //Display the SEssion Message if SEt
        unset($_SESSION['add']); //Remove Session Message
    }


    ?>
    <div class="row">
        <div class="col border p-3 rounded-2 mt-3">
            <form method="POST" class="row g-3 " enctype="multipart/form-data">
                <div class="col-md-4">
                    <label for="publisher_name" class="form-label">Tên NSX</label>
                    <input type="text" name="publisher_name" class="form-control" id="publisher_name" placeholder="">
                </div>
                <div class="col-md-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="">
                </div>
                <div class="col-md-4">
                    <label for="hotline" class="form-label">Hotline</label>
                    <input type="text" name="hotline" class="form-control" id="hotline" placeholder="">
                </div>
                <div class="col-md-4">
                    <label for="location" class="form-label">Địa chỉ</label>
                    <input type="text" name="location" class="form-control" id="location" placeholder="">
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <button type="submit" name="submit" class="btn btn-outline-danger ">
                        <h5>Thêm</h5x>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include("footer.php");



//Process the Value from Form and Save it in Database

//Check whether the submit button is clicked or not

if (isset($_POST['submit'])) {


    //echo "CLicked";

    //1. Get the DAta from Form
    $publisher_name = $_POST['publisher_name'];
    $email = $_POST['email'];
    $hotline = $_POST['hotline'];
    $location = $_POST['location'];
    //2. SQL Query to Save the data into database
    $sql = "INSERT INTO `publisher`(`publisher_name`, `email`, `hotline`, `location`) 
    VALUES ('$publisher_name','$email','$hotline','$location')";
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
        header("location: admin_add_publisher.php");
    }
}

?>
<script type="text/javascript" src="../js/edit-js.js"></script>