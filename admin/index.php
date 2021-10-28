<?php
  session_start();
  $count = 0;
  // connecto database
  
  $title = "Index";
  include ("./template/header.php");

?>
    <?php
      if(isset($title) && $title == "Index") {
    ?>
    <?php } ?>
      <!-- Example row of columns -->
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
  include ("./template/footer.php");
?>