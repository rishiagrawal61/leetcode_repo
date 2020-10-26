<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $n
     * @return Integer[]
     */
    function shuffle($nums, $n) {
        $arr = [];
        for($i = 0;$i<=$n-1;$i++){
            array_push($arr, $nums[$i]);
            array_push($arr, $nums[$n+$i]);
        }
        return $arr;
    }
}
?>