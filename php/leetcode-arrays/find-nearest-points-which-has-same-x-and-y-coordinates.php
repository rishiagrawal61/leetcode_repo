<?php
class Solution {

    /**
     * @param Integer $x
     * @param Integer $y
     * @param Integer[][] $points
     * @return Integer
     */
    function nearestValidPoint($x, $y, $points) {
        $minDis= PHP_INT_MAX;
        $minIndex= PHP_INT_MAX;
        $isValid=false;        
        for($i=0;$i<count($points);$i++)
        {
            $dis=0;
            $index=0;            
            if($points[$i][0]==$x || $points[$i][1]==$y)
            {
                $isValid=true;
                $dis= abs($x-$points[$i][0]) + abs($y-$points[$i][1]);
                if($dis<$minDis)
                {
                    $minDis= $dis;
                    $index=$i;
                    $minIndex= $index;
                }
                else if($dis==$minDis)
                {
                    $index=$i;
                    if($index<$minIndex)
                        $minIndex=$index;
                }              
            }
        }
        if(!$isValid)
            return -1;
        else
            return $minIndex;
    }
}
?>