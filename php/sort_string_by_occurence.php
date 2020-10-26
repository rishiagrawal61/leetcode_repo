<?php
sortOcc("rishiagrawal");
function getCount($str, $char){
	$count = 0;
	for($i = 0;$i<count($str);$i++){
    	if($str[$i] == $char){
        	$count++;
        }
    }
    return $count;
}
function sortOcc($str){
	$arr = array();
	$str1 = str_split($str);
	$j = 0;
    foreach($str1 as $i){
    	$arr[$j] = ([getCount($str1,$str1[$j]), $str1[$j]]);
    	$j++;
    }
    sort($arr);
    $str = '';$prev = '';$count = 0;
    for($i = 0;$i<count($arr);$i++){
        if($prev == $arr[$i][1]){
            $count++;
            if($i == (count($arr)-1)){
                $str.=$count;
            }
        }
        else{
            if($i <> 0){
                $str.=$count;
                $count = 0;
            }
        }
        if($count == 0){
            $str.=$arr[$i][1];
            $count = 1;
        }
        $prev = $arr[$i][1];
    }
    var_dump($str);
}
?>