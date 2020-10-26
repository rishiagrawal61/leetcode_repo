<?php
class Solution {

    /**
     * @param Integer[] $row
     * @return Integer
     */
    function minSwapsCouples($row) {
        $count = 0;
        for($i = 0;$i<count($row);$i++){
            if(($row[$i+1] == ($row[$i]-1)) || (($row[$i+1]-1) == $row[$i])){
                $i = $i+2;
                continue;
            }
            else{
                for($j = $i+2;$j<count($row);$j++){
                    if(($row[$i] == ($row[$j]-1)) || (($row[$i]-1) == $row[$j])){
                        $temp = $row[$j];
                        $row[$j] = $row[$i+1];
                        $row[$i+1] = $temp;
                        $count++;
                        $i = $i+2;
                    }
                }
            }
        }
        return $count;
    }
}
?>