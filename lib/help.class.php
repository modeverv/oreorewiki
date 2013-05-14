<?php
/**
 * helpsの中身をhelpクラスにくるんで持つ
 */
class Helps {
    public static $helps = array();
    
    /**
     * helpをセットする
     */
    public static function setHelps(){
        foreach(glob(dirname(dirname(__FILE__)) . "/help/*.md") as $filename){
            Helps::$helps[] = new Help($filename);
        }
    }
    /**
     * タイトルでヘルプを探す
     */
    public static function getHelpByTitle($title){
        foreach(Helps::$helps as $help){
            if($title == $help->title){
                return $help;
            }
        }
        return false;
    }
}
use \Michelf\Markdown;

/**
 * helpクラス 実態はmdファイル
 * uses php markdown
 * http://michelf.ca/projects/php-markdown/extra/
 */
class Help {

    public $filename;
    public $text;
    public $title;

    /**
     * コンストラクタ
     * 引数:*.md filename
     */
    public function __construct($filename){
        
        $this->filename = $filename;
        $this->text = file_get_contents($filename);
        $texta = explode("\n",$this->text);
        $this->title = str_replace(" ","",str_replace("　","",(str_replace("#","",$texta[0]))));
        $this->atime = fileatime($filename);
    }
    public function html(){
        return Markdown::defaultTransform($this->text);
    }
}


