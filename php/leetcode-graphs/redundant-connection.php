<?php
class Solution {

    /**
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function findRedundantConnection($edges) {
        $eleArr = [];$eleArr1 = [];
        for($i = 0;$i<count($edges);$i++) {
            $eleArr[$i+1] = 0;
        }
        $ans = [];
        for($i = 0;$i<count($edges);$i++) {
            if($eleArr[$edges[$i][0]] == 0 || $eleArr[$edges[$i][1]] == 0) {
                if($eleArr[$edges[$i][0]] == 0)
                    $eleArr[$edges[$i][0]] = 1;
                if($eleArr[$edges[$i][1]] == 0)
                    $eleArr[$edges[$i][1]] = 1;
            } else 
                array_push($ans, $edges[$i]);
            
            if(isset($eleArr1[$edges[$i][0]]))
                array_push($eleArr1[$edges[$i][0]], $edges[$i][1]);
            else
                $eleArr1[$edges[$i][0]] = [$edges[$i][1]];
            if(isset($eleArr1[$edges[$i][1]]))
                array_push($eleArr1[$edges[$i][1]], $edges[$i][0]);
            else
                $eleArr1[$edges[$i][1]] = [$edges[$i][0]];
        }
        if(count($ans) == 1) {
            return $ans[0];
        }
        $eleArr = $eleArr1;
        unset($eleArr1);
        $res = [];
        for($i = 0;$i<count($ans);$i++) {
            $check = 0;$arr = [$ans[$i][0]]; 
            $this->checkForCycle($eleArr, $ans[$i][0], $ans[$i][1], $ans[$i][1], $check, $arr);
            if($check == 1) {
                $res = $ans[$i];
            }
        }
        return $res;
    }
    
    function checkForCycle($eleArr, $first, $last, $parent, &$check, &$traversedArr) {
        if($first == $last) {
            $check = 1;
            return;
        }
        for($i = 0;$i<count($eleArr[$first]);$i++) {
            if($eleArr[$first][$i] == $parent)
                continue;
            if(!in_array($eleArr[$first][$i], $traversedArr)) {
                array_push($traversedArr, $eleArr[$first][$i]);
                $this->checkForCycle($eleArr, $eleArr[$first][$i], $last, $first, $check, $traversedArr);
                if($check == 1){
                    break;
                }
            }
        }
    }
}
?>