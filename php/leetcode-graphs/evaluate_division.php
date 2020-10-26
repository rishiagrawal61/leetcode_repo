<?php
class Solution {

    /**
     * @param String[][] $equations
     * @param Float[] $values
     * @param String[][] $queries
     * @return Float[]
     */
    function calcEquation($equations, $values, $queries) {
        $eleArr = [];
        $counter = 0;
        foreach($equations as $value) {
            $first = $value[0];
            $second = $value[1];
            $eleArr[$first][$second] = $values[$counter];
            $eleArr[$second][$first] = 1/$values[$counter];
            $eleArr[$first][$first] = 1;
            $eleArr[$second][$second] = 1;
            $counter++;
        }
        $returnArr = [];
        foreach($queries as $key => $value) {
            if($eleArr[$value[0]][$value[1]])
                array_push($returnArr, $eleArr[$value[0]][$value[1]]);
            else
                array_push($returnArr, $this->getDfs($eleArr, $value[0], $value[1], [], 1));
        }
        return $returnArr;
    }
    
    function getDfs(&$eleArr, $from, $to, $visited, $result) {
        if(isset($eleArr[$from][$to]))
            return $eleArr[$from][$to];
        
        $visited[$from] = 1;
        foreach($eleArr[$from] as $key => $value) {
            if(isset($visited[$key]))
                continue;
            
            $result = $value * $this->getDfs($eleArr, $key, $to, $visited, $value);
            if($result > 0) {
                $eleArr[$from][$to] = $result;
                return $result;
            }
        }
        return -1;
    }
}
?>