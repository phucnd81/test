<?php
require_once dirname(__FILE__) . '/era/Date_Japanese_Era.php';
class DateEraValidator extends CValidator
{	
	public $allowEmpty=true;
	public $checkDay = true;
	
	public function validateForm($object,$attribute){
		return $this -> validateAttribute($object,$attribute);
	}
	
	protected function validateAttribute($object,$attribute){
		$value=$object->$attribute;
		if($this->allowEmpty && $this->isEmpty($value))
			return;	
		
		if(is_array($value) && !empty($value['era']) && !empty($value['view'])){
			$isVald = false;
						
			if(preg_match('/^(?<year>[0-9]+)\/(?<month>[0-9]+)\/(?<day>[0-9]+)$/', $value['view'], $m)){
				try{
					$era = new Date_Japanese_Era(array($value['era'], $m['year']));
					$calendar = new Date_Japanese_Era(array($era->__get('gregorianYear'), $m['month'], ($this->checkDay ? $m['day'] : 1)));						
					if($era->__get('nameAscii') == $calendar->__get('nameAscii')){
						//$object->{$attribute}['date'] = $era->__get('gregorianYear')."/{$m['month']}/{$m['day']}";						
						$isVald = true;						
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