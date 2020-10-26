<?php
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function nextGreaterElement($nums1, $nums2) {
        $eleArr = [];
        for($i = 0;$i<count($nums2);$i++) {
            $eleArr[$nums2[$i]] = $i;
        }
        for($i = 0;$i<count($nums1);$i++) {
            $val = $nums1[$i];
            for($j = $eleArr[$nums1[$i]];$j<count($nums2);$j++) {
                if($nums2[$j] > $nums1[$i]) {
                    $nums1[$i] = $nums2[$j];
                    break;
                }
            }
            if($nums1[$i] == $val) {
                $nums1[$i] = -1;
            }
        }
        return $nums1;
    }
}
?>