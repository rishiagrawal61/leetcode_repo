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
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return Boolean
     */
    function leafSimilar($root1, $root2) {
        if($root1 == null || $root2 == null) {
            return true;
        } else {
            $arr1 = [];$arr2 = [];
            $this->getTreeArr($root1, $arr1);
            $this->getTreeArr($root2, $arr2);
            if($arr1 == $arr2)
                return true;
            return false;
        }
    }
    
    function getTreeArr($root1, &$arr1) {
        if($root1 == null) {
            return 0;
        } else {
            if($root1->left == null && $root1->right == null) {
                array_push($arr1, $root1->val);
            }
            $this->getTreeArr($root1->left, $arr1);
            $this->getTreeArr($root1->right, $arr1);
        }
    }
}
?>