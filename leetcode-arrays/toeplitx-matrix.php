<?php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Boolean
     */
    function isToeplitzMatrix($matrix) {
        $n = count($matrix[0]);
        if(count($matrix) == 1 && $n == 1)
            return true;
        $isValid = true;
        for($i = 0;$i<count($matrix);$i++) {
            if(!$this->checkValidity($i, 0, $matrix)) {
                $isValid = false;
                break;
            }
        }
        if(!$isValid)
            return $isValid;
        for($i = 1;$i<$n;$i++) {
            if(!$this->checkValidity(0, $i, $matrix)) {
                $isValid = false;
                break;
            }
        }
        if(!$isValid)
            return $isValid;
        else
            return true;
    }
    
    function checkValidity($i, $j, $matrix) {
        $val = $matrix[$i][$j];
        $isValid = true;
        while(isset($matrix[$i][$j])) {
            if($matrix[$i][$j] != $val) {
                $isValid = false;
                break;
            }
            $i++;
            $j++;
        }    
        return $isValid;
    }
}
?>