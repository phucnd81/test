<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $login;
	public $rememberMe =false;
	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
				// username and password are required
				array('username', 'required', 'message'=>Yii::t('msg','please.input', array('{0}'=>'{attribute}'))),
				array('password', 'required', 'message'=>Yii::t('msg','please.input', array('{0}'=>'{attribute}'))),
				array('rememberMe', 'boolean'),
				// password needs to be authenticated
				array('login', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
				'username' => 'ログインID',
				'password' => 'パスワード',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity = new UserIdentity($this->username, $this->password);
			if(!$this->_identity->authenticate())
				$this->addError('login', Yii::t('msg', 'login.failed'));
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			//$duration=$this->rememberMe ? 3600*24*14 : 0; // 14 days
			$duration = 3600*24*14;
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}