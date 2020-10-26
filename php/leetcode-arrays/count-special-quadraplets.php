<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function countQuadruplets($nums) {
        $res =0;        
        $two_sum= [];
        for($b = 1;$b<count($nums)-2;$b++){
            for($a = 0;$a<$b;$a++)
                $two_sum[$nums[$a]+$nums[$b]] = (isset($two_sum[$nums[$a]+$nums[$b]]) ? $two_sum[$nums[$a]+$nums[$b]] : 0) + 1;
            for($d = $b+2;$d<count($nums);$d++)                
                $res += isset($two_sum[$nums[$d] - $nums[$b+1]]) ? $two_sum[$nums[$d] - $nums[$b+1]] : 0;
        }
        return $res;
    }
}
?>