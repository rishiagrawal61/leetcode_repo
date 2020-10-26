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
    function deepestLeavesSum($root) {
        if(!$root->left && !$root->right) return $root->val;
        else {
            $sum = 0;$curr_height = 0;
            $height = $this->getHeight($root);
            $this->getSumtoDeepestLeaves($root, $sum, $height-1, $curr_height, 'root');
            return $sum;
        }
    }
    
    function getHeight($Node) {
        if($Node == NULL){
            return 0;
        }
        else{
            return (1+max($this->getHeight($Node->left), $this->getHeight($Node->right)));
        }
    }
    
    function getSumtoDeepestLeaves(&$root, &$sum, $height, $curr_height) {
        if(!$root) return 0;
        else {
            if($root->left == null && $root->right == null && $curr_height == $height)
                $sum+=$root->val;
            $curr_height+=1;
            $this->getSumtoDeepestLeaves($root->left, $sum, $height, $curr_height);
            $this->getSumtoDeepestLeaves($root->right, $sum, $height, $curr_height);
        }
    }
}
?>