<?php
class Solution {

    /**
     * @param String[] $words
     * @param Integer $k
     * @return String[]
     */
    function topKFrequent($words, $k) {
        $eleArr = [];
        for($i = 0;$i<count($words);$i++)
            $eleArr[$words[$i]]++;
        $obj = new SortByVal();
        foreach($eleArr as $key => $value) {
            $obj->insert(['w' => $key, 'c' => $value]);
        }
        if($obj->count())
            $obj->top();
        $eleArr = [];$i = 0;
        while($obj->valid() && $i < $k) {
            $eleArr[] = $obj->current()['w'];
            $obj->next();
            $i++;
        }
        return $eleArr;
    }
}
class SortByVal extends SplHeap{
    public function compare($array1, $array2) {
        if($array1['c'] == $array2['c'])
            return -1 * strnatcmp($array1['w'], $array2['w']);
        else
            return $array1['c'] < $array2['c'] ? -1 : 1;
    }
}
?>