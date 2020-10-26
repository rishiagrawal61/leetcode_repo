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
        $height = $this->getHeight($root);
        if($height <= 2) return 0;
        $sum = 0;
        $this->getSum($root, $sum, $root, null, 0, 0);
        return $sum;
    }
    
    function getSum(&$root, &$sum, $gParent, $parent, $gHeight, $nHeight) {
        if(!$root) return 0;
        if(abs($gHeight-$nHeight) < 2) {
            if(abs($gHeight-$nHeight) == 0){
                $this->getSum($root->left, $sum, $gParent, $parent, $gHeight, $nHeight+1);
                $this->getSum($root->right, $sum, $gParent, $parent, $gHeight, $nHeight+1);
            } else {
                $this->getSum($root->left, $sum, $gParent, $root, $gHeight, $nHeight+1);
                $this->getSum($root->right, $sum, $gParent, $root, $gHeight, $nHeight+1);
            }
        } else {
            if($gParent->val%2 == 0) {
                $sum+=$root->val;
            }
            $this->getSum($root->left, $sum, $parent, $root, $gHeight+1, $nHeight+1);
            $this->getSum($root->right, $sum, $parent, $root, $gHeight+1, $nHeight+1);
        }
    }
    
    function getHeight($root) {
        if(!$root) return 0;
        return 1+max($this->getHeight($root->left), $this->getHeight($root->right));
    }
}
?>