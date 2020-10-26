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
     * @return ListNode
     */
    function insertionSortList($head) {
        if(!$head->next) return $head;
        $temp = $head;$eleArr = [];
        while($temp != null) {
            array_push($eleArr, $temp->val);
            $temp = $temp->next;
        }
        for($i = 1;$i <= (count($eleArr)-1);$i++) {
            for($j = $i-1;$j >= 0;$j--) {
                if($eleArr[$j+1] < $eleArr[$j]) {
                    $temp = $eleArr[$j+1];
                    $eleArr[$j+1] = $eleArr[$j];
                    $eleArr[$j] = $temp;
                } else {
                    break;
                }
            }
        }
        $temp = $head;
        for($i = 0;$i<count($eleArr);$i++) {
            $temp->val = $eleArr[$i];
            $temp = $temp->next;
        }
        return $head;
    }
}
?>