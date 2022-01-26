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
    function reverseEvenLengthGroups($head) {
        if(!$head->next) return $head;
        $temp = $head;$listCounter = 0;
        while($temp != null){
            $listCounter++;
            $temp = $temp->next;
        }
        $temp = $head;
        $counter = 1;$prevNode = null;
        while($temp != null && $counter < $listCounter) {
            if($counter%2 == 0){
                $totalCount = 0;
                if($listCounter >= $counter) {
                    $prev = $prevNode;
                    $current = $temp;
                    $next = null;$totalCount = 0;
                    while($totalCount != $counter) {
                        $next = $current->next;
                        if($totalCount != 0)
                            $current->next = $prev;
                        $prev = $current;
                        $current = $next;
                        $totalCount++;
                    }
                    $prevNode->next->next = $current;
                    $prevNode->next = $prev;
                    $prevNode = $temp;
                    $temp = $current;
                }
                $listCounter-=$counter;
            } else {
                $listCounter-=$counter;
                $tempCount = 0;
                while($tempCount != $counter && $temp != null) {
                    $prevNode = $temp;
                    $temp = $temp->next;
                    $tempCount++;
                }
            }
            $counter++;
        }
        if($listCounter%2 == 0) {
            $totalCount = 0;
            $prev = $prevNode;
            $current = $temp;
            $next = null;$totalCount = 0;
            while($totalCount != $listCounter) {
                $next = $current->next;
                if($totalCount != 0)
                    $current->next = $prev;
                $prev = $current;
                $current = $next;
                $totalCount++;
            }
            $prevNode->next->next = $current;
            $prevNode->next = $prev;
            $temp = $current;
        }
        return $head;
    }
}
?>