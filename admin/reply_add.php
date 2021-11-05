<?php
include("./header.php");
$bookadid=$_GET['bookadid'];
$sql="select * from books_add where book_ad_id = $bookadid";
$result = mysqli_query($conn, $sql);
		//bước 3 xử lý kết quả trả về
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)){
                $book_title=$row['book_title'];
                $book_author=$row['book_author'];
                $book_image=$row['book_image'];
                $book_descr=$row['book_descr'];
            }

            }
            else echo $sql;
?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col d-flex"><a href="index.php"><i class="fas fa-chevron-left "></i></a>
            <h4 class="ms-2">Trở lại trang chủ</h4>
        </div>
        <div class="col text-end"><a href="./reply.php"><button class="btn btn-outline-danger" type="submit">Hủy</button></a></div>
    </div>
    <div class="row">
        <div class="col border p-3 rounded-2 mt-3">
            <form method="POST" class="row g-3 " enctype="multipart/form-data">
                <div class="col-md-4">
                    <label for="book_isbn" class="form-label"></label>
                    <input type="text" name="book_isbn" class="form-control" id="book_isbn">
                    <div class="text-muted"><small>Mã vạch</small></div>
                </div>
                <div class="col-md-4">
                    <label for="book_title" class="form-label">Tiêu đề</label>
                    <input value="<?php echo $book_title?>" type="text" name="book_title" class="form-control" id="book_title" >
                </div>
                <div class="col-md-4">
                    <label for="book_author" class="form-label">Tác giả</label>
                    <input value="<?php echo $book_author?>" type="text" name="book_author" class="form-control" id="book_author">
                </div>
                <div class="col-md-4">
                    <label for="book_Category" class="form-label">Chủ đề</label>
                    <input type="text" name="book_Category" class="form-control" id="book_Category" >
                </div>
                <div class="col-md-4">
                    <label for="book_descr" class="form-label">Miêu tả về sách</label>
                    <input value="<?php echo $book_descr?>" type="text" name="book_descr" class="form-control" id="book_descr" >
                </div>
                <div class="col-md-4">
                    <label for="book_price" class="form-label">Giá bán</label>
                    <input type="text" name="book_price" class="form-control" id="book_price" >
                </div>
                <div class="col-md-4">
                    <label for="publisherid" class="form-label">Nhà sản xuất</label>
                    <input type="text" name="publisherid" class="form-control" id="publisherid" >
                </div>
                <div class="col">
                    <label for="avatar" class="form-label">Thay đổi ảnh</label>
                    <input value="<?php echo $book_image?>" type="file" id="fileToUpload" name="fileToUpload" accept="images/*" class=" mb-3 form-control" value="chọn ảnh">
                    <div class="preview mb-3">
                        <div id="preview">
                            <img src="#" hidden />
                        </div>
                        <div id="err"></div>
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


    //echo "CLicked";

    //1. Get the DAta from Form
    $book_isbn1 = $_POST['book_isbn'];
    $book_title1 = $_POST['book_title'];
    $book_author1 = $_POST['book_author'];
    $book_Category1 = $_POST['book_Category'];
    $book_descr1 = $_POST['book_descr'];
    $book_price1 = $_POST['book_price'];
    $publisherid1 = $_POST['publisherid'];


    $target_dir1 = "img/img-index/"; //chỉ định thư mục nơi tệp sẽ được đặt
    $target_file = $target_dir1 . basename($_FILES["fileToUpload"]["name"]); //chỉ định đường dẫn của tệp sẽ được tải lên
    $uploadOk = 1; //chưa được sử dụng (sẽ được sử dụng sau)
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //giữ phần mở rộng tệp của tệp 

    $target_dir_2 = "img/img-index/";
    $target_file_2 = $target_dir_2 . basename($_FILES["fileToUpload"]["name"]); //chỉ định đường dẫn của tệp sẽ được tải lên


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

    // echo $avatar;
    // update
    //2. SQL Query to Save the data into database
    $sql1 = "INSERT INTO `books`(`book_isbn`, `book_title`, `book_author`, `book_image`, `book_Category`, `book_descr`, `book_price`, `publisherid`) 
    VALUES ('$book_isbn1','$book_title1','$book_author1','$target_dir_2','$book_Category1','$book_descr1','$book_price1','$publisherid1')";
    //3. Executing Query and Saving Data into Datbase
    $res1 = mysqli_query($conn, $sql1);

    //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
    if ($res1 == TRUE)
    {
     $sql2="Delete from books_add where book_ad_id=$bookadid";
     $res2=mysqli_query($conn,$sql2);
     if ($res2>0)
     header("location: reply.php");
     else echo $sql2;
    }else echo $sql1;}
?>
<script type="text/javascript" src="../js/edit-js.js"></script>