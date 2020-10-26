<?php
class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer[][] $pieces
     * @return Boolean
     */
    function canFormArray($arr, $pieces) {
        $eleArr = [];
        for($i = 0;$i<count($pieces);$i++) {
            $eleArr[$pieces[$i][0]] = $i;
        }
        $a = 0;$counter = 1;$key = 0;
        for($i = 0;$i<count($arr);$i++) {
            if(isset($eleArr[$arr[$i]]) && $a == 0) {
                if(count($pieces[$eleArr[$arr[$i]]]) != 1) {
                    if($pieces[$eleArr[$arr[$i]]][0] != $arr[$i])
                        return false;
                    $a++;
                    $key = $eleArr[$arr[$i]];
                }
            } else {
                if($a > 0) {
                    if($pieces[$key][$counter] != $arr[$i]) {
                        $a = 0;
                        $counter = 1;
                        $key = 0;
                        return false;
                    } else {
                        if((count($pieces[$key])-1) > $counter) {
                            $counter++;
                        } else {
                            $a = 0;
                            $counter = 1;
                            $key = 0;
                        }
                    }
                } else
                    return false;
            }
        }
        return true;
    }
}
?>