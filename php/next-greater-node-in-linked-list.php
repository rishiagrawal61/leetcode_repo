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
     * @return Integer[]
     */
    function nextLargerNodes($head) {
        $temp = $head;$eleArr = [];$i = 0;
        if($temp->next == null){
            return [0];
        }
        while($temp != null) {
            $eleArr[$i] = $temp->val;
            $temp = $temp->next;
            $i++;
        }
        
        $ansArr = [];
        $s = new SplStack();
        for($i = count($eleArr)-1;$i>=0;$i--) {
            while(!$s->isEmpty() && ($s->top() <= $eleArr[$i])) {
                $s->pop();
            }
            $ansArr[$i] = $s->isEmpty() ? 0:$s->top();
            $s->push($eleArr[$i]);
        }
        return array_reverse($ansArr);
    }
}
?>