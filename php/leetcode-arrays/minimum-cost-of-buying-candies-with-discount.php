<?php
class Solution {

    /**
     * @param Integer[] $cost
     * @return Integer
     */
    function minimumCost($cost) {
        $len = count($cost);
        if($len == 1)
            return $cost[0];
        if($len == 2)
            return array_sum($cost);
        sort($cost);
        $sum = 0;
        $lastVal = -1;
        for($i = $len-1;$i>=0;$i-=3){
            if($i < 2) {
                $lastVal = $i;
                break;
            }
            $sum+=$cost[$i]+$cost[$i-1];
        }
        if($lastVal != -1) {
            for($i = 0;$i<$lastVal+1;$i++)
                $sum+=$cost[$i];
        }
        return $sum;
    }
}
?>