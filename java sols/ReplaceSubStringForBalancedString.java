import java.util.*;
import java.util.Set;
class Solution {
    public int balancedString(String s) {
        Hashtable<Character, Integer> ht1 = new Hashtable<Character, Integer>();
        int charLength = 0;int equiLength = s.length()/4;
        for(int i = 0;i<s.length();i++){
            char letter = s.charAt(i);
            if(ht1.containsKey(letter)){
                charLength = ht1.get(letter);
                ht1.replace(letter, charLength, charLength+1);
            } else
                ht1.put(letter, 1);
        }
        charLength = 0;
        System.out.println(ht1);
        Set<Character> hashKeys = ht1.keySet();
        int moreBalanceInt = 0;int lessBalanceInt = 0;
        for(Character key : hashKeys){
            charLength = ht1.get(key);
            if(charLength > equiLength){
                moreBalanceInt += (charLength-equiLength);
            }
            if(charLength < equiLength){
                lessBalanceInt += (equiLength-charLength);
            }
        }
        return moreBalanceInt;
    }
}

//Alternative
class Solution {
    public int balancedString(String s) {
		int[] count = new int[128];
        int n = s.length(), res = n, i = 0, k = n / 4;
        for (int j = 0; j < n; ++j) {
            ++count[s.charAt(j)];
        }
        for (int j = 0; j < n; ++j) {
            --count[s.charAt(j)];
            while (i < n && count['Q'] <= k && count['W'] <= k && count['E'] <= k && count['R'] <= k) {
                res = Math.min(res, j - i + 1);
                ++count[s.charAt(i++)];
            }
        }
        return res;
    }
}