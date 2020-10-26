<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permuteUnique($nums) {
        if(count($nums) == 1)
            return [$nums];
        sort($nums);
        $ans = [];
        $this->getPermutations($nums, $ans, [], []);
        return $ans;
    }
    
    function getPermutations($nums, &$ans, $cur, $used) {
        if(count($cur) == count($nums))
            array_push($ans, $cur);
        
        for($i = 0;$i<count($nums);$i++) {
            if($used[$i])
                continue;
            
            if($i>0 && $nums[$i-1] == $nums[$i] && !$used[$i-1])
                continue;
            
            array_push($cur, $nums[$i]);
            $used[$i] = true;
            $this->getPermutations($nums, $ans, $cur, $used);
            $used[$i] = false;
            array_pop($cur);
        }
    }
}
?>