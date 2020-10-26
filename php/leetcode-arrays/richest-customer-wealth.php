<?php
class Solution {

    /**
     * @param Integer[][] $accounts
     * @return Integer
     */
    function maximumWealth($accounts) {
        $result_array = [];$max = PHP_INT_MIN;
        for($i = 0;$i<count($accounts);$i++) {
            $sum = array_sum($accounts[$i]);
            if($max < $sum)
                $max = $sum;
        }
        return $max;
    }
}
?>