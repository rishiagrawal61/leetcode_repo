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
     * @return Integer[]
     */
    function findMode($root) {
        if($root->left == null && $root->right == null)
            return [$root->val];
        $eleArr = [];
        $max = 0;
        $this->getRepeatedElements($root, $eleArr, $max);
        foreach($eleArr as $key => $ele) {
            if($ele != $max){
                unset($eleArr[$key]);
            }
        }
        return array_keys($eleArr);
    }
    
    function getRepeatedElements(&$root, &$eleArr, &$max) {
        if($root == null)
            return 0;
        else {
            $this->getRepeatedElements($root->left, $eleArr, $max);
            if(isset($eleArr[$root->val])){
                $eleArr[$root->val]++;
            } else {
                $eleArr[$root->val] = 1;
            }
            $max = max($max, $eleArr[$root->val]);
            $this->getRepeatedElements($root->right, $eleArr, $max);
        }
    }
}
?>