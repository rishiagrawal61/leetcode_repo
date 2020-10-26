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
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return Integer[]
     */
    function getAllElements($root1, $root2) {
        $arr1 = [];$arr2 = [];$result = [];
        $this->getInorder($root1, $arr1);
        $this->getInorder($root2, $arr2);
        return $this->getMergedArray($arr1, $arr2);
    }
    function getMergedArray($arr1, $arr2) {
        $i = 0;
        $j = 0;
        $n1 = count($arr1);
        $n2 = count($arr2);$result = [];
        while ($i < $n1 && $j < $n2)
        {
            if ($arr1[$i] < $arr2[$j])
                $result[$k++] = $arr1[$i++];
            else
                $result[$k++] = $arr2[$j++];
        }

        while ($i < $n1)
            $result[$k++] = $arr1[$i++];

        while ($j < $n2)
            $result[$k++] = $arr2[$j++];
        
        return $result;
    }
    
    function getInorder ($root, &$eleArr) {
        if(!$root) return $eleArr;
        else {
            $this->getInorder($root->left, $eleArr);
            array_push($eleArr, $root->val);
            $this->getInorder($root->right, $eleArr);
        }
    }
}
?>