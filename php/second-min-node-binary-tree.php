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
    function findSecondMinimumValue($root) {
        if(!$root->left) return -1;
        $firstVal = PHP_INT_MAX;
        $secondVal = PHP_INT_MAX;
        $this->getSecondMinValue($root, $firstVal, $secondVal);
        if($secondVal == PHP_INT_MAX)
            return -1;
        return $secondVal;
    }
    
    function getSecondMinValue(&$root, &$fVal, &$sVal) {
        if($root == null) return 0;
        if($root->val < $fVal){
            $sVal = $fVal;
            $fVal = $root->val;
        }
        if($root->val < $sVal && $root->val != $fVal)
            $sVal = $root->val;
        if($root->left != null){
            $this->getSecondMinValue($root->left, $fVal, $sVal);
        }
        if($root->right != null){
            $this->getSecondMinValue($root->right, $fVal, $sVal);
        }
    }
}
?>