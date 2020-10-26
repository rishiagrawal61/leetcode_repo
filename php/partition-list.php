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
     * @param Integer $x
     * @return ListNode
     */
    function partition($head, $x) {
        $temp = $head;$last = null;$counter = 0;$check = 0;
        if(!$head || $head->next == null)
            return $head;
        while($temp->next != null) {
            $counter++;
            $temp = $temp->next;
            if($temp->val < $x)
                $check++;
        }
        if($check == 0)
            return $head;
        $last = $temp;
        $temp = $head;
        $prev = null;$totalCount = 0;
        while($totalCount <= $counter) {
            if($temp->val >= $x) {
                if($prev != null){
                    if($temp->next != null){
                        $temp1 = $temp;
                        $temp = $temp->next;
                        $prev->next = $temp1->next;
                        $temp1->next = null;
                        $last->next = $temp1;
                        $last = $last->next;
                    }
                } else {
                    $temp1 = $temp;
                    $temp = $temp->next;
                    $temp1->next = null;
                    $last->next = $temp1;
                    $last = $last->next;
                    $head = $temp;
                }
            } else {
                $prev = $temp;
                $temp = $temp->next;
            }
            $totalCount++;
        }
        return $head;
    }
}
?>