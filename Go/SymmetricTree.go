/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */
func isSymmetric(root *TreeNode) bool {
    if root == nil || (root.Left == nil && root.Right == nil) {
        return true
    }

    return checkForSymmetry(root.Left, root.Right)
}

func checkForSymmetry(leftTree *TreeNode, rightTree *TreeNode) bool {
    if leftTree == nil && rightTree == nil {
        return true
    }
    if leftTree == nil || rightTree == nil {
        return false
    }

    leftCheck := checkForSymmetry(leftTree.Left, rightTree.Right)
    rightCheck := checkForSymmetry(leftTree.Right, rightTree.Left)
    
    return (leftTree.Val == rightTree.Val)&&leftCheck&&rightCheck
}
