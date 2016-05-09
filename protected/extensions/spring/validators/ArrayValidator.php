<?php
class ArrayValidator extends CValidator
{	
	public $allowEmpty=true;
	public $vaild = array();
	
	protected function validateAttribute($object,$attribute){
		$value=$object->$attribute;
		
		if($this->allowEmpty && $this->isEmpty($value))
			return;	
		
		if(is_array($value) && !empty($this->vaild)){
			foreach($value as $row){
				foreach($this->vaild as $v){
					if(!empty($v['name'])){
						if(isset($row[$v['name']]))
							$row[$v['name']] = trim($row[$v['name']]);
							
						if(!empty($v['req']) && empty($row[$v['name']])){
							$this->addError($object, $attribute, $v['req_message']);
							return;
						}
						
						if(!empty($row[$v['name']]) && !empty($v['regular']) && !preg_match($v['regular'], $row[$v['name']])){
							$this->addError($object, $attribute, $v['regular_message']);
							return;	
						}
					}
				}
			}
		}
	}
}
?>