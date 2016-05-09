<?php
class OneByteCharValidator extends CValidator
{	
	public $allowEmpty=true;	
	
	protected function validateAttribute($object,$attribute){
		$value=$object->$attribute;
		if($this->allowEmpty && $this->isEmpty($value))
			return;	
		
		if ( preg_replace('/[0-9]/', '', $value) ){
			$message=$this->message!==null?$this->message:Yii::t('msg','input.number', array('{0}'=>'{attribute}'));
			$this->addError($object,$attribute,$message);
		}
			
	}
}
?>