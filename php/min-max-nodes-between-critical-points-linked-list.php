<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return Integer[]
     */
    function nodesBetweenCriticalPoints($head) {
        $temp = $head;
        $eleArr = [];$counter = 0;
        while($temp != null) {
            $temp = $temp->next;
            $counter++;
        }
        if($counter <= 2) {
            return [-1,-1];
        }
        $counter = 0;$temp = $head;
        $this->getCriticalNodes($temp->next, $temp, $eleArr, 2);
        if(count($eleArr) <= 1) {
            return [-1,-1];
        } else {
                $max = $eleArr[count($eleArr)-1]-$eleArr[0];
                $min = PHP_INT_MAX;
                for($i=(count($eleArr)-1) ; $i>=1;$i--) {
                    if($eleArr[$i]-$eleArr[$i-1] < $min){
                        $min = $eleArr[$i]-$eleArr[$i-1];
                    }
                }
            return [$min, $max];
        }
    }
    
    function getCriticalNodes(&$list, $prev, &$arr, $counter) {
        if($list->next == null || $list == null)
            return [-1,-1];
        else {
            if($prev->val > $list->val && $list->val < $list->next->val) {
                array_push($arr, $counter);
            }
            if($prev->val < $list->val && $list->val > $list->next->val) {
                array_push($arr, $counter);
            }
            $counter++;
            $this->getCriticalNodes($list->next, $list, $arr, $counter);
        }
    }
}
?>