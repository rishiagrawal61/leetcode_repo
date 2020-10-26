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
     * @return Integer
     */
    function minDepth($root) {
        if(!$root) return 0;
        $counter = 0;
        return $this->minHeight($root);
    }
    
    function minHeight(&$root) {
        if($root->left == null && $root->right == null) return 1;
        if($root->right == null) return 1+$this->minHeight($root->left);
        if($root->left == null) return 1+$this->minHeight($root->right);
        else{
            return 1+min($this->minHeight($root->left), $this->minHeight($root->right));
        }
    }
}
?>