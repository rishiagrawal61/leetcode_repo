<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function minSubsequence($nums) {
        $totSum = array_sum($nums);
        $eleArr = [];$maxVal = PHP_INT_MIN;
        for($i = 0;$i<count($nums);$i++) {
            if($maxVal < $nums[$i]) $maxVal = $nums[$i];
            $eleArr[$nums[$i]]++;
        }
        $maxArr = [];$maxSum = 0;$eleArr1 = $eleArr;$totSum1 = $totSum;
        foreach($eleArr as $key => $value) {
            $maxSum+=$maxVal*$eleArr[$maxVal];
            $totSum-=$maxVal*$eleArr[$maxVal];
            array_push($maxArr, $maxVal);
            if($maxSum > $totSum) {
                break;
            } else {
                unset($eleArr[$maxVal]);
                $maxVal1 = PHP_INT_MIN;
                foreach($eleArr as $key1 => $value1) {
                    if($maxVal1 < $key1) $maxVal1 = $key1;
                }
                $maxVal = $maxVal1;
            }
        }
        $maxArr1 = [];$maxSum = 0;
        for($i = 0;$i<count($maxArr);$i++) {
            for($j = 0;$j < $eleArr1[$maxArr[$i]];$j++) {
                if($maxSum > $totSum1/2) break;
                $maxSum+=$maxArr[$i];
                array_push($maxArr1, $maxArr[$i]);
            }
        }
        return $maxArr1;
    }
}
?>