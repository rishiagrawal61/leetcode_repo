<?php
class Solution {

    /**
     * @param Integer[][] $edges
     * @return Integer
     */
    function findCenter($edges) {
        $eleArr = [];$a = $edges[0][0];$b = $edges[0][1];
        for($i = 0;$i<count($edges);$i++) {
            if($a == $edges[$i][0] || $a == $edges[$i][1]){
                $eleArr[$a]++;
            }
            if($b == $edges[$i][0] || $b == $edges[$i][1]){
                $eleArr[$b]++;
            }
        }
        if($eleArr[$a] == count($edges)) return $a;
        if($eleArr[$b] == count($edges)) return $b;
    }
}
?>