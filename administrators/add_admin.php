<?php
ob_start();
include("index.php");
?>

<div class="container-fluid">
    <div class="row mt-5">
        <div class="col d-flex"><a href="index.php" class="text-danger"><i class="fas fa-chevron-left "></i></a>
            <h4 class="ms-2">Trở lại danh bạ</h4>
        </div>
        <div class="col text-end"><a href="./index.php"><button class="btn btn-outline-danger" type="submit">Hủy</button></a></div>
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
                    <label for="name" class="form-label">Tên người dùng</label>
                    <input type="" name="name" class="form-control" id="name" value="admin">
                </div>
                <div class="col-md-4">
                    <label for="pass" class="form-label">password</label>
                    <input type="password" name="pass" class="form-control" id="pass">
                </div>
                <div class="col-md-4">
                    <label for="id_Addministrators " class="form-label">Mã Addministrators </label>
                    <input type="" name="id_Addministrators " class="form-control" id="id_Addministrators " value="1">
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

    //1. Get the DAta from Form
    $name = $_POST['name'];
    $pass = md5($_POST['pass']);
    $id_Addministrators = $_POST['id_Addministrators'];


    echo $sql = "INSERT INTO `admin`(`idAd`, `name`, `pass`, `id_Addministrators`) VALUES (NULL,'$name','$pass', '$id_Addministrators')";
    //3. Executing Query and Saving Data into Datbase
    $res = mysqli_query($conn, $sql);

    //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
    if ($res == TRUE) {
        //Data Inserted

        //Create a Session Variable to Display Message
        $_SESSION['add'] = "<div class='danger'>thêm thành công</div>";
        header("location: danhba_admin.php");
    } else {

        $_SESSION['add'] = "<div class='error'>không hợp lệ</div>";
        //Redirect Page to Add Admin
        header("location: add_admin.php");
    }
}

?>