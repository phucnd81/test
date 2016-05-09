<?php
class NumAndSpecialCharValidator extends CValidator
{	
	/**	 
	 * http://php.net/manual/en/function.mb-detect-encoding.php
	 */
	public $allowEmpty=true;	
	
	protected function validateAttribute($object,$attribute){
		$value=$object->$attribute;
		if($this->allowEmpty && $this->isEmpty($value))
			return;	
		
        if (preg_match('/[a-zA-Z]/', $value))
        {
            $message=$this->message!==null?$this->message:Yii::t(CONSTANT::SPRING_LANG_MSG,'input incorrect', array('{0}'=>'{attribute}'));
			$this->addError($object,$attribute,$message);
        }
	}
}
?>