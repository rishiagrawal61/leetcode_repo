<?php
class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer[]
     */
    function arrayRankTransform($arr) {
        $eleArr = [];
        for($i = 0;$i<count($arr);$i++)
            $eleArr[$arr[$i]] = 0;
        ksort($eleArr);$i = 0;
        foreach($eleArr as $key => $value) {
            $eleArr[$key] = $i+1;
            $i++;
        }
        for($i = 0;$i<count($arr);$i++)
            $arr[$i] = $eleArr[$arr[$i]];
        unset($eleArr);
        return $arr;
    }
}
?>