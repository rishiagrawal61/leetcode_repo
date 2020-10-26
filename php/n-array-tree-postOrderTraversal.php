<?php
/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $children = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->children = array();
 *     }
 * }
 */

class Solution {
    /**
     * @param Node $root
     * @return integer[]
     */
    function postorder($root) {
        if($root == null)
            return [];
        $temp = $root;
        $elementArr = [];
        $this->postOrderTraversal($temp, $elementArr);
        array_push($elementArr, $root->val);
        return $elementArr;
    }
    
    function postOrderTraversal($root, &$elementArr) {
        if($root == null){
            return $root;
        } else {
            foreach($root->children as $child){
                $this->postOrderTraversal($child, $elementArr);
                array_push($elementArr, $child->val);
            }
        }
    }
}
?>