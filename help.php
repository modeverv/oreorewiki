<?php
require_once "lib/lib.php";
$help_help = false;
if (isset($_REQUEST["help"])){
    $help_help = Helps::getHelpByTitle($_REQUEST["help"]);
}
?>
<?php include "elements/header.php"; ?>

    <div class="container-fluid">
      <div class="row-fluid">
        <!-- sidebar -->
        <div class="span2">
          <?php include "elements/sidebar.php"?>
        </div><!--/span-->

        <!-- main -->
        <div class="span10">
        <?php if($help_help){ ?>
         <?php echo $help_help->html;
               $time = date("Y-m-d H:i:s",$help->atime);
               echo "<div><pre>最終更新:{$time}</pre></div>";
         ?>
        <?php  } else { ?>
          <ul class="nav nav-list">
            <li class="nav-header">ドキュメント一覧</li>
            <?php foreach (Helps::$helps as $h) {?>
            <li><a href="help.php?help=<?php echo $h->title;?>"><?php echo $h->title;?></a></li>
            <?php } ?>
          </ul>
        <?php } ?>
        </div><!--/span-->
      </div><!--/row-->
                                
<?php include "elements/footer.php";?>      
