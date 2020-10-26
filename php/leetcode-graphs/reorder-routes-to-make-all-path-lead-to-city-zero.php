<?php
class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $connections
     * @return Integer
     */
    function minReorder($n, $connections) {
        $first = [];
        $last = [];
        for($i = 0;$i<count($connections);$i++) {
            if(isset($first[$connections[$i][0]]))
                array_push($first[$connections[$i][0]], $connections[$i][1]);
            else
                $first[$connections[$i][0]] = [$connections[$i][1]];
            
            if(isset($last[$connections[$i][1]]))
                array_push($last[$connections[$i][1]], $connections[$i][0]);
            else
                $last[$connections[$i][1]] = [$connections[$i][0]];
        }
        
        $visited = array_fill(0, $n, 0);
        $newArr = [];
        $queue = new SplQueue();
        $queue->enqueue(0);
        while(!$queue->isEmpty()) {
            $ele = $queue->dequeue();
            $visited[$ele] = 1;
            $arr = array_merge(isset($first[$ele])?$first[$ele]:[],isset($last[$ele])?$last[$ele]:[]);
            for($i = 0;$i<count($arr);$i++){
                if($visited[$arr[$i]] == 1)
                    continue;
                if(isset($newArr[$ele]))
                    array_push($newArr[$ele], $arr[$i]);
                else
                    $newArr[$ele] = [$arr[$i]];
                $queue->enqueue($arr[$i]);
            }
        }
        unset($arr);
        unset($visited);
        $count = 0;
        foreach($newArr as $key => $value) {
            for($i = 0;$i<count($value);$i++) {
                if(isset($first[$value[$i]])) {
                    if(!in_array($key, $first[$value[$i]]))
                        $count++;
                } else {
                    $count++;
                }
            }
        }
        unset($first);
        unset($last);
        unset($newArr);        
        return $count;
    }
}
?>