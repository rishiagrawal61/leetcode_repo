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
     * @param Integer $targetSum
     * @return Boolean
     */
    function hasPathSum($root, $targetSum) {
        if(!$root) return false;$bool = false;
        $this->checkPathSum($root, $targetSum, $bool);
        return $bool;
    }
    
    function checkPathSum(&$root, $sum, &$bool) {
        if(!$root) return false;
        else{
            $sum = $sum-($root->val);
            if($sum == 0 && ($root->left == null) && ($root->right == null)){$bool = true; return 0;}
            $this->checkPathSum($root->left, $sum, $bool);
            $this->checkPathSum($root->right, $sum, $bool);
        }
    }
}
?>