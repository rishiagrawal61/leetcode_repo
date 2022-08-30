<?php
class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function surfaceArea($grid) {
        $solution = 0;
        $x = count($grid);
        $y = count($grid[0]); 

        for ($i = 0; $i < $x; $i++){
            for ($j =0; $j < $y; $j++){
                if ($grid[$i][$j] !== 0){
                    $solution += 2 + $grid[$i][$j] * 4;
                    if ($i < $x-1)
                        $solution -= 2 * min($grid[$i][$j],$grid[$i+1][$j]);
                    if ($j < $y-1)
                        $solution -= 2 * min($grid[$i][$j],$grid[$i][$j+1]);
                }
            }
        }
        return $solution;
    }
}
?>