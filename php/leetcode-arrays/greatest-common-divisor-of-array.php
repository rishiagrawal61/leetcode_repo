<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findGCD($nums) {
        $min = PHP_INT_MAX;$max = PHP_INT_MIN;
        for ($i = 0; $i < count($nums); $i++) {
            if($max < $nums[$i])
                $max = $nums[$i];
            if($min > $nums[$i])
                $min = $nums[$i];
        }
        return $this->gcd($min, $max);
    }
    
    function gcd($a, $b) {
        if($a == 0)
            return $b;
        return $this->gcd($b % $a, $a);
    }
}
?>