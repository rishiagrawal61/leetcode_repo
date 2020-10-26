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
    function getMinimumDifference($root) {
        $inArr = [];$min = PHP_INT_MAX;
        $this->getMinDiff($root, $inArr, $min);        
        return $min;
    }
    
    function getMinDiff($root, &$inArr, &$min){
        if($root == null){
            return 0;
        } else {
            $this->getMinDiff($root->left, $inArr, $min);
            array_push($inArr, $root->val);
            if(count($inArr) > 1){
                if($min > ($inArr[count($inArr)-1]-$inArr[count($inArr)-2])) {
                    $min = $inArr[count($inArr)-1]-$inArr[count($inArr)-2];
                }
            }
            $this->getMinDiff($root->right, $inArr, $min);
        }
    }
}
?>