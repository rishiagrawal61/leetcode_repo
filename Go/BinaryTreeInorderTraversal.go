/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */
func inorderTraversal(root *TreeNode) []int {
    var res []int
    if root == nil {
        return res
    }

    traverseInOrder(root, &res)

    return res
}

func traverseInOrder(root *TreeNode, res *[]int) {
    if root == nil {
        return
    }

    traverseInOrder(root.Left, res)
    *res = append(*res, root.Val)
    traverseInOrder(root.Right, res)
}
