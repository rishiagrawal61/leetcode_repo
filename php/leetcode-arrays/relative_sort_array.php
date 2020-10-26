<?php
class Solution {

    /**
     * @param Integer[] $arr1
     * @param Integer[] $arr2
     * @return Integer[]
     */
    function relativeSortArray($arr1, $arr2) {
        $eleArr = [];
        for($i = 0;$i<count($arr1);$i++) {
            $eleArr[$arr1[$i]]++;
        }
        $arr1 = [];
        for($i = 0;$i<count($arr2);$i++) {
            for($j = 0;$j<$eleArr[$arr2[$i]];$j++) {
                array_push($arr1, $arr2[$i]);
            }
            unset($eleArr[$arr2[$i]]);
        }
        if(count($eleArr) != 0) {
            ksort($eleArr);
            foreach($eleArr as $key => $value) {
                for($i = 0;$i<$value;$i++) {
                    array_push($arr1, $key);
                }
            }
        }
        unset($eleArr);
        return $arr1;
    }
}
?>