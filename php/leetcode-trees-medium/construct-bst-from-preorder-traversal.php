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
     * @param Integer[] $preorder
     * @return TreeNode
     */
    function bstFromPreorder($preorder) {
        $root = new TreeNode($preorder[0]);
        if(count($preorder) == 1) return $root;
        $rootVal = $preorder[0];
        for($i = 1;$i<count($preorder);$i++) {
            if($rootVal<$preorder[$i])
                $this->insertIntoTree($root->right, $preorder[$i]);
            else
                $this->insertIntoTree($root->left, $preorder[$i]);
        }
        return $root;
    }
    
    function insertIntoTree(&$root, $val) {
        if(!$root) {$root = new TreeNode($val); return 0;}
        else {
            if($root->val < $val)
                $this->insertIntoTree($root->right, $val);
            else
                $this->insertIntoTree($root->left, $val);
        }
    }
}
?>