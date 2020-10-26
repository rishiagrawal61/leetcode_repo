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
    function sumEvenGrandparent($root) {
        if(!$root->left && !$root->right) return 0;
        $sum = 0;
        $this->getSum($root, $sum);
        return $sum;
    }
    
    function getSum(&$root, &$sum) {
        if(!$root) return 0;
        $height = $this->getHeight($root);
        if($height <= 2)
            return $sum;
        if($height > 2 && $root->val%2 == 0)
            $sum+=$root->val;
        $this->getSum($root->left, $sum);
        $this->getSum($root->right, $sum);
    }
    
    function getHeight($root) {
        if(!$root) return 0;
        return 1+max($this->getHeight($root->left), $this->getHeight($root->right));
    }
}
?>