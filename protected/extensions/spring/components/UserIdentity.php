<?php
class UserIdentity extends CUserIdentity
{
	private $_id;
	
	public function authenticate(){
		$user = NULL;

		if($user === NULL){
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		}
		else if( $user->login_pw == $this->password ){
			$this->_id = $user->id;			
			$this->errorCode = self::ERROR_NONE;		
		}
		else{
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		}
		
		return !$this->errorCode;
	}
	
	public function getId(){
        return $this->_id;
    }
}