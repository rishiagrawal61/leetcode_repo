<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function arrayPairSum($nums) {
        sort($nums);
        for($i = 0;$i<count($nums);$i+=2){
            $count+=min($nums[$i],$nums[$i+1]);
        }
        return $count;
    }
}
?>