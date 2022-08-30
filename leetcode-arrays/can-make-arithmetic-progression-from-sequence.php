<?php
class Solution {

    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function canMakeArithmeticProgression($arr) {
        $eleArr = [];
        for($i = 0;$i<count($arr);$i++) {
            $eleArr[$arr[$i]]++;
        }
        if(count($eleArr) == 1){
            return true;
        }
        $maxVal = max($arr);
        $diff = 0;$i = 0;$j = 0;
        foreach($eleArr as $key => $value) {
            if($value > 1) {
                return false;
                break;
            } else {
                if($i == 0 || $diff == 0) {
                    $counter = 0;
                    $diff = 1;
                    while(!isset($eleArr[$key+$diff])){
                        $diff++;
                        if($counter == $maxVal){
                            $j++;
                            $diff = 0;
                            break;
                        }
                        $counter++;
                    }
                } else {
                    if(!isset($eleArr[$key+$diff])){
                        if($j == 1)
                            return $false;
                        $j++;
                    }
                }
                $i++;
            }
        }
        return true;
    }
}
?>