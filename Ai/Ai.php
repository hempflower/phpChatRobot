<?php
//语义分析

function prepare($string) {
    if(!file_exists("AI/jsonAi.json")){
        die('["498",":( em......我们无法为您提供服务"]');
    }
   
    
    $result=null;
    $onf=fopen("AI/jsonAi.json","r");
    $dir=fread($onf,filesize("AI/jsonAi.json"));
    $json = $dir;
    //$que=json_decode($dir);
    //echo iconv('gb2312','utf-8',$json);
    $que=json_decode(iconv('gb2312','utf-8//TRANSLIT//IGNORE',$json));
    //var_dump($que);
    //similar_text("Hello World","Hello Peter",$percent);
    $per=null;
    $i=null;
    $ques=null;
    //echo count($que);
    $percent=null;
    
    for($i=0;$i<=count($que)-1;$i++)
    {
        //echo "一次循环";
        //echo "=================================";
        similar_text($string,$que[$i][0],$percent);
        //echo $string;
        //echo ",,,";
        //echo $que[$i][0];
        //echo $percent;
        //echo "\n";

        if($percent>=$per){
           // echo $percent;
           // echo "\n";
           // echo ".....";
            
            
            //$ques=$i;
            //echo $per;
            //echo "\n";
            if($percent>$per){
                $ques=null;
                //var_dump($ques);
                $ques=array($i);
                //var_dump($ques);

            }else{
                if(!isset($ques)){
                    $ques=array($i);
                    //var_dump($ques);
                 
                }else{
                    array_push($ques,$i);
                    //var_dump($ques);
                }
            }
            $per=$percent;
        }
        //echo $per;
        //echo $que[$i][1];
        //var_dump($ques);
    }
    //var_dump($ques);
    //echo $per;
    if($per<40){
        //echo $percent;
        return $string;
    }
   

    //echo $ques;
    //echo count($que[0]);
    //mt_rand(5, 15);
    //var_dump($ques);
    $t=mt_rand(0,count($ques)-1);
    $num=$ques[$t];
    $result=$que[$num][1];
    fclose($onf);
    return $result;
    

}








?>