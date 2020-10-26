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
/*class Solution {
    function lcaDeepestLeaves($root) {
        if(!$root->left && !$root->right)
            return $root;
        else {
            $count = 0;$prevCount = 0;$parentNode = [];$leftDepth = [];
            $this->getDeepestLeafParent($root, $count, $prevCount, $parentNode, $leftDepth);
            if(count($leftDepth) > 1) {
                $val = $leftDepth[1];
                $a = 0;
                for($i = 0;$i<count($leftDepth);$i++) {
                    if($leftDepth[$i] != $val) {
                        $a++;
                    }
                }
                if($a == 0) {
                    return $root;
                }
            }
            if($parentNode->right && $parentNode->left) {
                return $parentNode;
            } else if($parentNode->right) {
                return $parentNode->right;
            } else {
                return $parentNode->left;
            }
        }
    }
    
    function getDeepestLeafParent($root, &$count, &$prevCount, &$parentNode, &$leftDepth) {
        if(!$root) {
            $count--;
            return;
        }
        if(!$root->left && !$root->right) {
            array_push($leftDepth, $count);
            return;
        } 
        $count++;
        $prevval = $root;
        $rootCount = $count;
        $this->getDeepestLeafParent($root->left, $count, $prevCount, $parentNode, $leftDepth);
        if($prevCount < $count) {
            $prevCount = $count;
            $parentNode = $prevval;
        }
        $count = $rootCount;
        $this->getDeepestLeafParent($root->right, $count, $prevCount, $parentNode, $leftDepth);
        if($prevCount < $count) {
            $prevCount = $count;
            $parentNode = $prevval;
        }
    }
}*/
class Solution {

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function lcaDeepestLeaves($root) {
        if(!$root)
            return $root;
        
        $depth = $this->getDepth($root) - 1;
        return $this->getDfs($root, 0, $depth);
    }
    
    function getDepth($root) {
        if(!$root)
            return 0;
        
        $left = $this->getDepth($root->left);
        $right = $this->getDepth($root->right);
        
        return 1+max($left,$right);
    }
    
    function getDfs($root, $curr, $depth) {
        if(!$root)
            return $root;
        
        if($curr == $depth) {
            return $root;
        }
        
        $left = $this->getDfs($root->left, $curr+1, $depth);
        $right = $this->getDfs($root->right, $curr+1, $depth);
        
        if($left && $right) {
            return $root;
        }
        
        return $left ? $left : $right;
    }
}
?>