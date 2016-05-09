<?php
class Client
{
    public $gearman = null;
			
	public function __call($name, $args){
		$this->gearman->doBackground('worker', CJSON::encode(array("{$name}Worker", $args)));		
		if($this->gearman->returnCode() != GEARMAN_SUCCESS){
			 return false;
		}
		return true;
	}	
}
