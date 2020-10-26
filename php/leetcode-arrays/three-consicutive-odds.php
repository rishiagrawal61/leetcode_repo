<?php
class Solution {

    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function threeConsecutiveOdds($arr) {
        if(count($arr) < 3)
            return false;
        $isValid = false;
        for($i = 0;$i<count($arr)-2;$i++) {
            $a = $arr[$i+0];
            $b = $arr[$i+1];
            $c = $arr[$i+2];
            if($a%2 != 0 && $b%2 != 0 && $c%2 != 0) {
                $isValid = true;
                break;
            }
        }
        return $isValid;
    }
}
?>