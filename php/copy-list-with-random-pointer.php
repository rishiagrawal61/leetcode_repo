<?php
/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $next = null;
 *     public $random = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->next = null;
 *         $this->random = null;
 *     }
 * }
 */

class Solution {
    /**
     * @param Node $head
     * @return Node
     */
    function copyRandomList($head) {
        if(!$head) return $head;
        $temp = $head;
        while($temp != null) {
            $newNode = new Node($temp->val);
            $temp1 = $temp->next;
            $temp->next = $newNode;
            $newNode->next = $temp1;
            $temp = $newNode->next;
        }
        $temp = $head;
        while($temp != null) {
            if($temp->random == null)
                $temp->next->random = null;
            else
                $temp->next->random = $temp->random->next;
            $temp = $temp->next->next;
        }
        $temp = $head;
        $tempNewList = null;$headNewList = null;
        while($temp->next != null) {
            $temp1 = $temp->next->next;
            $newNode = $temp->next;
            $temp->next = $temp1;
            $newNode->next = null;
            if($tempNewList == null) {
                $tempNewList = $newNode;
                $headNewList = $tempNewList;
            } else {
                $tempNewList->next = $newNode;
                $tempNewList = $tempNewList->next;
            }
            $temp = $temp->next;
        }
        return $headNewList;
    }
}
?>