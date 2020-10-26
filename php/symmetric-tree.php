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
    function isSymmetric($root) {
        if($root->left == null && $root->right == null) {
            return true;
        }
        return $this->checkForSymmetry($root->left, $root->right, $flag);
    }
    
    function checkForSymmetry($root1, $root2, &$flag) {
        if(($root1 == null && $root2 != null) || ($root1 != null && $root2 == null)) {
            $flag = false;
            return $flag;
        } else if($root1 == null && $root2 == null) {
            return true;
        } else {
            if($root1->val != $root2->val) {
                $flag = false;
                return $flag;
            } else {
                $flag = true;
            }
            if(!($this->checkForSymmetry($root1->left, $root2->right, $flag)))
                return $flag;
            $this->checkForSymmetry($root1->right, $root2->left, $flag);
        }
        return $flag;
    }
}
?>