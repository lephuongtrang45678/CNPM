<?php
include("./check_login.php");
include ("header.php");
  $count = 0;
?>
    <?php
    if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
      if(isset($title) && $title == "Index") {
    ?>
    <?php } ?>
      <!-- hàng cột -->
      <p class="lead text-center text-muted">Sách mới nhất</p>
      <div class="row">
                    <div class="col-md-2">
                    <a href="./click_book.php">
                        <img src="./img/book4.jpg" alt="">
                    </a>
                    </div>
                    <div class="col-md-2">
                    <a href="./img/book5.jpg">
                        <img src="./img/book5.jpg" alt="">
                    </a>
                    </div>
                    <div class="col-md-2">
                    <a href="./img/book6.jpg">
                        <img src="./img/book6.jpg" alt="">
                    </a>
                    </div>
                    <div class="col-md-2">
                    <a href="./img/book7.png">
                        <img src="./img/book7.png" alt="">
                    </a> </div>
                    <div class="col-md-2">
                    <a href="./img/book8.gif">
                        <img src="./img/book8.gif" alt="">
                    </a>
                    </div>
                    <div class="col-md-2">
                    <a href="./img/book9.jpg">
                        <img src="./img/book9.jpg" alt="">
                    </a>
                    </div>

       </div>


<?php
  if(isset($conn)) {mysqli_close($conn);}
  include ("footer.php");
?>