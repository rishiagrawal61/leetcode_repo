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
    function swapPairs($head) {
        if(!$head)
            return [];
        else if(!$head->next)
            return $head;
        else {
            $temp = $head;
            $listSecNode = $head->next;
            $this->swapNodes($temp);
            $listSecNode->next = null;
            $listSecNode->next = $head;
            $head = $listSecNode;
            return $head;
        }
    }
    
    function swapNodes(&$list) {
        if(!$list || !$list->next) {
            return 0;
        } else {
            $temp = $list->next;
            $list->next = $list->next->next;
            $temp->next = $list;
            $list = $temp;
            $temp = $temp->next;
            $this->swapNodes($temp->next);
        }
    }
}
?>