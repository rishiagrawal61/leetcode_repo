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
    function balanceBST($root) {
        $eleArr = [];
        $this->getInOrderTraversal($root, $eleArr);
        if(count($eleArr) <= 2)
            return $root;
        else{
            if(count($eleArr) % 2 == 0)
                $center = count($eleArr)/2;
            else
                $center = (count($eleArr)/2)-.5;
            $root = new TreeNode($eleArr[$center]);
            $tree = $root;
            for($i = $center-1;$i>=0;$i--) {
                $root->left = new TreeNode($eleArr[$i]);
                $root = $root->left;
            }
            $root = $tree;
            for($i = $center+1;$i<count($eleArr);$i++) {
                $root->right = new TreeNode($eleArr[$i]);
                $root = $root->right;
            }
            return $tree;
        }
    }
    
    function getInOrderTraversal(&$root, &$eleArr) {
        if(!$root) return 0;
        else {
            $this->getInOrderTraversal($root->left, $eleArr);
            array_push($eleArr, $root->val);
            $this->getInOrderTraversal($root->right, $eleArr);            
        }
    }
}
?>