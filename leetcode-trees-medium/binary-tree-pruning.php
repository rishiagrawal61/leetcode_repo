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
     * @return TreeNode
     */
    function pruneTree($root) {
        if(!$root->left && !$root->right){
            if($root->val == 0)
                return [];
            else
                return $root;
        } else {
            $onesCount = 0;
            $this->pruneSubTree($root, $onesCount);
            if(!$root->left && !$root->right){
                if($root->val == 0)
                    return [];
                else
                    return $root;
            } else 
                return $root;
        }
    }
    
    function pruneSubTree(&$root, &$count) {
        if(!$root){
            return $count;
        } else {
            $val = 0;
            if($root->val == 1) {
                $val++;
            }
            $leftCount = $this->pruneSubTree($root->left, $val);
            if($leftCount == 0) {
                unset($root->left);
            }
            $rightCount = $this->pruneSubTree($root->right, $val);
            if($rightCount == 0) {
                unset($root->right);
            }
            return $val + $leftCount + $rightCount;
        }
    }
}
?>