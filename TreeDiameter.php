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
    function diameterOfBinaryTree($root) {
        if($root == NULL){
            return 0;
        }
        else{
            $height = $this->Height($root->left) + $this->Height($root->right);
            $ldia = $this->diameterOfBinaryTree($root->left);
            $rdia = $this->diameterOfBinaryTree($root->right);
        }
        return max($height, max($ldia, $rdia));
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