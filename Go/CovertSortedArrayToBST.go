/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */
func sortedArrayToBST(nums []int) *TreeNode {
    if len(nums) == 1 {
        return &TreeNode{Val: nums[0]}
    }
    return constructTree(nums, 0, len(nums)-1)
}

func constructTree(nums []int, low int, high int) *TreeNode{
    if(low > high) {
        return nil
    }
    
    mid := low + (high - low)/2
    node := &TreeNode{nums[mid], nil, nil}

    node.Left = constructTree(nums, low, mid-1)
    node.Right = constructTree(nums, mid+1, high)

    return node
}
