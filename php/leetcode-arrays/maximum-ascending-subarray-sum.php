<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxAscendingSum($nums) {
        $max = $nums[0];$sum = $nums[0];
        for($i = 1;$i<count($nums);$i++) {
            if($nums[$i-1] < $nums[$i])
                $sum+=$nums[$i];
            else {
                if($max < $sum)
                    $max = $sum;
                $sum = $nums[$i];
            }
            if($max < $sum)
                $max = $sum;
        }
        return $max;
    }
}
?>