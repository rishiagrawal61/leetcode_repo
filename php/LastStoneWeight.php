<?php
class Solution {

    /**
     * @param Integer[] $stones
     * @return Integer
     */
    function lastStoneWeight($stones) {
        $heap = new SplMaxHeap();
        foreach($stones as $heap_data){
            $heap->insert($heap_data);
        }
        $array = array(0,1);
        while ($heap->valid()){
            if(!in_array($heap->count(), $array)){
                $value1 = $heap->extract();
                $value2 = $heap->extract();
                if($value1 < $value2){
                    $heap->insert($value2-$value1);
                }
                if($value1 > $value2){
                    $heap->insert($value1-$value2);
                }
            }
            else if($heap->count() == 0){
                return 0;
            }
            else{
                return $heap->extract();
            }
        }
        if($heap->isEmpty()){
            return 0;
        }
    }
}
?>