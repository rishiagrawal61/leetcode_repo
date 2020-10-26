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
     * @return NULL
     */
    function flatten($root) {
        if(!$root) return [];
        else if(!$root->left && !$root->right)
            return new TreeNode($root->val, null, null);
        else {
            $temp = $root;
            $this->getListFromTree($temp);
            return 0;
        }
    }
    
    function getListFromTree(&$tree) {
        if(!$tree) return 0;
        else {
            if($tree->left != null){
                $temp1 = $tree->left;
                while($temp1->right != null){
                    $temp1 = $temp1->right;
                }
                $temp = $tree->right;
                $tree->right = $tree->left;
                $tree->left = null;
                $temp1->right = $temp;
            }
            $tree = $tree->right;
            $this->getListFromTree($tree);
        }
    }
}