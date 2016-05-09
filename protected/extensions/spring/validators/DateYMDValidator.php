<?php
class DateYMDValidator extends CValidator
{	
	public $allowEmpty=true;
	
	
	protected function validateAttribute($object, $attribute)
	{
		$value = $object->$attribute;
		
		if ($this->allowEmpty && $this->isEmpty($value)) {
			return;
		}
		
		$isVald = false;
		if(preg_match('/^(?<year>[0-9]+)\/(?<month>[0-9]+)\/(?<day>[0-9]+)$/', $value, $m)){
			$year = $m['year'];
			$month = $m['month'];
			$day = $m['day'];
			try{
				if (checkdate($month, $day, $year) === true) {
					$isVald = true;
				}
				
			}
			catch(Exception $ex){
				
			}
		}
		if(!$isVald){
			$message=$this->message!==null?$this->message:Yii::t('msg','field.input.wrong', array('{0}'=>'{attribute}'));;
			$this->addError($object,$attribute, $message);
		}
	}
	
}
?>