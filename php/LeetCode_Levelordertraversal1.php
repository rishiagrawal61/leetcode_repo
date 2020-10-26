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
     * @return Integer[][]
     */
    function levelOrder($root) {
		$levels = [];
		$this->helper($root, $levels);
		return $levels;
	}

	function helper($root, &$levels, $l = 0) {
		if ($root) {
			$levels[$l][] = $root->val;
	        $l++;
			$this->helper($root->left, $levels, $l);
			$this->helper($root->right, $levels, $l);
		}
	}
}
?>