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
    function oddEvenList($head) {
        $temp = $head;$count = 1;
        while($temp->next != null) {
            $temp = $temp->next;
            $count++;
        }
        if($count <= 2) {
            return $head;
        }
        $counter = 1;
        $temp1 = $head;
        while($counter <= $count) {
            if($counter % 2 == 0) {
                $temp2 = $temp1->next;
                $temp1 = $temp1->next;
                $node = $prev->next;
                $prev->next = $temp2;
                $node->next = null;
                $temp->next = $node;
                $temp = $temp->next;
            } else {
                $prev = $temp1;
                $temp1 = $temp1->next;
            }
            $counter++;
        }
        return $head;
    }
}
?>