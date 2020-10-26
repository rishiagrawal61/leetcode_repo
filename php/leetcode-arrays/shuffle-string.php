<?php
class Solution {

    /**
     * @param String $s
     * @param Integer[] $indices
     * @return String
     */
    function restoreString($s, $indices) {
        $stringArr = str_split($s);
        $eleArr = [];
        for($i = 0;$i<count($indices);$i++) {
            $eleArr[$indices[$i]] = $stringArr[$i];
        }
        $i = 0;
        foreach($eleArr as $key => $value) {
            $stringArr[$i] = $eleArr[$i];
            $i++;
        }
        return implode("", $stringArr);
    }
}
?>