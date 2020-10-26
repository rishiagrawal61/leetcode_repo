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
     * @param TreeNode $subRoot
     * @return Boolean
     */
    function isSubtree($root, $subRoot) {
        if(!$root) return false;
        if ($this->getSubtreeCheck($root, $subRoot)) return true;
        else return $this->isSubtree($root->left, $subRoot) || $this->isSubtree($root->right, $subRoot);
    }
    
    function getSubtreeCheck($root, $subRoot) {
        if (!$root || !$subRoot) return !$root && !$subRoot;
        if ($root->val != $subRoot->val) return false;
        return $this->getSubtreeCheck($root->left, $subRoot->left) && $this->getSubtreeCheck($root->right, $subRoot->right);
    }
}
?>