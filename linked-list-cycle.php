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
     * @return Boolean
     */
    function hasCycle($head) {
        if(!$head->next) return false;
        $temp = $head;
        $counter = 0;$pos = PHP_INT_MAX;
        while($temp != null) {
            $listVal = str_split($temp->val);
            if($listVal[0] == 'v'){
                $pos = intval($listVal[1]);
                break;
            }
            $temp->val = "v".$counter;
            $temp = $temp->next;
            $counter++;
        }
        if($pos != PHP_INT_MAX) 
            return true;
        return false;
    }
}
?>