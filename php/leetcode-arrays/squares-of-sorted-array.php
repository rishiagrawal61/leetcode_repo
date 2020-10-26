<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortedSquares($nums) {
        $pos = -1;$newArr = [];$len = count($nums);
        for($i = 0;$i<count($nums);$i++) {
            if($nums[$i] >= 0){
                $pos = $i;
                break;
            } 
        }
        if($pos == -1) $pos = count($nums) - 1;
        $j = 0;
        for($i = $pos;$i<count($nums);$i++) {
            $newArr[$j] = $nums[$i] * $nums[$i];
            $j++;
        }
        $negArr = [];$j = 0;
        for($i = $pos-1;$i>=0;$i--) {
            $negArr[$j] = $nums[$i] * $nums[$i];
            $j++;
        }
        $nums = [];$j = 0;$k = 0;
        for($i = 0;$i<$len;$i++) {
            if($j < count($newArr) && $k < count($negArr)) {
                if($newArr[$j] < $negArr[$k]) {
                    array_push($nums, $newArr[$j]);
                    $j++;
                } else {
                    array_push($nums, $negArr[$k]);
                    $k++;
                }
            } else {
                if($j == count($newArr)) {
                    for($l = $k;$l<count($negArr);$l++) {
                        array_push($nums, $negArr[$l]);
                    }
                    break;
                } else {
                    for($l = $j;$l<count($newArr);$l++) {
                        array_push($nums, $newArr[$l]);
                    }
                    break;
                }
            }
        }
        return $nums;
    }
}
?>