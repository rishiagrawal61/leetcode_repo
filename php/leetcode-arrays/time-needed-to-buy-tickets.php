<?php
class Solution {

    /**
     * @param Integer[] $tickets
     * @param Integer $k
     * @return Integer
     */
    function timeRequiredToBuy($tickets, $k) {
        $count = 0;
        $val = $tickets[$k];   
        for($i = 0;$i<count($tickets);$i++) {
            if($tickets[$i] <= $val) {
                $count+=$tickets[$i];
                if($i > $k && $tickets[$i] == $val)
                    $tickets[$i] = 1;
                else 
                    $tickets[$i] = 0;
            } else {
                $tickets[$i]-=$val;
                $count+=$val;
            }
        }
        foreach($tickets as $key => $value) {
            if($tickets[$key] == 0)
                unset($tickets[$key]);
            if($key <= $k && isset($tickets[$key]))
                unset($tickets[$key]);
        }
        return $count-count($tickets);
    }
}
?>