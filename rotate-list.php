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
     * @param Integer $k
     * @return ListNode
     */
    function rotateRight($head, $k) {
        if(!$head) return null;
        if($head->next == null) return $head;
        $temp = $head;$counter = 0;
        while($temp != null) {
            $counter++;
            if($temp->next == null)
                $last = $temp;
            $temp = $temp->next;
        }
        $k = $k%$counter;
        if($k == 0) return $head;
        $temp = $head;$totalCount = 1;
        while($totalCount < ($counter-$k)) {
            $temp = $temp->next;
            $totalCount++;
        }
        $temp1 = $temp->next;
        $temp->next = null;
        $last->next = $head;
        $head = $temp1;
        return $head;
    }
}
?>