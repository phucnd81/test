<?php
class OneByteValidator extends CValidator
{	
	/**	 
	 * http://php.net/manual/en/function.mb-detect-encoding.php
	 */
	public $allowEmpty=true;	
	
	protected function validateAttribute($object,$attribute){
		$value=$object->$attribute;
		if($this->allowEmpty && $this->isEmpty($value))
			return;	
		
		if(!$this->validateArray((is_array($value) ? $value : array($value)))){
			$message=$this->message!==null?$this->message:Yii::t('msg','input.1byte', array('{0}'=>'{attribute}'));
			$this->addError($object,$attribute,$message);
		}
	}
	
	private function validateArray($data = array()){
		foreach($data as $key=>$val){
			if(!empty($val) && !$this->validateString($val)){
				return false;	
			}
		}
		
		return true;
	}
	
	private function validateString($string){		
        $i = 0;
		$len = strlen($string);           
        while( $i < $len ) {
            $char = ord(substr($string, $i++, 1));
            if($this->validateChar($char)){
                continue;
            }else{
				return false;
			}
        }
        return true;
	}
	
	private function validateChar($char){		
        if(!is_int($char)) return false;
        return ($char & 0x80) == 0x00;   
	}
}
?>