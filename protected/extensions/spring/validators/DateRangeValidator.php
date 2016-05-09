<?php
class DateRangeValidator extends CValidator
{	
	public $allowEmpty=true;
	public $format = 'MM/dd/yyyy';
	public $regular = '/^(?P<start_date>[0-9\/]{8,10})?(\ to\ )?(?P<end_date>[0-9\/]{8,10})$/';
	
	protected function validateAttribute($object,$attribute){
		$value=$object->$attribute;
		if($this->allowEmpty && $this->isEmpty($value))
			return;	
		
		if(!preg_match($this->regular, $value, $match)){
			$message=$this->message!==null?$this->message:Yii::t(CONSTANT::ADMIN_LANG_MSG,'input incorrect', array('{0}'=>'{attribute}'));
			$this->addError($object,$attribute,$message);
		}
		else{
			$end_date = NULL;
			$start_date = NULL;			
			
			if(!empty($match['start_date'])){
				if(!($start_date = CDateTimeParser::parse($match['start_date'], $this->format))){					
					$message=$this->message!==null?$this->message:Yii::t(CONSTANT::ADMIN_LANG_MSG, 'Please input in the format `{0}`', array('{0}'=>$this->format)); 					
					$this->addError($object, $attribute, $message);
				}
			}
			if(!empty($match['end_date'])){
				if(!($end_date = CDateTimeParser::parse($match['end_date'], $this->format))){		
					$message=$this->message!==null?$this->message:Yii::t(CONSTANT::ADMIN_LANG_MSG, 'Please input in the format `{0}`', array('{0}'=>$this->format)); 												
					$this->addError($object,$attribute, $message);
				}
			}
			
			if($start_date && $end_date && $end_date < $start_date){
				$message=$this->message!==null?$this->message:Yii::t(CONSTANT::ADMIN_LANG_MSG, 'Start date is not greater than the end date');
				$this->addError($object,$attribute, $message);
			}
		}        
	}
}
?>