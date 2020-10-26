/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */
func invertTree(root *TreeNode) *TreeNode {
    if root == nil || (root.Left == nil && root.Right == nil) {
        return root
    }
    
    invertTree(root.Left)
    invertTree(root.Right)

    temp := root.Right
    root.Right = root.Left
    root.Left = temp

    return root
}
