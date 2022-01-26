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
     * @return Boolean
     */
    function isBalanced($root) {
        if($root == null) {
            return true;
        }
        $bool = true;
        $this->getHeightDiffCheck($root, $bool);
        return $bool;
    }
    
    function getHeightDiffCheck(&$root, &$bool){
        if($root == null) {
            return 0;
        } else {
            $diff = abs($this->height($root->left) - $this->height($root->right));
            if($diff > 1){
                $bool = false;
                return 0;
            }
            $this->getHeightDiffCheck($root->left, $bool);
            $this->getHeightDiffCheck($root->right, $bool);
        }
    }
    
    function Height($Node){
        if($Node == NULL){
            return 0;
        }
        else{
            return (1+max($this->Height($Node->left), $this->Height($Node->right)));
        }
    }
}
?>