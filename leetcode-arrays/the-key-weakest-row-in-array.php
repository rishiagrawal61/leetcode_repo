<?php
class Solution {

    /**
     * @param Integer[][] $mat
     * @param Integer $k
     * @return Integer[]
     */
    function kWeakestRows($mat, $k) {
        $eleArr = [];
        for($i = 0;$i<count($mat);$i++) {
            $count = 0;
            for($j = 0;$j<count($mat[$i]);$j++) {
                if($mat[$i][$j] == 1)
                    $count++;
                else
                    break;
            }
            $eleArr[$i] = $count;
        }
        $ele = [];$counter = 0;
        asort($eleArr);
        foreach($eleArr as $key => $value) {
            if($counter != $k){
                array_push($ele, $key);
            } else {
                break;
            }
            $counter++;
        }
        return $ele;
    }
}
?>