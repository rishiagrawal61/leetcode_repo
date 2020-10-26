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
    function swapNodes($head, $k) {
        if($k == 1 && $head->next == null) {
            return $head;
        }
        if($k <= 2 && $head->next->next == null) {
            $temp = $head->next;
            $head->next = null;
            $temp->next = $head;
            return $temp;
        }
        $temp = $head;$counter = 0;
        while($temp != null) {
            $counter++;
            $temp = $temp->next;
        }
        $temp = $head;
        $lastCount = $counter-$k;$firstCount = $k-1;
        $counter = 0;$preva = null;$prevb = null;
        $nodeFirst = null;$nodeSecond = null;
        while($temp != null) {
            if($counter+1 == $firstCount)
                $preva = $temp;
            if($counter == $firstCount)
                $nodeFirst = $temp;
            if($counter == $lastCount)
                $nodeSecond = $temp;
            if($counter+1 == $lastCount)
                $prevb = $temp;
            $counter++;
            $temp = $temp->next;
        }
        if($nodeFirst == $prevb) {
            $temp2 = $nodeSecond;
            $nodeFirst->next = $nodeSecond->next;
            $preva->next = $temp2;
            $nodeSecond->next = $nodeFirst;
        } else if($nodeSecond == $preva) {
            $temp2 = $nodeFirst;
            $nodeSecond->next = $nodeFirst->next;
            $prevb->next = $temp2;
            $nodeFirst->next = $nodeSecond;
        } else {
            if($preva == null) {
                $temp = $nodeFirst->next;
                $nodeFirst->next = $nodeSecond->next;  
                $prevb->next = $nodeFirst;
                $nodeSecond->next = $temp;
                $head = $nodeSecond;
            } else if($prevb == null) {
                $temp = $nodeSecond->next;
                $nodeSecond->next = $nodeFirst->next;  
                $preva->next = $nodeSecond;
                $nodeFirst->next = $temp;
                $head = $nodeFirst;
            } else {
                $temp = $nodeFirst->next;
                $nodeFirst->next = $nodeSecond->next;  
                $nodeSecond->next = $temp;
                $prevb->next = $nodeFirst;
                $preva->next = $nodeSecond;
            }
        }
        return $head;
    }
}
?>