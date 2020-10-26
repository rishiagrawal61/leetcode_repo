<?php
class Solution {

    /**
     * @param String $allowed
     * @param String[] $words
     * @return Integer
     */
    function countConsistentStrings($allowed, $words) {
        $eleArr = [];
        $allowed = str_split($allowed);
        for($i = 0;$i<count($allowed);$i++){
            $eleArr[ord($allowed[$i]) - ord('a')] = true;
        }
        $count = 0;
        for($i = 0;$i<count($words);$i++) {
            $worldElement = str_split($words[$i]);
            $isValid = true;
            for($j = 0;$j<count($worldElement);$j++) {
                if(!$eleArr[ord($worldElement[$j])-ord('a')]){
                    $isValid = false;
                    break;
                }
            }
            if($isValid) {
                $count++;
            }
        }
        return $count;
    }
}
?>