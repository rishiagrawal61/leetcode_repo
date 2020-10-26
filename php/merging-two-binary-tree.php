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
     * @return TreeNode
     */
    function mergeTrees($root1, $root2) {
        if($root1 == null)
            return $root2;
        if($root2 == null)
            return $root1;
        $this->mergeTree($root1, $root2);
        return $root2;
    }
    
    function mergeTree(&$tree1, &$tree2) {
        if($tree2 == null){
            $tree2 = $tree1;
            return 0;
        } else {
            $tree2->val = $tree1->val+$tree2->val;
            $this->mergeTree($tree1->left, $tree2->left);
            $this->mergeTree($tree1->right, $tree2->right);
        }
    }
}
?>