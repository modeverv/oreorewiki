<?php
require_once "lib/lib.php";

// queryなければ飛ばす
if(!isset($_REQUEST['query'])){
    header("Location: help.php");
    exit;
}

$query = escapeshellcmd($_REQUEST['query']);

$command = "find help -name \"*.md\" -type f -print | xargs grep -nH -e '{$query}' ";
// 脆弱性について
//`rm -fr ~/tmp/*` => find help -name "*.md" -type f -print | xargs grep -nH -e '\`rm -fr \~/tmp/\*\`'
// で確認。
//var_dump($command);

exec($command,$output);

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
          <h1>検索結果</h1>
          <?php if(count($output)==0){ ?>
          <p>検索結果はありません。</p>
          <?php }else{ ?>
          <ul style="list-style-position:inside;">             
            <?php foreach($output as $line){?>
              <?php
                 $a = explode(":",$line);
                 $help = Helps::getHelpByFileName(dirname(__FILE__)."/".$a[0]);
                 $highlight = str_replace($_REQUEST['query'],"<span style='background:yellow;'>{$_REQUEST['query']}</span>",$a[2]);
                 if($help){
                   $h = urlencode($help->title);
                   echo "<li><a href=\"help.php?help={$h}\">{$help->title}</a><br/>{$highlight}</li>";
                 }
              ?>
            <?php }?>
         </ul>
        <?php } ?>
        </div><!--/span-->
            
      </div><!--/row-->
                                
<?php include "elements/footer.php";?>      
