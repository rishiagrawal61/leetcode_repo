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
     * @param Integer[] $postorder
     * @return TreeNode
     */
    
    public $preIndex = 0;
    function constructFromPrePost($preorder, $postorder) {
        $this->$preIndex = 0;
        return $this->constructTree($preorder, $postorder, 0, count($preorder)-1, count($preorder));
    }
    
    function constructTree($pre, $post, $l, $h, $size) {
        if($this->$preIndex >= $size || $l > $h) {
            return null;
        }
        $root = new TreeNode($pre[$this->$preIndex]);
        $this->$preIndex++;
        if($l == $h || $this->$preIndex >= $size) {
            return $root;
        }
        for($i = $l;$i<=$h;$i++) {
            if($post[$i] == $pre[$this->$preIndex]) {
                break;
            }
        }
        
        if($i <= $h) {
            $root->left = $this->constructTree($pre, $post, $l, $i, $size);
            $root->right = $this->constructTree($pre, $post, $i+1, $h-1, $size);
        }
        return $root;
    }
}
?>