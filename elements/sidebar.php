<?php
require_once dirname(dirname(__FILE__)) . "/lib/lib.php";
//画面高さ調整
$hcount = 0;
?>
<div class="well sidebar-nav">
  <ul class="nav nav-list">
    <li><a href="./">トップページ</a></li>
    <li><a href="./help_all.php" target="_blank">全ページ出力</a></li>
  </ul>
</div><!--/.well -->

<div class="well sidebar-nav">
  <ul class="nav nav-list">
    <li class="nav-header">検索</li>
  </ul>  
  <form class="form" action="help_search.php" style="margin-bottom:0px;">
    <div class="input-append">
      <input value="<?php echo $_REQUEST['query']?>" name="query" type="text" style="margin-left:10px;color:#222;" class="span2">
      <button type="submit" class="btn">検索</button>
    </div>
  </form>            
</div><!--/.well -->

<div class="well sidebar-nav">
  <ul class="nav nav-list">
    <li class="nav-header">コンテンツ</li>
    <?php foreach (Helps::$helps as $help) { $hcount++ ?>
    <li><a href="help.php?help=<?php echo $help->title;?>"><?php echo $help->title;?></a></li> 
    <?php } ?>
  </ul>
</div><!--/.well -->


    
<style>
  .row-fluid { min-height:<?php echo (380 + 20 * $hcount );?>px }
</style>  
