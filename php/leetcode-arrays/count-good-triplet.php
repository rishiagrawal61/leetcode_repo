<?php
class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $a
     * @param Integer $b
     * @param Integer $c
     * @return Integer
     */
    function countGoodTriplets($arr, $a, $b, $c) {
        $count = 0;$i = 0;$j = 1;$k = 2;
        while ($i < count($arr) - 2) {
            if (abs($arr[$i] - $arr[$j]) <= $a && abs($arr[$j] - $arr[$k]) <= $b && abs($arr[$k] - $arr[$i]) <= $c) {
                $count++;
            }
            $k++;
            if ($k == count($arr)) {
                $j = $j + 1;
                $k = $j + 1;
            }
            if ($j == count($arr) - 1) {
                $i = $i + 1;
                $j = $i + 1;
                $k = $j + 1;
            }
        }
        return $count;
    }
}
?>