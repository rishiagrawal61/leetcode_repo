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
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists) {
        if(count($lists) == 0){
            return $lists;
        }
        if(count($lists) == 1){
            return $lists[0];
        }
        if(count($lists) == 2) {
            return $this->mergeList($lists[0], $lists[1]);
        } else {
            $newLists = $this->mergeList($lists[0], $lists[1]);
            unset($lists[0]);
            unset($lists[1]);
            $lists = array_values($lists);
            foreach($lists as $list){
                $newLists = $this->mergeList($list, $newLists);
            }
            return $newLists;
        }
    }
    
    function mergeList ($list1, $list2) {
        if($list1 == null){
            return $list2;
        }
        if($list2 == null){
            return $list1;
        }

        $listTemp1 = $list1;
        $listTemp2 = $list2;
        $i = 0;
        $node = null;
        
        while($listTemp1 != null) {
            if($listTemp2->next != null){
                if($listTemp1->val > $listTemp2->next->val) {
                    if($listTemp2->next != null){
                        $listTemp2 = $listTemp2->next;
                    } else {
                        $listTemp2->next = $listTemp1;
                        break;
                    }
                    $i++;
                    continue;
                }
            }
            if($listTemp1->val < $listTemp2->val) {
                
                $node = $listTemp1;
                $listTemp1 = $listTemp1->next;
                if($i == 0) {
                    $node->next = $listTemp2;
                    $list2 = $node;
                    $listTemp2 = $node;
                } else {
                    $node->next = $listTemp2->next;
                    $listTemp2->next = $node;
                }
            } else {
                $node = $listTemp1;
                $listTemp1 = $listTemp1->next;
                $node->next = $listTemp2->next;
                $listTemp2->next = $node;
                if($listTemp2->next != null){
                    $listTemp2 = $listTemp2->next;
                } else {
                    $listTemp2->next = $listTemp1;
                    break;
                }
            }            
            $i++;
        }
        return $list2;
    }
}
?>