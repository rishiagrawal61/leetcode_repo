<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findPairs($nums, $k) {
        $hashTab = [];
        for($i = 0;$i<count($nums);$i++) {
            if(!isset($hashTab[$nums[$i]])){
                $hashTab[$nums[$i]] = 1;
            } else {
                $hashTab[$nums[$i]]++;
            }
        }
        $count = 0;
        if($k == 0) {
            foreach($hashTab as $key => $value) {
                if($value > 1){
                    $count++;
                }
            }
            return $count;
        } else {
            foreach($hashTab as $key => $value) {
                if(isset($hashTab[$key-$k])) {
                    $count++;                
                }
                if(isset($hashTab[$key+$k])) {
                    $count++;
                }
            }
            return $count/2;
        }
    }
}
?>