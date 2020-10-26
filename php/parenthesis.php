<?php
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function checkValidString($s) {
        if(strlen($s) <> 0){
            $stack = new SplStack();
            $array = str_split($s);
            $a=0;$b = 0;$c = 0;
            for($i = 0; $i < count($array); $i++){
                if($array[$i] == '('){
                    if($c >= 0)
                        $c--;
                    else
                        $stack->push('(');
                }
                else if($array[$i] == '*'){
                    $a++;
                    if(!$stack->isEmpty())
                        $c++;
                }
                else{ 
                    if(!$stack->isEmpty()){
                        $stack->pop();
                    }else if($a > 0){
                        $a--;
                    }else{
                        $b+=1;
                    }
                }
            }
            if(!$stack->isEmpty())
                $a = $c;
            if($b > 1)
                $b = 0;
            if($stack->count() <= $a && $b==0)
                return true;
            else
                return false;
        }
        else
            return true;
    }
}
?>