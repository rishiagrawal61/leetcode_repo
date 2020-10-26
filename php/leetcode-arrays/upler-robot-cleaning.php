<?php
    function solution($R) {
        $eleArr = [];
        for($i = 0;$i<count($R);$i++) {
            for($j = 0;$j<strlen($R[$i]);$j++) {
                $eleArr[$i][$j] = 0;
            }
        }
        $count = 0;$i = 0;$prevCount = -1;
        while($prevCount != $count) {
            $prev = $j;
            $prevCount = $count;
            for($j = 0;$j<strlen($R[0]);$j++) {
                if($R[$i][$j] == '.') {
                    if($eleArr[$i][$j] == 0)
                        $count++;
                    $eleArr[$i][$j] = 1;
                } else {
                    break;
                }
            }
            if($prev != $j)
                $j--;
            $prev = $i;
            for($i = $i;$i<count($R);$i++) {
                if($R[$i][$j] == '.') {
                    if($eleArr[$i][$j] == 0)
                        $count++;
                    $eleArr[$i][$j] = 1;
                } else {
                    break;
                }
            }
            if($prev != $i)
                $i--;
            $prev = $j;
            for($j = $j;$j>=0;$j--) {
                if($R[$i][$j] == '.') {
                    if($eleArr[$i][$j] == 0)
                        $count++;
                    $eleArr[$i][$j] = 1;
                } else {
                    break;
                }
            }
            if($prev != $j)
                $j++;
            $prev = $i;
            for($i = $i;$i>=0;$i--) {
                if($R[$i][$j] == '.') {
                    if($eleArr[$i][$j] == 0)
                        $count++;
                    $eleArr[$i][$j] = 1;
                } else {
                    break;
                }
            }
            if($prev != $i)
                $i++;
        }
        return $count;
    }
    echo solution(["......","......","......"]);
    echo solution(["...x..","...xx.","..x..."]);
    echo solution(["....x..","xxx.xxx","x....xx","xxxx.xx"]);
    echo solution(["...x..","...xx.","..x..."]);
?>