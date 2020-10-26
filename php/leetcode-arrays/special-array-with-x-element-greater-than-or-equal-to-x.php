<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function specialArray($nums) {
        $minVal = min($nums);
        for($i = 0;$i<=count($nums);$i++) {
            $val = 0;
            for($j = 0;$j<count($nums);$j++) {
                if($nums[$j] >= $i)
                    $val++;
            }
            if($val == $i){
                return $i;
            }
        }
        return -1;
    }
}
?>