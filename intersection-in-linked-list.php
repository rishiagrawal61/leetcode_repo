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
     * @param ListNode $headA
     * @param ListNode $headB
     * @return ListNode
     */
    function getIntersectionNode($headA, $headB) {
        if(!$headA || !$headB) return null;
        
        $a = $headA;
        while($a != null) {
            $a->val = -$a->val;
            $a = $a->next;
        }
        
        $b = $headB; $val = null;
        while($b != null) {
            if($b->val < 0) {
                $val = $b;
                break;
            }
            $b = $b->next;
        }
        
        $a = $headA;
        while($a != null)
        {
            $a->val = -$a->val;
            $a = $a->next;
        }
        
        return $val;
    }
}
?>