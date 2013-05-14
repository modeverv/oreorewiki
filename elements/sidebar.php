<?php
require_once dirname(dirname(__FILE__)) . "/lib/lib.php";
//画面高さ調整
$hcount = 0;

//===============================================
// 一定文字数で改行を挿入する
//===============================================
function insertBR( $str, $n, $enc='UTF8' ){
  return $str;
  //空であれば空を返す
  if( strlen( $str ) <= 0 ){
    return( "" );
  }
  //初期化
  $str_join = "";
  $str_char = "";
  $cnt = 0;
  //一文字ずつ処理
  for( $i = 0; $i < mb_strlen( $str, $enc ); $i++ ){
    $str_char = mb_substr( $str, $i, 1, $enc );
    //セットする文字が半角か全角であるか判別しカウント
    $cnt += checkHankaku( $str_char, $enc ) ? 1 : 2;
    //カウント数が規定文字数以上になっていれば
    if( $cnt >= $n ){
      $cnt = 0;
      $str_join .= "<br/>";
    }
    //一文字ずつ末尾にセット
    $str_join .= $str_char;
  }
  return( $str_join );
}   
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
      <input value="<?php echo $_REQUEST['query']?>" name="query" type="text" style="width:60%;margin-left:10px;color:#222;" class="span1">
      <button type="submit" class="btn">検索</button>
    </div>
  </form>            
</div><!--/.well -->

<div class="well sidebar-nav">
  <ul class="nav nav-list">
    <li class="nav-header">コンテンツ</li>
    <?php foreach (Helps::$helps as $help) { $hcount++ ?>
    <li><a href="help.php?help=<?php echo $help->title;?>"><?php echo $help->title ?></a></li> 
    <?php } ?>
  </ul>
</div><!--/.well -->


    
<style>
  .row-fluid { min-height:<?php echo (380 + 20 * $hcount );?>px }
</style>  
