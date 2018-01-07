<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
require"config.inc.php";
require"AI/Ai.php";
//判断是否传值了！
if(!isset($_GET['str'])){
	die('["500","Hey,你没有向我传值呀！"]');
}
//如果传值正常则继续
$input=$_GET['str'];
$arr=json_decode($input);
//为防止恶意调用进行Key验证

if($arr[0]!=$key)
{
	die('["499","Hey,你的key不对呀！"]');
}


 $returnestr=prepare($arr[1]);
 
 
 echo '["100","'.$returnestr.'"]';
 

?>