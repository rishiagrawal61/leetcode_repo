<?php
class Solution {

    /**
     * @param String[] $words
     * @return String
     */
    function firstPalindrome($words) {
        for($i = 0;$i<count($words);$i++) {
            $reverseString = strrev($words[$i]);
            if($words[$i] == $reverseString)
                return $reverseString;
        }
        return "";
    }
}
?>