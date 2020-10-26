<?php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[][]
     */
    function transpose($matrix) {
        $n = count($matrix[0]);$var = 0;
        $len = count($matrix);
        for($i = 0;$i<$len;$i++) {
            if($n >= count($matrix)){
                for($j = $i;$j<$n;$j++) {
                    if($i == $j)
                        continue;
                    if(!isset($matrix[$j][$i])){
                        $matrix[$j][$i] = $matrix[$i][$j];
                        unset($matrix[$i][$j]);
                    } else if (!isset($matrix[$i][$j])) {
                        $matrix[$i][$j] = $matrix[$j][$i];
                        unset($matrix[$j][$i]);
                    } else {
                        $temp = $matrix[$i][$j];
                        $matrix[$i][$j] = $matrix[$j][$i];
                        $matrix[$j][$i] = $temp;
                    }
                }  
            } else {
                $var++;
                for($j = $i;$j<$len;$j++) {
                    if($i == $j)
                        continue;
                    if(!isset($matrix[$j][$i])){
                        $matrix[$j][$i] = $matrix[$i][$j];
                        unset($matrix[$i][$j]);
                    } else if (!isset($matrix[$i][$j])) {
                        $matrix[$i][$j] = $matrix[$j][$i];
                        unset($matrix[$j][$i]);
                    } else {
                        $temp = $matrix[$i][$j];
                        $matrix[$i][$j] = $matrix[$j][$i];
                        $matrix[$j][$i] = $temp;
                    }
                }  
            }
        }
        if($var != 0) {
            $eleArr = [];
            for ($i = 0;$i<count($matrix);$i++) {
                if(count($matrix[$i]) > 0)
                    $eleArr[$i] = $matrix[$i];
                else
                    break;
            }
            $matrix = $eleArr;
            unset($eleArr);
        }
        return $matrix;
    }
}
?>