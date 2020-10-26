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
     * @param Integer $k
     * @return Boolean
     */
    function findTarget($root, $k) {
        if($root == null){
            return false;
        } else {
            $arr = [];
            $this->getInOrderArray($root, $arr);
            for($i = 0;$i<count($arr);$i++){
                $ele = $arr[$i];
                unset($arr[$i]);
                $bool = array_search($k-$ele, $arr);
                if($bool)
                    return true;
                $arr[$i] = $ele;
            }
            return false;
        }
    }
    
    function getInOrderArray(&$root, &$eleArr) {
        if($root == null){
            return 0;
        } else {
            $this->getInOrderArray($root->left, $eleArr);
            array_push($eleArr, $root->val);
            $this->getInOrderArray($root->right, $eleArr);
        }
    }
}
?>