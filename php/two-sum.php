<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $assArr = [];
        for($i = 0;$i<count($nums);$i++) {
            if(!isset($assArr[$nums[$i]])){
                $assArr[$nums[$i]] = [$i];
                continue;
            }
            array_push($assArr[$nums[$i]], $i);
        }
        $values = [];
        foreach($assArr as $key => $value) {
            $a = 0;
            if(count($assArr[$key]) == 1){
                $a = $assArr[$key];
                unset($assArr[$key]);
            }
            if(isset($assArr[$target-$key])){
                $values = [$key, $target-$key];
            }
            if($a != 0)
                $assArr[$key] = $a;
            if($values != []){
                break;
            }
        }
        if($values[0] == $values[1]){
            return [$assArr[$values[0]][0],$assArr[$values[0]][1]];
        }
        return [$assArr[$values[0]][0],$assArr[$values[1]][0]];
    }
}
?>