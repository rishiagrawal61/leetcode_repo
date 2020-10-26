<?php
class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer[][]
     */
    function minimumAbsDifference($arr) {
        sort($arr);$min = PHP_INT_MAX;
        for($i = 0;$i<count($arr)-1;$i++) {
            if($min > $arr[$i+1]-$arr[$i])
                $min = $arr[$i+1]-$arr[$i];
        }
        $newArr = [];
        for($i = 0;$i<count($arr)-1;$i++) {
            if($arr[$i+1]-$arr[$i] == $min) {
                array_push($newArr, array($arr[$i], $arr[$i+1]));
            }
        }
        return $newArr;
    }
}
?>