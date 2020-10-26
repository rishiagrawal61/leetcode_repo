<?php
class Solution {

    /**
     * @param Integer[][] $graph
     * @return Integer[][]
     */
    function allPathsSourceTarget($graph) {
        $resultantArr = [];
        $stack = new SplStack();
        $stack->push(0);
        $arr = [];
        $dest = count($graph)-1;
        for($i = 0;$i<count($graph[0]);$i++){
            array_push($arr, 0);
            $stack->push($graph[0][$i]);
            array_push($arr, $graph[0][$i]);
            $this->getPaths($graph, $arr, $stack, $dest, $resultantArr);
            while($stack->top() != 0)
                $stack->pop();
            $arr = [];
        }
        return $resultantArr;
    }
    
    function getPaths($graph, &$arr, &$stack, $dest, &$result) {
        if($stack->top() == $dest){
            $stack->pop();
            array_push($result, $arr);
            array_pop($arr);
            return 1;
        } else {
            for($i = 0;$i<count($graph[$stack->top()]);$i++) {
                array_push($arr, $graph[$stack->top()][$i]);
                $stack->push($graph[$stack->top()][$i]);
                $this->getPaths($graph, $arr, $stack, $dest, $result);
            }
            if($i == (count($graph[$stack->top()]))){
                array_pop($arr);
                $stack->pop();
                return;
            }
        }
    }
}
?>