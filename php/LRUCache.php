<?php
class LRUCache {
    /**
     * @param Integer $capacity
     */
    public $counter = 0;
    public $hashCounter = 0;
    public $hashTab1 = array();
    public $hashTab2 = array();
    function __construct($capacity) {
        $this->counter = $capacity;
    }
  
    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        if(isset($this->hashTab1[$key])){
            $this->hashTab2[$key] = $this->hashCounter++;
            return $this->hashTab1[$key];
        } else {
            return -1;
        }
    }
  
    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        if(isset($this->hashTab1[$key])){
            $this->hashTab2[$key] = $this->hashCounter++;
            $this->hashTab1[$key] = $value;
        } else {
            if(count($this->hashTab1) < $this->counter) {
                $this->hashTab1[$key] = $value;
                $this->hashTab2[$key] = $this->hashCounter++;
            } else {
                $min = PHP_INT_MAX;$minKey = 0;
                foreach($this->hashTab2 as $hashKey => $hashValues) {
                    if($hashValues < $min) {
                        $min = $hashValues;
                        $minKey = $hashKey;
                    }
                }
                unset($this->hashTab1[$minKey]);
                unset($this->hashTab2[$minKey]);
                $this->hashTab1[$key] = $value;
                $this->hashTab2[$key] = $this->hashCounter++;
            }
        }
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */
 ?>