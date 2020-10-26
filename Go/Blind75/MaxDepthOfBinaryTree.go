/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */

func maxDepth(root *TreeNode) int {
    if (root == nil) {
        return 0;
    }
    leftCounter := maxDepth(root.Left);
    rightCounter := maxDepth(root.Right);

    if(leftCounter > rightCounter) {
        return leftCounter+1
    }
    return rightCounter+1
}
