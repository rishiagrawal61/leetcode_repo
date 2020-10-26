<?php
class Solution {

    /**
     * @param Integer[][] $image
     * @return Integer[][]
     */
    function flipAndInvertImage($image) {
        $eleCount = count($image) - 1;
        for($i = 0;$i<count($image)/2; $i++) {
            for($j = 0;$j<count($image);$j++) {
                $temp = $image[$j][$i];
                $image[$j][$i] = $image[$j][$eleCount-$i];
                $image[$j][$eleCount-$i] = $temp;
                if($image[$j][$i] == 0)
                    $image[$j][$i] = 1;
                else
                    $image[$j][$i] = 0;
                if($image[$j][$eleCount-$i] == 0)
                    $image[$j][$eleCount-$i] = 1;
                else
                    $image[$j][$eleCount-$i] = 0;
            }
        }
        if(count($image) % 2 != 0) {
            $j = count($image)/2;
            for($i = 0;$i<count($image);$i++) {
                if($image[$i][$j] == 0)
                    $image[$i][$j] = 1;
                else
                    $image[$i][$j] = 0;
            }
        }
        return $image;
    }
}
?>