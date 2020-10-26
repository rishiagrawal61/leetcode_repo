<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class Solution {
    /**
     * @param ListNode $head
     * @return ListNode
     */
    function detectCycle($head) {
        if(!$head) return $head;
        if($head->next == null) return null;
        $firstFlag = $head;$secondFlag = $head;
        while($firstFlag != null && $secondFlag != null && $secondFlag->next != null) {
            $firstFlag = $firstFlag->next;
            $secondFlag = $secondFlag->next->next;
            if($firstFlag == $secondFlag) {
                break;
            }
        }
        if($firstFlag == null || $secondFlag == null)
            return null;
        $secondFlag = $head;
        while($secondFlag != $firstFlag) {
            $secondFlag = $secondFlag->next;
            $firstFlag = $firstFlag->next;
        }
        return $secondFlag;
    }
}
?>