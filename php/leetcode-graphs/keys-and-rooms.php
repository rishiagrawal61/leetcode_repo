<?php
class Solution {

    /**
     * @param Integer[][] $rooms
     * @return Boolean
     */
    function canVisitAllRooms($rooms) {
        $eleArr = [];
        for($i = 0;$i<count($rooms);$i++)
            $eleArr[$i] = 0;
        $arr = [];
        $counter = count($rooms)-1;
        array_push($arr, 0);
        $eleArr[0] = 1;
        $i = 0;
        while(isset($arr[$i])) {
            if($counter == 0)
                return true;
            for($j = 0;$j<count($rooms[$arr[$i]]);$j++) {
                if($eleArr[$rooms[$arr[$i]][$j]] == 1) {
                    continue;
                } else {
                    array_push($arr, $rooms[$arr[$i]][$j]);
                    $eleArr[$rooms[$arr[$i]][$j]] = 1;
                    $counter--;
                }
            }
            $i++;
        }
        if($counter == 0)
            return true;
        return false;
    }
}
?>