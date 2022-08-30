<?php
class Solution {

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function minTimeToVisitAllPoints($points) {
        $min = 0;
        for($i = 0;$i<count($points)-1;$i++){
            $temp1 = abs($points[$i][0]-$points[$i+1][0]);
            $temp = abs($points[$i][1]-$points[$i+1][1]);
            if($temp1 > $temp)
                $min+=$temp1;
            else
                $min+=$temp;
        }
        return $min;
    }
}
?>