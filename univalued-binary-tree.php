<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isUnivalTree($root) {
        $flag = true;
        $this->getUniValueCheck($root, $root->val, $flag);
        return $flag;
    }
    
    function getUniValueCheck($root, $value, &$flag) {
        if($root == null) {
            return 0;
        } else {
            if($value != $root->val){
                $flag = false;
            }
            $this->getUniValueCheck($root->left, $value, $flag);
            $this->getUniValueCheck($root->right, $value, $flag);
        }
    }
}
?>