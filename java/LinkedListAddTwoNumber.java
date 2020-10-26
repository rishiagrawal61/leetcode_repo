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
class LinkedListAddTwoNumber {
    public ListNode addTwoNumbers(ListNode l1, ListNode l2) {
        int l1Length = listLength(l1);
        int l2Length = listLength(l2);
        ListNode tempL1 = l1;
        ListNode tempL2 = l2;
        
        if(l1Length > l2Length){
            if(l2Length == 0)
                return l1;            
            int sum;int carryOver = 0;
            while(tempL1 != null){
                if(tempL2 == null){
                    if(carryOver == 0)
                        return l1;
                }
                sum = 0;
                if(tempL2 != null)
                    sum = tempL1.val+tempL2.val+carryOver;
                else
                    sum = tempL1.val+carryOver;
                carryOver = 0;
                if(sum >= 10){
                    carryOver = (int)(sum/10);
                    sum = sum%10;
                }
                tempL1.val = sum;
                tempL1 = tempL1.next;
                if(tempL2 != null)
                    tempL2 = tempL2.next;
            }
            if(carryOver != 0){
                ListNode newNode = new ListNode(carryOver, null);
                ListNode temp = l1;
                while(temp.next != null){
                    temp = temp.next;
                }
                temp.next = newNode;
            }
            return l1;
        }
        else{
            if(l1Length == 0)
                return l2;
            int sum;int carryOver = 0;
            while(tempL2 != null){
                if(tempL1 == null){
                    if(carryOver == 0)
                        return l2;
                }
                sum = 0;
                if(tempL1 != null)
                    sum = tempL1.val+tempL2.val+carryOver;
                else
                    sum = tempL2.val+carryOver;
                carryOver = 0;
                if(sum >= 10){
                    carryOver = (int)(sum/10);
                    sum = sum%10;
                }
                tempL2.val = sum;
                tempL2 = tempL2.next;
                if(tempL1 != null)
                    tempL1 = tempL1.next;
            }
            if(carryOver != 0){
                ListNode newNode = new ListNode(carryOver, null);
                ListNode temp = l2;
                while(temp.next != null){
                    temp = temp.next;
                }
                temp.next = newNode;
            }
            return l2;
        }
    }
    public static int listLength(ListNode l1){
        int count = 0;
        ListNode temp = l1;
        while(temp != null){
            count++;
            temp = temp.next;
        }
        return count;
    }
}