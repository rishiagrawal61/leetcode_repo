<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function myAtoi($s) {
        $s = ltrim($s);
        if(strlen($s) > 0){
            $string = '';$srr = str_split($s, 1);
            $num_arr = array('0','1','2','3','4','5','6','7','8','9');
            for($i = 0; $i<count($srr); $i++){
                if($i == 0 && ($srr[0] == '-' || $srr[0] == '+')){
                    if($srr[0] == '-')
                        $string = $srr[0];
                }
                else if(in_array($srr[$i], $num_arr)){
                    $string.=$srr[$i];
                }
                else if(!in_array($srr[$i], $num_arr)){
                    if($string == '')
                        $string = 0;    
                    break;
                }
            }
            if($string == 0){
                return 0;
            }
            else if($string < (0-pow(2,31))){
                return (0-pow(2,31));
            }
            else if($string >= pow(2,31))
            {
                return pow(2,31)-1;
            }
            else{
                return (float)$string;
            }
        }
        return 0;
    }
}
?>