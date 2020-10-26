<?php class Solution {

    /**
     * @param String $S
     * @param String $T
     * @return Boolean
     */
    function backspaceCompare($S, $T) {
            $stack1 = new SplStack();
            $stack2 = new SplStack();
            $split1 = str_split($S);
            $split2 = str_split($T);
            for($i = 0;$i<strlen($S);$i++){
                if($split1[$i] <> '#'){
                    $stack1->push($split1[$i]);
                }
                elseif(count($stack1) == 0 && $split1[$i] == '#'){
                    continue;
                }
                elseif($split1[$i] == '#'){
                    $stack1->pop();
                }
            }
            for($i = 0;$i<strlen($T);$i++){
                if($split2[$i] <> '#'){
                    $stack2->push($split2[$i]);
                }
                elseif(count($stack2) == 0 && $split2[$i] == '#'){
                    continue;
                }
                elseif($split2[$i] == '#'){
                    $stack2->pop();
                }
            }
            if(count($stack1) <> count($stack2)){
                return false;
            }
            else{
                $count = count($stack1);
                for($i = 0; $i < $count; $i++){
                    if($stack1->top() == $stack2->top()){
                        $stack1->pop();
                        $stack2->pop();
                    }
                    else{
                        return false;
                    }
                }
                return true;
            }
    }
}
?>