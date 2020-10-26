<?php
class Solution {

    /**
     * @param Integer[][] $mat
     * @param Integer $r
     * @param Integer $c
     * @return Integer[][]
     */
    function matrixReshape($mat, $r, $c) {
        $n = count($mat[0]);
        if($r*$c != count($mat)*$n)
            return $mat;
        $eleArr = [];
        for($i = 0;$i<count($mat);$i++) {
            for($j = 0;$j<$n;$j++) {
                array_push($eleArr, $mat[$i][$j]);
            }
        }
        unset($mat);
        $mat = [];$k = 0;
        for($i = 0;$i<$r;$i++) {
            for($j = 0;$j<$c;$j++) {
                $mat[$i][$j] = $eleArr[$k];
                $k++;
            }
        }
        unset($eleArr);
        return $mat;
    }
}
?>