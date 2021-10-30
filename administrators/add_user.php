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
                    <label for="userid" class="form-label">Mã người dùng</label>
                    <input type="" name="userid" class="form-control" id="userid" value="">
                </div>
                <div class="col-md-4">
                    <label for="first_name" class="form-label">Họ</label>
                    <input type="" name="first_name" class="form-control" id="first_name" value="Lê">
                </div>
                <div class="col-md-4">
                    <label for="last_name" class="form-label">Tên</label>
                    <input type="" name="last_name" class="form-control" id="last_name" value="Phương	Trang">
                </div>
                <div class="col-md-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="lephuongtrang45678@gmail.com">
                </div>
                <div class="col-md-4">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="col-md-4">
                    <label for="status" class="form-label">status</label>
                    <input type="text" name="status" class="form-control" id="status">
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="col">
                        <label for="avatar" class="form-label">Thêm ảnh</label>
                        <input type="file" id="fileToUpload" name="fileToUpload" class=" mb-3 form-control" value="chọn ảnh">
                        <div class="preview mb-3">
                            <div id="preview">
                                <img src="#" hidden />
                            </div>
                            <div id="err"></div>
                        </div>
                    </div>
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
    $userid = $_POST['userid'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['status'];


    $target_dir = "img/img_user/"; //chỉ định thư mục nơi tệp sẽ được đặt
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); //chỉ định đường dẫn của tệp sẽ được tải lên
    $uploadOk = 1; //chưa được sử dụng (sẽ được sử dụng sau)
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //giữ phần mở rộng tệp của tệp 

    // kiểm tra kích cỡ ảnh
    if (
        $_FILES["fileToUpload"]["size"] > 500000
    ) {
        echo "Xin lỗi,cỡ ảnh bạn quá lớn.";
        $uploadOk = 0;
    }

    // cho phép các dạng form ảnh
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo " Xin lỗi, chỉ có tệp JPG, JPG, PNG & GIF được phép.";
        $uploadOk = 0;
    }

    // kiểm tra nếu $uploadOk = 0
    if ($uploadOk == 0) {
        echo "Xin lỗi, tập tin của bạn đã không được tải lên.";
        // Hoàn thành tải lên tập tin PHP Script
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "Tệp " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " đã thành công.";
        } else {
            echo "Xin lỗi, đã có lỗi tải lên tệp của bạn.";
        }
    }

    $pass_hash = password_hash($password, PASSWORD_DEFAULT);

    //2. SQL Query to Save the data into database
    $sql = "INSERT INTO users(userid, first_name, last_name, email, password, registration_date, status, code, avatar) 
    VALUES (NULL,'$first_name','$last_name','$email','$pass_hash',NULL,'$status',NULL,'$target_file')";
    //3. Executing Query and Saving Data into Datbase
    $res = mysqli_query($conn, $sql);

    //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
    if ($res == TRUE) {
        //Data Inserted

        //Create a Session Variable to Display Message
        $_SESSION['add'] = "<div class='danger'>thêm thành công</div>";
        header("location: danhba_user.php");
    } else {

        $_SESSION['add'] = "<div class='error'>không hợp lệ</div>";
        //Redirect Page to Add Admin
        header("location: add_user.php");
    }
}

?>
<script type="text/javascript" src="../js/edit-js.js"></script>