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
     * @param Integer $target
     * @return TreeNode
     */
    function removeLeafNodes($root, $target) {
        if(!$root->left && !$root->right) {
            if($root->val == $target) {
                $root = null;
                return $root;
            }
            else
                return $root;
        }
        $this->deleteLeafNode($root, $target);
        if(!$root->left && !$root->right) {
            if($root->val == $target) {
                $root = null;
                return $root;
            }
            else
                return $root;
        }
        return $root;
    }
    
    function deleteLeafNode(&$root, $target) {
        if($root == null) {
            return;
        } else {
            $this->deleteLeafNode($root->left, $target);
            if($root->left->val == $target && !$root->left->left && !$root->left->right)
                $root->left = null;
            $this->deleteLeafNode($root->right, $target);
            if($root->right->val == $target && !$root->right->left && !$root->right->right)
                $root->right = null;
        }
    }
}
?>