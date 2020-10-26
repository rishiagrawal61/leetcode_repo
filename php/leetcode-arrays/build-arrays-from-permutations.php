<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function buildArray($nums) {
        $ans = [];
        for($i = 0;$i<count($nums);$i++) {
            array_push($ans, $nums[$nums[$i]]);
        }
        return $ans;
    }
}
?>