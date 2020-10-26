import java.util.*;
class Solution {
    public int lengthOfLongestSubstring(String s) {
        if(s.length() == 0 || s.length() == 1){ return s.length();}
        Hashtable<Character, Integer> ht1 = new Hashtable<Character, Integer>();
        int maxLength = 0;int counter = 0;
        for(int i = 0;i < s.length();i++){
            char letter = s.charAt(i);
            if(ht1.containsKey(letter)){
                int pos = ht1.get(letter);
                ht1.clear();
                if(maxLength < counter)
                    maxLength = counter;
                i = pos;
                counter = 0;
            }
            else{
                ht1.put(letter, i);
                counter++;
            }
        }
        if(maxLength < counter)
            maxLength = counter;
        
        return maxLength;
    }
}