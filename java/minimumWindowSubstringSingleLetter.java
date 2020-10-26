import java.util.*;
class Solution {
    public String minWindow(String s, String t) {
        int sLength = s.length();
        int tLength = t.length();
        if((tLength>sLength) || tLength == 0)
            return "";
        Hashtable<Character, Integer> ht1 = new Hashtable<Character, Integer>();
        for(int i = 0;i < tLength; i++){
            char letter = t.charAt(i);
            if(ht1.containsKey(letter))
                ht1.replace(letter, (ht1.get(letter)+1));
            else
                ht1.put(letter, 1);
        }
        if(s.equals(t))
            return s;
        Hashtable<Character, Integer> ht2 = new Hashtable<Character, Integer>();
        int minLengthString = Integer.MAX_VALUE;
        int minIndex = 0;int maxIndex = 0;
        int a[] = new int[128];
        for(int i = 0;i < sLength; i++){
            char letter = s.charAt(i);
            if(ht1.containsKey(letter)){
                if(!ht2.containsKey(letter)){
                    ht2.put(letter, i);
                    a[letter]++;
                } else {
                    
                    if(ht1.keySet().equals(ht2.keySet())){
                        Collection<Integer> hashValues = ht2.values();
                        int maxValue = Collections.max(hashValues);
                        int minValue = Collections.min(hashValues);
                        if(minLengthString > (maxValue-minValue)){
                            minLengthString = maxValue-minValue;
                            minIndex = minValue;
                            maxIndex = maxValue;
                        }
                    }
                    if(ht2.get(letter) < i){
                        if(a[letter] >= ht1.get(letter))
                            ht2.replace(letter, i);
                        else
                            a[letter]++;
                    }
                }
            }
        }
        if(ht1.keySet().equals(ht2.keySet())){
            Collection<Integer> hashValues = ht2.values();
            int maxValue = Collections.max(hashValues);
            int minValue = Collections.min(hashValues);
            if(minLengthString > (maxValue-minValue)){
                minLengthString = maxValue-minValue;
                minIndex = minValue;
                maxIndex = maxValue;
            }
            System.out.println(hashValues+" "+minValue+" "+maxValue+" "+minLengthString);
        }
        return s.substring(minIndex, maxIndex+1);
    }
}