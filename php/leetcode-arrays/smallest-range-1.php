<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function smallestRangeI($nums, $k) {
        $minVal = min($nums);
        $maxVal = max($nums);
        return ($maxVal-$minVal)>2*$k ? ($maxVal-$minVal)-2*$k : 0;
    }
}
?>