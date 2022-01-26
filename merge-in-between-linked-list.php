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
     * @param ListNode $list1
     * @param Integer $a
     * @param Integer $b
     * @param ListNode $list2
     * @return ListNode
     */
    function mergeInBetween($list1, $a, $b, $list2) {
        $counter = 0;
        $temp = $list1;$preva = null;$node = null;
        while($temp != null) {
            if($counter+1 == $a){
                $preva = $temp;
            }
            if($counter == $b) {
                $node = $temp;
                break;
            }
            $counter++;
            $temp = $temp->next;
        }
        $temp = $list2;$prevList2 = null;
        while($temp != null){
            if($temp->next == null){
                $prevList2 = $temp;
                break;
            }
            $temp = $temp->next;
        }
        $preva->next = $list2;
        $prevList2->next = $node->next;
        return $list1;
    }
}
?>