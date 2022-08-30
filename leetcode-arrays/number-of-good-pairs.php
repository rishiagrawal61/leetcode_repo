<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function numIdenticalPairs($nums) {
        $eleArr = [];
        for($i = 0;$i<count($nums);$i++) {
            if(isset($eleArr[$nums[$i]]))
                $eleArr[$nums[$i]]++;
            else 
                $eleArr[$nums[$i]] = 1;
        }
        $pairs = 0;
        foreach($eleArr as $key => $value) {
            if($eleArr[$key] != 1) {
                $pairs+=(($eleArr[$key]*($eleArr[$key]-1))/2);
            }
        }
        return $pairs;
    }
}
?>