<?php
class Solution {

    /**
     * @param Integer $n
     * @param Integer[] $rounds
     * @return Integer[]
     */
    function mostVisited($n, $rounds) {
        $eleArr = [];
        $eleArr[$rounds[0]]++;
        for($i = 1;$i<count($rounds);$i++) {
            if($rounds[$i] < $rounds[$i-1]){
                for($j = $rounds[$i-1];$j<=$n;$j++) {
                    if($j != $rounds[$i-1])
                        $eleArr[$j]++;
                }
                for($j = 1;$j<=$rounds[$i];$j++) {
                    $eleArr[$j]++;
                }
            } else {
                for($j = $rounds[$i-1];$j<=$rounds[$i];$j++) {
                    if($j != $rounds[$i-1]) {
                        $eleArr[$j]++;
                    }
                }
            }
        }
        $max = PHP_INT_MIN;
        $maxKey = 0;
        foreach($eleArr as $key => $val) {
            if($max <= $val) {
                $max = $val;
                if($maxKey < $key)
                    $maxKey = $key;
            }
        }
        $rounds = [];
        for($i = 1;$i<=$maxKey;$i++) {
            if(isset($eleArr[$i]) && $eleArr[$i] == $max)
                array_push($rounds, $i);
        }
        unset($eleArr);
        return $rounds;
    }
}
?>