<?php
class Solution {

    /**
     * @param Integer[] $encoded
     * @param Integer $first
     * @return Integer[]
     */
    function decode($encoded, $first) {
        $xorArr = [];
        $xorArr[0] = $first;
        for($i = 0;$i<count($encoded);$i++) {
            $xorArr[$i+1] = $xorArr[$i] ^ $encoded[$i];
        }
        return $xorArr;
    }
}
?>