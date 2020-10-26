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
     * @param Integer $n
     * @return TreeNode[]
     */
    function allPossibleFBT($n) {
        $res = [];
        if($n%2 == 0) return $res;
        if($n == 1) {$root = new TreeNode(0);array_push($res, $root);return $res;}
        for($i = 1;$i<$n;$i++) {
            $left = $this->allPossibleFBT($i);
            $right = $this->allPossibleFBT($n-$i-1);
            for($j = 0;$j<count($left);$j++) {
                for($k = 0;$k<count($right);$k++) {
                    $root = new TreeNode(0);
                    $root->left = $left[$j];
                    $root->right = $right[$k];
                    array_push($res, $root);
                }
            }
        }
        return $res;
    }
}
?>