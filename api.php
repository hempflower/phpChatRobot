<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
require"config.inc.php";
require"AI/Ai.php";
//�ж��Ƿ�ֵ�ˣ�
if(!isset($_GET['str'])){
	die('["500","Hey,��û�����Ҵ�ֵѽ��"]');
}
//�����ֵ���������
$input=$_GET['str'];
$arr=json_decode($input);
//Ϊ��ֹ������ý���Key��֤

if($arr[0]!=$key)
{
	die('["499","Hey,���key����ѽ��"]');
}


 $returnestr=prepare($arr[1]);
 
 
 echo '["100","'.$returnestr.'"]';
 

?>