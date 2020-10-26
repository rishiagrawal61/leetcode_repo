/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func reverseList(head *ListNode) *ListNode {
    if head == nil || head.Next == nil {
        return head
    }

    temp := head
    next := head.Next
    head.Next = nil

    for node := next;;node = next {
        if node == nil {
            head = temp;
            break;
        }
        next = node.Next
        node.Next = temp
        temp = node
    }

    return head

}
