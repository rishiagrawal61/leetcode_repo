<?php
class Solution {

    /**
     * @param Integer $label
     * @return Integer[]
     */
    function pathInZigZagTree($label) {
        $arr = [];
        $currHeight = floor(log($label, 2));
        $upperHeight = $currHeight-1;
        $upperFirstVal = pow(2, $upperHeight);
        $levelLastVal = pow(2, $currHeight+1) - 1;
        while($label >= 1) {
            array_push($arr, $label);
            $label = floor(abs($label-$levelLastVal)/2)+$upperFirstVal;
            $currHeight = $currHeight-1;
            $upperHeight = $upperHeight-1;
            $upperFirstVal = pow(2,$upperHeight);
            $levelLastVal = pow(2, $currHeight+1) - 1;
        }
        return array_reverse($arr);
    }
}
?>