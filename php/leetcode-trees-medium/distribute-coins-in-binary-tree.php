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
    protected $moves;
    function distributeCoins($root) {
        $this->moves = 0;
        $this->getInorder($root);
        return $this->moves;
    }
    
    function getInorder($root) {
        if ($root != null) {
            $left = $this->getInorder($root->left);
            $right = $this->getInorder($root->right);
            $root->val = $root->val + $left + $right;
            $this->moves = $this->moves + abs($root->val - 1);
            return $root->val - 1;
        } else {
            return 0;
        }
    }
}
?>