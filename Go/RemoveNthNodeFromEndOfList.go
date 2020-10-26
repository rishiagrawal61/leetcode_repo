/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func removeNthFromEnd(head *ListNode, n int) *ListNode {
    if head.Next == nil {
        return nil
    }

    dummy := &ListNode{Next: head}
    slow, fast := dummy, dummy
    for i:=0;i<n;i++ {
        fast = fast.Next
    }
    for fast.Next != nil {
        slow = slow.Next
        fast = fast.Next
    }

    temp := slow.Next
    slow.Next = temp.Next
    temp = nil

    return dummy.Next
}
