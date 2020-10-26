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
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n) {
        if($head->next == null) return [];
        $temp = $head;$counter = 0;
        while($temp != null) {
            $counter++;
            $temp = $temp->next;
        }
        if($counter == $n) {
            $temp1 = $head->next;
            $head->next = null;
            $head = $temp1;
        } else {
            $temp = $head;
            $totalCount = 1;
            while($totalCount < ($counter-$n)){
                $temp = $temp->next;
                $totalCount++;
            }
            $temp1 = $temp->next->next;
            $temp->next->next = null;
            $temp->next = $temp1;
        }
        return $head;
    }
}
?>