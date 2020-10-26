<?php
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer[] $nums3
     * @return Integer[]
     */
    function twoOutOfThree($nums1, $nums2, $nums3) {
        $nums1EleArr = [];
        $nums2EleArr = [];
        $nums3EleArr = [];
        for($i = 0;$i<count($nums1);$i++) {
            $nums1EleArr[$nums1[$i]]++;
        }
        for($i = 0;$i<count($nums2);$i++) {
            $nums2EleArr[$nums2[$i]]++;
        }
        for($i = 0;$i<count($nums3);$i++) {
            $nums3EleArr[$nums3[$i]]++;
        }
        $common = [];
        foreach($nums1EleArr as $key => $value) {
            if(isset($nums2EleArr[$key])) {
                $common[$key]++;
            }
        }
        foreach($nums2EleArr as $key => $value) {
            if(isset($nums3EleArr[$key])) {
                $common[$key]++;
            }
        }
        foreach($nums1EleArr as $key => $value) {
            if(isset($nums3EleArr[$key])) {
                $common[$key]++;
            }
        }
        return array_keys($common);
    }
}
?>