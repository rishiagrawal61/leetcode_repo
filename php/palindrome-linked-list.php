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
     * @return Boolean
     */
    function isPalindrome($head) {
        if(!$head->next) return true;
        else{
            $temp = $head;
            $count = 0;$eleArr = [];
            while($temp != null) {
                $eleArr[$count] = $temp->val;
                $temp = $temp->next;
                $count++;
            }
            $flag = false;
            if($count%2 == 0) {
                for($i = 0;$i<$count/2;$i++) {
                    if($eleArr[(($count/2)-1)-$i] == $eleArr[($count/2)+$i])
                        $flag = true;
                    else {
                        $flag = false;
                        break;
                    }
                }
            } else {
                for($i = 0;$i<($count-1)/2;$i++) {
                    if($eleArr[((($count-1)/2)-1)-$i] == $eleArr[(($count+1)/2)+$i])
                        $flag = true;
                    else{
                        $flag = false;
                        break;
                    }
                }
            }
        }
        return $flag;
    }
}
?>