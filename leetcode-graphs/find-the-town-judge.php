<?php
class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $trust
     * @return Integer
     */
    function findJudge($n, $trust) {
        $eleArr = [];
        for($i = 0;$i<count($trust);$i++) {
            if(isset($eleArr[$trust[$i][0]]))
                array_push($eleArr[$trust[$i][0]], $trust[$i][1]);
            else
                $eleArr[$trust[$i][0]] = [$trust[$i][1]];
        }
        $val = [];$to = [];
        for($i = 1;$i<=$n;$i++) {
            if(!isset($eleArr[$i]))
                array_push($val, $i);
            else{
                for($j = 0;$j<count($eleArr[$i]);$j++)
                    array_push($to, $eleArr[$i][$j]);
            }
        }
        if(count($val) > 1 || count($val) < 1)
            return -1;
        $count = 0;
        for($i = 0;$i<count($to);$i++) {
            if($to[$i] == $val[0]){
                $count++;
            }
        }
        if($count == $n-1)
            return $val[0];
        return -1;
    }
}
?>