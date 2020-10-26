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
    function removeZeroSumSublists($head) {
        if($head == null) return null;
        $temp = $head;$sum = 0;
        while($temp != null) {
            $sum+=$temp->val;
            if($sum == 0) {
                $head = $temp->next;
                $sum = 0;
            }
            $temp = $temp->next;
        }
        
        if($head != null)
            $head->next = $this->removeZeroSumSublists($head->next);
        return $head;
    }
}
?>