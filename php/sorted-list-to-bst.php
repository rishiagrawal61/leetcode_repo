<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
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
     * @param ListNode $head
     * @return TreeNode
     */
    function sortedListToBST($head) {
        if(!$head) return [];
        else if(!$head->next) return new TreeNode($head->val);
        else {
            $temp = $head;
            $nums = [];
            while($temp != null) {
                array_push($nums, $temp->val);
                $temp = $temp->next;
            }
            $center = intval(count($nums)/2);
            $tree = new TreeNode($nums[$center]);
            $leftNums = array_slice($nums, 0, $center);
            $rightNums = array_slice($nums, $center+1, count($nums)-1);
            $this->insertIntoTree($tree, $leftNums, $rightNums);
            return $tree;
        }
    }
    
    function insertIntoTree(&$tree, $leftNums, $rightNums) {
        if(count($leftNums) == 1){
            $tree->left = new TreeNode($leftNums[0]);
            if(count($rightNums) == 1){
                $tree->right = new TreeNode($rightNums[0]);
            }
            return 0;
        }
        if(count($rightNums) == 1){
            $tree->right = new TreeNode($rightNums[0]);
            if(count($leftNums) == 1){
                return 0;
            }
        }
        if(count($leftNums) > 1){
            $centerLeft = intval(count($leftNums)/2);
            $tree->left = new TreeNode($leftNums[$centerLeft]);
            $this->insertIntoTree($tree->left, array_slice($leftNums, 0, $centerLeft), array_slice($leftNums, $centerLeft+1, count($leftNums)-1));
        }
        if(count($rightNums) > 1){
            $centerRight = intval(count($rightNums)/2);
            $tree->right = new TreeNode($rightNums[$centerRight]);
            $this->insertIntoTree($tree->right, array_slice($rightNums, 0, $centerRight), array_slice($rightNums, $centerRight+1, count($rightNums)-1));
        }
    }
}
?>