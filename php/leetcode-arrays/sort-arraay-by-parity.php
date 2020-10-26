<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortArrayByParity($nums) {
        $oddPtr = -1;
        $evenPtr = -1;
        $len = count($nums);$last = count($nums);
        for($i = 0;$i<$len;$i++) {
            if($nums[$i] % 2 == 0)
                $evenPtr = $nums[$i];
            else{
                $nums[$last] = $nums[$i];
                unset($nums[$i]);
                $last++;
            }            
        }
        return $nums;
    }
}
?>