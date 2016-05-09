<?php
require_once dirname(__FILE__) . '/era/Date_Japanese_Era.php';
class DateCompareValidator extends CValidator
{	
	/**
	 * @var string the name of the attribute to be compared with
	 */
	public $compareAttribute;

	/**
	 * @var string a constant date to be compared with
	 */
	public $compareValue;

	/**
	 * @var boolean whether the attribute value can be null or empty. Defaults to false.
	 * If this is true, it means the attribute is considered valid when it is empty.
	 */
	public $allowEmpty = false;

	/**
	 * @var string the date format used to compare the values.
	 */
	public $dateFormat = 'Y-m-d';

	/**
	 * @var boolean whether this validation rule should be skipped when there is already a validation
	 * error for the current attribute. Defaults to true.
	 */
	public $skipOnError = true;

	/**
	 * @var string the operator for comparison. Defaults to '='.
	 * The followings are valid operators:
	 * <ul>
	 * <li>'=' or '==': validates to see if the two values are equal.</li>
	 * <li>'!=': validates to see if the two values are NOT equal.</li>
	 * <li>'>': validates to see if the value being validated is greater than the value being compared with.</li>
	 * <li>'>=': validates to see if the value being validated is greater than or equal to the value being compared with.</li>
	 * <li>'<': validates to see if the value being validated is less than the value being compared with.</li>
	 * <li>'<=': validates to see if the value being validated is less than or equal to the value being compared with.</li>
	 * </ul>
	 */
	public $operator = '=';

	protected function validateAttribute($object, $attribute)
	{
		$value = $object->$attribute;
		
		if ($this->allowEmpty && $this->isEmpty($value)) {
			return;
		}

		if ($this->compareValue !== null) {
			$compareTo = $compareValue = $this->compareValue;
		}
		else {
			$compareAttribute = $this->compareAttribute === null ? $attribute . '_repeat' : $this->compareAttribute;
			$compareValue = $object->$compareAttribute;
			$compareTo = $object->getAttributeLabel($compareAttribute);
		}
		
		$compareDate = DateTime::createFromFormat($this->dateFormat, $this->convert($compareValue));
		$date = DateTime::createFromFormat($this->dateFormat, $this->convert($value));

		// make sure we have two dates
		if ($date instanceof DateTime && $compareDate instanceof DateTime)
			$diff = ((integer) $date->diff($compareDate)->format('%r%a%H%I%S')) * -1;
		else
			return; // Perhaps not the best way of handling this. Possibly add an error message.

		switch ($this->operator) {
			case '=':
			case '==':
				if ($diff != 0) {
					$message = $this->message !== null ? $this->message : Yii::t('yii', '{attribute} must be repeated exactly.');
					$this->addError($object, $attribute, $message, array('{compareAttribute}' => $this->toString($compareTo)));
				}
				break;
			case '!=':
				if ($diff == 0) {
					$message = $this->message !== null ? $this->message : Yii::t('yii', '{attribute} must not be equal to "{compareValue}".');
					$this->addError($object, $attribute, $message, array('{compareAttribute}' => $this->toString($compareTo), '{compareValue}' => $this->toString($compareValue)));
				}
				break;
			case '>':
				if ($diff <= 0) {
					$message = $this->message !== null ? $this->message : Yii::t('yii', '{attribute} must be greater than "{compareValue}".');
					$this->addError($object, $attribute, $message, array('{compareAttribute}' => $this->toString($compareTo), '{compareValue}' => $this->toString($compareValue)));
				}
				break;
			case '>=':
				if ($diff < 0) {
					$message = $this->message !== null ? $this->message : Yii::t('yii', '{attribute} must be greater than or equal to "{compareValue}".');
					$this->addError($object, $attribute, $message, array('{compareAttribute}' => $this->toString($compareTo), '{compareValue}' => $this->toString($compareValue)));
				}
				break;
			case '<':
				if ($diff >= 0) {
					$message = $this->message !== null ? $this->message : Yii::t('yii', '{attribute} must be less than "{compareValue}".');
					$this->addError($object, $attribute, $message, array('{compareAttribute}' => $this->toString($compareTo), '{compareValue}' => $this->toString($compareValue)));
				}
				break;
			case '<=':
				if ($diff > 0) {
					$message = $this->message !== null ? $this->message : Yii::t('yii', '{attribute} must be less than or equal to "{compareValue}".');
					$this->addError($object, $attribute, $message, array('{compareAttribute}' => $this->toString($compareTo), '{compareValue}' => $this->toString($compareValue)));
				}
				break;
			default:
				throw new CException(Yii::t('yii', 'Invalid operator "{operator}".', array('{operator}' => $this->operator)));
		}
	}
	
	public function convert($date){
		if(is_array($date)){
			if(!empty($date['era']) && !empty($date['view'])){
				if(preg_match('/^(?<year>[0-9]+)\/(?<month>[0-9]+)\/(?<day>[0-9]+)$/', $date['view'], $m)){
					try{
						$era = new Date_Japanese_Era(array($date['era'], $m['year']));
						$date = $era->__get('gregorianYear')."-{$m['month']}-{$m['day']}";
					}
					catch(Exception $e){}
				}	
			}			
		}
		
		return is_array($date) ? NULL : $date;
	}
	
	public function toString($date){
		if(is_array($date))			
			return isset($date['view']) ? $date['view'] : NULL;
		else 
			return $date;	
	}
}
?>