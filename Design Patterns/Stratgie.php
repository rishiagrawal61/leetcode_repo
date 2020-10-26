<?php
	interface operationStratgie {
		public function setValue($var1, $var2);
		public function getValue();
	}
	class Sum implements operationStratgie {
		public $arrayInput = array();
		public function setValue($var1, $var2){
			$this->arrayInput[0] = $var1; 
			$this->arrayInput[1] = $var2;
		}
		public function getValue(){
			return $this->arrayInput[0]+$this->arrayInput[1];
		}
	}
	class Difference implements operationStratgie {
		public $arrayInput = array();
		public function setValue($var1, $var2){
			$this->arrayInput[0] = $var1; 
			$this->arrayInput[1] = $var2;
		}
		public function getValue(){
			return $this->arrayInput[0]-$this->arrayInput[1];
		}
	}

    function operations ($type){
    	if($type == '+'){
    		return new Sum;
    	}
    	if($type == '-'){
    		return new Difference;
    	}
    }

    $calObject = operations('-');
    $obj = $calObject->setValue(1,2);
    var_dump($calObject->getValue());
?>