<?php
/**
 * read config file frogs.ini
 */
$ini_file = "/conf/application.ini";
$ini_file = (dirname(dirname(__FILE__))) . $ini_file;
$ini_array = parse_ini_file($ini_file);
foreach( $ini_array as $key => $value ) {
    define($key, $value);
}

// debugモード
if(DEBUGMODE=="yes"){
    define("DEBUG",true);
    error_reporting(E_ALL);
}else{
    define("DEBUG",false);
    error_reporting(0);
}


/**
 * lib file 
 */
require_once("phpmarkdown/Markdown.php");
require_once("phpmarkdown/MarkdownExtra.php");
require_once("help.class.php");

// ヘルプ用意
Helps::setHelps();