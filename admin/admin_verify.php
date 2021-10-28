<?php
    session_start();
    if(isset($_POST['submit'])){
        $email = $_POST['name'];
        $pass = $_POST['pass'];
        
        
        //kết nối
        include('./connect.php');
     
        //truy vấn tt
        $sql = "SELECT * FROM `admin` WHERE name = '$email' and pass = '$pass'";
        $result = mysqli_query($conn, $sql);

        //xác thực, đăng nhập
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
            $user_name = $row['name'];
            $passTrue = $row['pass'];
            }

            if($pass==$passTrue){
                header("Location:admin_book.php");
                $_SESSION['success'] = $user_name;
            }
            else{
                echo 'Mật khẩu không chính xác';
                header("Location:admin.php");
            }
        }
        else{
           echo 'Email không chính xác';     
           header("Location:admin.php");
        }

        //đóng kết nối

    }
?>
