<?php
class Solution {

    /**
     * @param Integer[] $position
     * @return Integer
     */
    function minCostToMoveChips($position) {
        $odd = 0;
        $even = 0;
        for($i = 0;$i<count($position);$i++) {
            if($position[$i]&1 != 0)
                $odd+=1;
            else
                $even+=1;
        }
        return min($odd,$even);
    }
}
?>