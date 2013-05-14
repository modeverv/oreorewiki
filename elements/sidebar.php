<?php
require_once dirname(dirname(__FILE__)) . "/lib/lib.php";
//画面高さ調整
$hcount = 0;
?>
<div data-spy="affix" data-offset-bottom="200">

<div class="well sidebar-nav">
  <ul class="nav nav-list">
    <li><a href="./">トップページ</a></li>
    <li><a href="./help_all.php" target="_blank">全ページ出力</a></li>
  </ul>
</div><!--/.well -->
    
<div class="well sidebar-nav">
  <ul class="nav nav-list">
    <li class="nav-header">ヘルプ</li>
    <?php foreach (Helps::$helps as $help) { $hcount++ ?>
    <li><a href="help.php?help=<?php echo $help->title;?>"><?php echo $help->title;?></a></li> 
    <?php } ?>
  </ul>
</div><!--/.well -->

    
</div>                                                 
<style>
  .row-fluid { min-height:<?php echo (380 + 20 * $hcount );?>px }
</style>  
