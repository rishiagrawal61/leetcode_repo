<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minStartValue($nums) {
        $minVal = 0;
        $prefixSum = 0;
        for($i = 0;$i<count($nums);$i++) {
            $prefixSum+=$nums[$i];
            $minVal = min($minVal,$prefixSum);
        }
        return 1-$minVal;
    }
}
?>