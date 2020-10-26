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
    function bstToGst($root) {
        if(!$root->left && !$root->right) return $root;
        $eleArr = [];
        $this->getInorderArr($root, $eleArr);
        $sum = array_sum($eleArr);
        $prev = 0;
        for($i = 0;$i<count($eleArr);$i++) {
            $val = $eleArr[$i];
            $eleArr[$i] = $sum - $prev;
            $prev+=$val;
        }
        $counter = 0;
        $this->updateInorderArr($root, $eleArr, $counter);
        return $root;
    }
    
    function getInorderArr(&$root, &$eleArr) {
        if(!$root) return 0;
        $this->getInorderArr($root->left, $eleArr);
        array_push($eleArr, $root->val);
        $this->getInorderArr($root->right, $eleArr);
    }
    
    function updateInorderArr(&$root, $eleArr, &$counter) {
        if(!$root) return 0;
        $this->updateInorderArr($root->left, $eleArr, $counter);
        $root->val = $eleArr[$counter];
        $counter++;
        $this->updateInorderArr($root->right, $eleArr, $counter);
    }
}
?>