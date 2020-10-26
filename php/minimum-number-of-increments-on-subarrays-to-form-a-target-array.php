<?php
class Solution {

    /**
     * @param Integer[] $target
     * @return Integer
     */
    function minNumberOperations($target) {
        $a=$target[0];
        for($i=1;$i<count($target);$i++){
            $a+=max(0,$target[$i]-$target[$i-1]);
        }
        return $a;
    }
}
?>