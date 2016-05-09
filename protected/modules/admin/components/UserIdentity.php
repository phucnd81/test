<?php
class UserIdentity extends CUserIdentity
{
	private $_id;

	public function authenticate()
	{
		$user = CActiveRecord::model(Yii::app()->controller->module->modelAuthName)->login($this->username, Yii::app()->controller->module->attributes);
		if($user===null){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
				
		}else if($user->password !== $this->password){
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		}else{
			$this->_id = $user->id;
			$this->setState('id', $user->id);
			$this->setState('user_name', $user->user_name);
			$this->setState('password', $user->user_name);
			$this->errorCode = self::ERROR_NONE;
		}
		unset($user);
		return $this->errorCode == self::ERROR_NONE;
	}

	public function getId(){
		return $this->_id;
	}

}
?>