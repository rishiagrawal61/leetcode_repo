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
     */
    function __construct($head) {
        $this->list = $head;
    }
  
    /**
     * @return Integer
     */
    function getRandom() {
        if ($this->list == null) {
            return;
        }
        $result = $this->list->val;
        $current = $this->list;
        for ($n = 2; $current != null; $n++) {
 			if (rand() % $n == 0)
                $result = $current->val;
            $current = $current->next;
        }
        return $result;
    }
}

/**
 * Your Solution object will be instantiated and called as such:
 * $obj = Solution($head);
 * $ret_1 = $obj->getRandom();
 */
?>