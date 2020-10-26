<?php
class Solution {

    /**
     * @param Integer[] $heights
     * @return Integer
     */
    function heightChecker($heights) {
        $eleArr = [];
        for($i = 0;$i<count($heights);$i++) {
            $eleArr[$heights[$i]]++;
        }
        ksort($eleArr);$i = 0;$out = 0;
        foreach($eleArr as $key => $value) {
            if($value > 1) {
                $counter = 0;
                while($counter != $value) {
                    if($heights[$i] != $key)
                        $out++;
                    $counter++;
                    $i++;
                }
            } else {
                if($heights[$i] != $key)
                    $out++;
                $i++;
            }
        }
        return $out;
    }
}
?>