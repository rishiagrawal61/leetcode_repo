<?php
class Solution {

    /**
     * @param Integer[][] $richer
     * @param Integer[] $quiet
     * @return Integer[]
     */
    function loudAndRich($richer, $quiet) {
        $eleArr = [];
        foreach($richer as $value) {
            if(isset($eleArr[$value[1]]))
                array_push($eleArr[$value[1]], $value[0]);
            else
                $eleArr[$value[1]] = [$value[0]];
        }
        $ans = [];
        for($i = 0;$i<count($quiet);$i++) {
            $bPerson = [];
            array_push($bPerson, $i);
            $this->getBillgerPerson($eleArr, $i, $bPerson);
            if(count($bPerson) == 1) {
                $ans[$i] = $bPerson[0];
            } else {
                $min = PHP_INT_MAX;$minInd = 0;
                for($j = 0;$j<count($bPerson);$j++) {
                    if($quiet[$bPerson[$j]] < $min) {
                        $min = $quiet[$bPerson[$j]];
                        $minInd = $bPerson[$j];
                    }
                }
                $ans[$i] = $minInd;
            }
        }
        return $ans;
    }
    
    function getBillgerPerson($eleArr, $key, &$bArr) {
        if(!isset($eleArr[$key])){
            return;
        } else {
            foreach($eleArr[$key] as $eleKey => $value) {
                array_push($bArr, $value);
                if(!isset($eleArr[$value])) {
                    continue;
                }
                $this->getBillgerPerson($eleArr, $value, $bArr);
            }
        }
    }
}
?>