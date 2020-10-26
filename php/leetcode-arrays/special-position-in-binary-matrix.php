<?php
class Solution {

    /**
     * @param Integer[][] $mat
     * @return Integer
     */
    function numSpecial($mat) {
        $eleArri = [];$eleArrj = [];
        $n = count($mat[0]);
        for($i = 0;$i<count($mat);$i++) {
            for($j = 0;$j<$n;$j++) {
                if($mat[$i][$j] == 1) {
                    $eleArri[$i]++;
                }
            }
        }
        for($j = 0;$j<$n;$j++) {
            for($i = 0;$i<count($mat);$i++) {
                if($mat[$i][$j] == 1) {
                    $eleArrj[$j]++;
                }
            }
        }
        $count = 0;
        for($i = 0;$i<count($mat);$i++) {
            for($j = 0;$j<$n;$j++) {
                if($mat[$i][$j] == 1) {
                    if(isset($eleArri[$i])) {
                        if($eleArri[$i] != 1)
                            continue;
                    }
                    if(isset($eleArrj[$j])) {
                        if($eleArrj[$j] != 1)
                            continue;
                    }
                    $count++;
                }
            }
        }
        return $count;
    }
}
?>