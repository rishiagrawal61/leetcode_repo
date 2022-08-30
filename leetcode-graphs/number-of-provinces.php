<?php
class Solution {

    /**
     * @param Integer[][] $isConnected
     * @return Integer
     */
    function findCircleNum($isConnected) {
        $visited = [];
        $count = 0;
        for($i = 0;$i<count($isConnected);$i++) {
            if($visited[$i] == 0){
                $this->getDfs($isConnected, $visited, $i);
                $count++;
            }
        }        
        return $count;
    }
    
    function getDfs(&$isConnected, &$visited, $i) {
        for($j = 0;$j<count($isConnected);$j++) {
            if($isConnected[$i][$j] && $visited[$j] == 0) {
                $visited[$j] = 1;
                $this->getDfs($isConnected, $visited, $j);
            }
        }
    }
}
?>