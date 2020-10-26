<?php
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function fib($n) {
        if($n == 0 || $n == 1)
            return $n;
        else {
            $prev = 0;
            $first = 1;
            $curr = 0;
            for($i = 0;$i<$n-1;$i++) {
                $curr = $prev+$first;
                $prev = $first;
                $first = $curr;
            }
            return $curr;
        }
    }
}
?>