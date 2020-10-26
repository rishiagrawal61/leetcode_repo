<?php
class Solution {

    /**
     * @param Integer[] $seats
     * @param Integer[] $students
     * @return Integer
     */
    function minMovesToSeat($seats, $students) {
        sort($seats);
        sort($students);
        $moves = 0;
        for($i = 0;$i<count($seats);$i++) {
            $moves+=abs($students[$i]-$seats[$i]);
        }
        return $moves;
    }
}
?>