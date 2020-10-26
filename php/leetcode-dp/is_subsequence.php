<?php
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isSubsequence($s, $t) {
        $eleArr = [];
        for($i = 0;$i<=strlen($t);$i++) {
            for($j = 0;$j<=strlen($s);$j++) {
                if($i == 0 || $j == 0)
                    $eleArr[$i][$j] = 0;
                else if(substr($s, $j-1, 1) == substr($t, $i-1, 1)) 
                    $eleArr[$i][$j] = 1+$eleArr[$i-1][$j-1];
                else
                    $eleArr[$i][$j] = max($eleArr[$i][$j-1], $eleArr[$i-1][$j]);
            }
        }
        return $eleArr[strlen($t)][strlen($s)] == strlen($s);
    }
}
?>