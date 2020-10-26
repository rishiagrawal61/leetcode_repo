<?php
	interface shapeFactory {
		public function draw();
	}
	class Rectangle implements shapeFactory {
		public function draw(){
			return 'I am a Rectangle';
		}
	}
	class Circle implements shapeFactory {
		public function draw(){
			return 'I am a Circle';
		}
	}
	class Factory{
		public function getInstance($type){
			if($type == 'Rectangle'){
				return new Rectangle();
			}
			else if($type == 'Circle'){
				return new Circle();
			}
			else{
				return 'Invalid Type Provided';
			}
		}
	}
    try{
	    $shape = new Factory();
	    $shapeObj = $shape->getInstance('Hello');
	    var_dump($shapeObj->draw());
    } catch (Exception $e){
        var_dump($e);
    }
?>