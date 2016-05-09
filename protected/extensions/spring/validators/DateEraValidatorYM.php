<?php
require_once dirname(__FILE__) . '/era/Date_Japanese_Era.php';
class DateEraValidatorYM extends CValidator
{	
	public $allowEmpty=true;
	public $default = '00/00';
	public $allowDefault = true;
	public $isZero = true;
	
	protected function validateAttribute($object,$attribute){
	
		$value=$object->$attribute;
		if($this->allowEmpty && $this->isEmpty($value))
			return;	
		if(is_array($value) && !empty($value['era']) && !empty($value['view'])){
			
			if($this->allowDefault && $value['view'] == $this->default) return;
			
			$isVald = false;
						
			if(preg_match('/^(?<year>[0-9]+)\/(?<month>[0-9]+)$/', $value['view'], $m)){
				try{
					$era = new Date_Japanese_Era(array($value['era'], $m['year']));
					if($this->isZero && intval($m['month']) == 0){
						$isVald = true;
					}
					else{
						$calendar = new Date_Japanese_Era(array($era->__get('gregorianYear'), $m['month'], 15));						
						if($era->__get('nameAscii') == $calendar->__get('nameAscii')){
							$isVald = true;						
						}
					}
				}
				catch(Exception $e){}
			}			
			
			if(!$isVald){
				$message=$this->message!==null?$this->message:Yii::t('msg','field.input.wrong', array('{0}'=>'{attribute}'));;
				$this->addError($object,$attribute, $message);
			}
		}
		
	}
	
}
?>