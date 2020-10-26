<?php
/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $prev = null;
 *     public $next = null;
 *     public $child = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->prev = null;
 *         $this->next = null;
 *         $this->child = null;
 *     }
 * }
 */

class Solution {
    /**
     * @param Node $head
     * @return Node
     */
    function flatten($head) {
        $temp = $head;
        $stack = new SplStack();
        $this->flattenList($temp, $stack, null);
        return $head;
    }
    
    function flattenList(&$list, &$stack, $node) {
        if($list == null) {
            if(!$stack->isEmpty()) {
                $childList = $stack->pop();
                $temp = $childList->next;
                $childList->next = $childList->child;
                $childList->child->prev = $childList;
                $childList->child = null;
                $node->next = $temp;
                $temp->prev = $node;
                $this->flattenList($childList, $stack, null);
            } else
                return 0;
        } else {
            if($list->child != null) {
                $stack->push($list);
                if($list->next == null) {
                    $node = $list;
                }
                $list = $list->child;
            } else {
                if($list->next == null) {
                    $node = $list;
                }
                $list = $list->next;
            }
            $this->flattenList($list, $stack, $node);
        }
    }
}
?>