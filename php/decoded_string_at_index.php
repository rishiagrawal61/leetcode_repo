<?php
class Solution {

    /**
     * @param String $S
     * @param Integer $K
     * @return String
     */
    function decodeAtIndex($S, $K) {
        $string = '';
        foreach(str_split($S) as $srr){
            if(in_array($srr, array(2,3,4,5,6,7,8,9))){
               $srr = $srr-1;$str1 = $string;
               while($srr!=0){
                   $string.=$str1;
                   $srr--;
               }
            }
            else{
                $string.=$srr;
            }
        }
        return substr($string, $K-1, 1);
    }
}
?>