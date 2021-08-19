<?php
class Singleton{
	public static $object;
 	public static function getInstance(){
    	if(isset(Singleton::$object))
          	return Singleton::$object;
    	Singleton::$object = new Singleton();
    	return Singleton::$object;
 	}
  	public function getQuery(){
      	return 'Hello Rishi';
    }
 	private function __construct() {}
}

$obj = Singleton::getInstance();
var_dump($obj->getQuery());
?>