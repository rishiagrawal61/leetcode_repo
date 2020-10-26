/**
 * Definition for singly-linked list.
 * public class ListNode {
 *     int val;
 *     ListNode next;
 *     ListNode() {}
 *     ListNode(int val) { this.val = val; }
 *     ListNode(int val, ListNode next) { this.val = val; this.next = next; }
 * }
 */
class Solution {
    public ListNode addTwoNumbers(ListNode l1, ListNode l2) {
        Stack<Integer> stackL1 = new Stack<Integer>();
        Stack<Integer> stackL2 = new Stack<Integer>();
        ListNode resultList = new ListNode();
        resultList = null;
        ListNode temp = l1;
        int sum;int carryOver = 0;
        
        while(temp != null){
            stackL1.push(temp.val);
            temp = temp.next;
        }
        temp = l2;
        while(temp != null){
            stackL2.push(temp.val);
            temp = temp.next;
        }
        
        int lengthL1 = stackL1.size();
        int lengthL2 = stackL2.size();
        
        if(lengthL1 >= lengthL2){
            if(lengthL2 == 0)
                return l1;
            while(stackL1.size() != 0){
                sum = 0;
                Integer stackL1Element = (Integer)stackL1.pop();
                if(stackL2.size() != 0){
                    Integer stackL2Element = (Integer)stackL2.pop();
                    sum = stackL1Element+stackL2Element+carryOver;
                } else {
                    sum = stackL1Element+carryOver;
                }
                carryOver = 0;
                if(sum >= 10){
                    carryOver = (int)(sum/10);
                    sum = sum%10;
                }
                ListNode node = new ListNode(sum);
                node.next = resultList;
                resultList = node;
            }
        } else {
            if(lengthL1 == 0)
                return l2;
            while(stackL2.size() != 0){
                sum = 0;
                Integer stackL2Element = (Integer)stackL2.pop();
                if(stackL1.size() != 0){
                    Integer stackL1Element = (Integer)stackL1.pop();
                    sum = stackL1Element+stackL2Element+carryOver;
                } else {
                    sum = stackL2Element+carryOver;
                }
                carryOver = 0;
                if(sum >= 10){
                    carryOver = (int)(sum/10);
                    sum = sum%10;
                }
                ListNode node = new ListNode(sum);
                node.next = resultList;
                resultList = node;
            }
        }
        
        if(carryOver != 0){
            ListNode node = new ListNode(carryOver);
            node.next = resultList;
            resultList = node;
        }
        
        return resultList;
    }
}