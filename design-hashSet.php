<?php
class MyHashSet {
    /**
     */
    private $hashArr;
    function __construct() {
        $this->hashArr = [];
    }
  
    /**
     * @param Integer $key
     * @return NULL
     */
    function add($key) {
        if(isset($this->hashArr[$key]))
            $this->hashArr[$key]++;
        else
            $this->hashArr[$key] = 1;
    }
  
    /**
     * @param Integer $key
     * @return NULL
     */
    function remove($key) {
        if(isset($this->hashArr[$key]))
            unset($this->hashArr[$key]);
    }
  
    /**
     * @param Integer $key
     * @return Boolean
     */
    function contains($key) {
        if(isset($this->hashArr[$key]))
            return true;
        else
            return false;
    }
}

/**
 * Your MyHashSet object will be instantiated and called as such:
 * $obj = MyHashSet();
 * $obj->add($key);
 * $obj->remove($key);
 * $ret_3 = $obj->contains($key);
 */
?>