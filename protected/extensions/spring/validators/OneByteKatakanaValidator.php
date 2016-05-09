<?php
class OneByteKatakanaValidator extends CValidator
{	
	/**
	 * @var boolean whether the attribute value can be null or empty. Defaults to true,
	 * meaning that if the attribute is empty, it is considered valid.
	 */
	public $allowEmpty=true;
	
	//public $pattern='/^[\x{30A0}-\x{30FF}]+$/u';
	public $pattern="/^(?:\xEF\xBD[\xA1-\xBF]|\xEF\xBE[\x80-\x9F]|[0-9])+$/";//#5200	111114
	
	protected function validateAttribute($object,$attribute){
		$value=$object->$attribute;
		if($this->allowEmpty && $this->isEmpty($value))
			return;			
		
		$to_encoding = 'UTF-8';
		if(!mb_check_encoding($value, $to_encoding)){
		 $value = mb_convert_encoding($value, $to_encoding);
		}	
		//$value = mb_convert_encoding($value, 'UTF-8');
    if( !preg_match($this->pattern, $value) ){
			$message=$this->message!==null?$this->message:Yii::t('yii','{attribute} must be a one byte katakana.');
			$this->addError($object,$attribute,$message);
		}
	}
}
?>