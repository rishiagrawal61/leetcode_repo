<?php
class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function findSmallestSetOfVertices($n, $edges) {
        $arr = [];$result = [];
        for($i = 0;$i<count($edges);$i++)
            $arr[$edges[$i][1]] = 1;
        
        for($i = 0;$i<$n;$i++) {
            if(!isset($arr[$i]))
                array_push($result, $i);
        }
        return $result;
    }
}
?>