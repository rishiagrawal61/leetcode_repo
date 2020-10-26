<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @param Integer $start
     * @return Integer
     */
    function getMinDistance($nums, $target, $start) {
        $index = -1;
        for($i = 0;$i<count($nums);$i++) {
            if($nums[$i] == $target){
                if($i == 0)
                    $index = $i;
                else {
                    if($index == -1)
                        $index = $i;
                    else {
                        if(abs($index-$start) > abs($i-$start))
                            $index = $i;
                    }
                }
            }
        }
        return abs($index-$start);
    }
}
?>