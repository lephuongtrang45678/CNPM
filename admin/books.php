<?php
include("header.php");
$title = "Full Catalogs of Books";
  
?>
  <p class="lead text-center text-muted">Danh mục đầy đủ sách</p>
  <div class="row">
                    <div class="col-md-3">
                    <a href="./img/book4.jpg">
                        <img src="./img/book4.jpg" alt="">
                    </a>
                    </div>
                    <div class="col-md-3">
                    <a href="./img/book5.jpg">
                        <img src="./img/book5.jpg" alt="">
                    </a>
                    </div>
                    <div class="col-md-3">
                    <a href="./img/book6.jpg">
                        <img src="./img/book6.jpg" alt="">
                    </a>
                    </div>
                    <div class="col-md-3">
                    <a href="./img/book7.png">
                        <img src="./img/book7.png" alt="">
                    </a>
                    </div>
                    <div class="col-md-3">
                    <a href="">
                        <img src="./img/book8.gif" alt="">
                    </a>
                    </div>
                    <div class="col-md-3">
                    <a href="./img/book9.jpg">
                        <img src="./img/book9.jpg" alt="">
                    </a>
                    </div>
                    <div class="col-md-3">
                    <a href="./img/book10.jpg">
                        <img src="./img/book10.jpg" alt="">
                    </a>
                    </div>
                    <div class="col-md-3">
                    <a href="./img/book11.jpeg">
                        <img src="./img/book12.jpg" alt="">
                    </a>
                    </div>


       </div>
<?php
  if(isset($conn)) { mysqli_close($conn); }
  include( "footer.php");
?>