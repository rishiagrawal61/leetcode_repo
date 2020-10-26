<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function countKDifference($nums, $k) {
        $eleArr = [];
        for($i = 0;$i<count($nums);$i++) {
            if($nums[$i]-$k > 0)
                $eleArr[$nums[$i]-$k]++;
        }
        $sum = 0;
        for($i = 0;$i<count($nums);$i++) {
            $sum+=$eleArr[$nums[$i]];
        }
        return $sum;
    }
}
?>