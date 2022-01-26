<?php
class MyHashMap {
    /**
     */
    private $hashArr;
    function __construct() {
        $this->hashArr = [];
    }
  
    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        if(isset($this->hashArr[$key]))
            $this->hashArr[$key] = $value;
        else
            $this->hashArr[$key] = $value;
    }
  
    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        if(isset($this->hashArr[$key]))
            return $this->hashArr[$key];
        else
            return -1;
    }
  
    /**
     * @param Integer $key
     * @return NULL
     */
    function remove($key) {
        if(isset($this->hashArr[$key]))
            unset($this->hashArr[$key]);
    }
}

/**
 * Your MyHashMap object will be instantiated and called as such:
 * $obj = MyHashMap();
 * $obj->put($key, $value);
 * $ret_2 = $obj->get($key);
 * $obj->remove($key);
 */
?>