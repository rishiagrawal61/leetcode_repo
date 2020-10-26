<?php
class KthLargest {
    /**
     * @param Integer $k
     * @param Integer[] $nums
     */
    function __construct($k, $nums) {
        $this->k = $k;
        $this->numStream = new SplMinHeap();
        for($i = 0;$i<count($nums);$i++)
            $this->add($nums[$i]);
    }
  
    /**
     * @param Integer $val
     * @return Integer
     */
    function add($val) {
        if($this->numStream->count() < $this->k){
            $this->numStream->insert($val);
        } elseif ($this->numStream->top() < $val) {
            $this->numStream->extract();
            $this->numStream->insert($val);
        }
        return $this->numStream->top();
    }
}

/**
 * Your KthLargest object will be instantiated and called as such:
 * $obj = KthLargest($k, $nums);
 * $ret_1 = $obj->add($val);
 */
?>