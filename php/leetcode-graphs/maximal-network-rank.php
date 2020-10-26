<?php
class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $roads
     * @return Integer
     */
    function maximalNetworkRank($n, $roads) {
        if(count($roads) == 0)
            return 0;
        $eleArr = [];
        $eleArrCount = [];
        $eleArrVal = [];
        foreach($roads as $road) {
            if(isset($eleArr[$road[0]]))
                array_push($eleArr[$road[0]], $road[1]);
            else
                $eleArr[$road[0]] = [$road[1]];
            if(isset($eleArr[$road[1]]))
                array_push($eleArr[$road[1]], $road[0]);
            else
                $eleArr[$road[1]] = [$road[0]];
        }
        foreach($eleArr as $key => $val) {
            $eleArrCount[$key]+=count($val);
        }
        arsort($eleArrCount);$val = 0;$count = 0;$first = 0;
        foreach($eleArrCount as $key => $value) {
            if($count == 0)
                $first = $value;
            if($val != $value && $count<2){
                array_push($eleArrVal, $key);
                $val = $value;
                $count++;
            } else {
                if($val == $value && $count <= 2)
                    array_push($eleArrVal, $key);
                else 
                    break;
            }
        }
        $max = PHP_INT_MIN;
        for($i = 0;$i<count($eleArrVal);$i++) {
            if($eleArrCount[$eleArrVal[$i]] != $first)
                break;
            for($j = $i+1;$j<count($eleArrVal);$j++) {
                $sum = $eleArrCount[$eleArrVal[$i]]+$eleArrCount[$eleArrVal[$j]];
                if(in_array($eleArrVal[$j], $eleArr[$eleArrVal[$i]]))
                    $sum-=1;
                if($max<$sum)
                    $max = $sum;
            }
        }
        unset($eleArrCount);
        unset($eleArrVal);
        unset($eleArr);
        return $max;
    }
}
?>