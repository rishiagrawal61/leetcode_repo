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
     * @param Integer $x
     * @param Integer $y
     * @return Boolean
     */
    function isCousins($root, $x, $y) {
        $arr = [];$pos = [];
        $this->getParents($root, $x, $y, $arr, $pos);
        if($pos[$x] == $pos[$y]) {
            if($arr[0] != $arr[1]) {
                return true;
            }   
        }
        return false;
    }
    
    function getParents(&$root, $x, $y, &$arr, &$pos, &$prev = 0, $l = 0) {
        if($root == null) {
            return 0;
        } else {
            if($root->val == $x) {
                array_push($arr, $prev);
                $pos[$x] = $l;
            }
            if($root->val == $y) {
                array_push($arr, $prev);
                $pos[$y] = $l;
            }
            $l++;
            $prev = $root->val;
            $this->getParents($root->left, $x, $y, $arr, $pos, $prev, $l);
            $prev = $root->val;
            $this->getParents($root->right, $x, $y, $arr, $pos, $prev, $l);
        }
    }
}
?>