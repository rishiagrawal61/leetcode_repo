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
     * @return Float[]
     */
    function averageOfLevels($root) {
        if($root == NULL)
			return 0;
		else{
			$array = [];$l = 0;$array1 = [];
            $this->getTreeArray($root, $array, $l);
            foreach($array as $key => $arr) {
                $array1[$key] = array_sum($arr)/count($arr);
            }
            return $array1;
		}
    }
    
    function getTreeArray($root, &$array, $a) {
        if($root == null) {
            return 0;
        } else {
            $array[$a][] = $root->val;
            $a++;
            $this->getTreeArray($root->left, $array, $a);
            $this->getTreeArray($root->right, $array, $a);
        }
    }
}
?>