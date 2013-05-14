<?php
require_once "lib/lib.php";

?>
<?php include "elements/header.php"; ?>

    <div class="container-fluid">
      <div class="row-fluid">
    
        <!-- sidebar -->
        <div class="span3">
          <?php include "elements/sidebar.php"?>
        </div><!--/span-->
   
        <!-- main -->
        <div class="span9">
        <?php if(count($errors)>0){?>
        <div class="alert alert-error">
          <?php foreach($errors as $e){echo "<div>{$e}</div>";} ?>
        </div>
        <?php }?>

        <div id="myCarousel" class="carousel">
          <div class="ecarousel-inner">
            <img src="./assets/img/back.jpg" style="height:100%;width:100%;" alt="">
            <div class="carousel-caption">
              <h1 style="color:white;text-align:center"><?php echo APPNAME ;?></h1>
            </div>
          </div>
        </div>
                                
        </div><!--/span-->              
              
      </div><!--/row-->
                                
<?php include "elements/footer.php";?>      
