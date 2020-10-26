<?php
class Solution {

    /**
     * @param Integer[] $cost
     * @return Integer
     */
    function minCostClimbingStairs($cost) {
        $newArr = [];
        $len = count($cost)-1;
        $newArr[$len] = $cost[$len];
        $newArr[$len-1] = $cost[$len-1];
        for($i = count($cost)-2;$i>=0;$i--) {
            $newArr[$i] = $cost[$i];
            if($newArr[$i+1] > $newArr[$i+2]) {
                $newArr[$i]+=$newArr[$i+2];
            } else {
                $newArr[$i]+=$newArr[$i+1];
            }
        }
        if($newArr[0] > $newArr[1]) {
            return $newArr[1];
        } else {
            return $newArr[0];
        }
    }
}
?>