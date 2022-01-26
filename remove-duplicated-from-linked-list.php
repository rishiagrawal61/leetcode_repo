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
    function deleteDuplicates($head) {
        if(!head) return $head;
        $temp = $head;$prev = null;
        while($temp != null) {
            if($prev != null) {
                if($prev->val == $temp->val) {
                    $node = $temp;
                    $prev->next = $temp->next;
                    $temp = $temp->next;
                    $node->next = null;
                } else {
                    $prev = $temp;
                    $temp = $temp->next;
                }
            } else {
                $prev = $temp;
                $temp = $temp->next;
            }
        }
        return $head;
    }
}
?>