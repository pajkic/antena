<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	 
	private $_id;
	private $_name;
	
	public function authenticate()
	{
		/*
		$users = User::model()->findByAttributes(array('login'=>$this->username));
		
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->password]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
			//$this->setState('role', $user->role);
		return !$this->errorCode;
		 * 
		 */
		 $user = User::model()->findByAttributes(array('login'=>$this->username));
		 
		 if ($user===null) { // No user found!
			    $this->errorCode=self::ERROR_USERNAME_INVALID;
		 } else if ($user->pass !== md5($this->password) ) { // Invalid password!
			  $this->errorCode=self::ERROR_PASSWORD_INVALID;
		 } else { // Okay!
	    	  $this->errorCode=self::ERROR_NONE;
			  $this->_id = $user->id;
			  $this->_name = $user->display_name;
			  $this->setState('__role', $user->role->name);
			  $this->setState('__language',$user->language->lang);
			  
			  return !$this->errorCode;
			  
			  
		 }
		 
	}
	
	public function getId() {
    	return $this->_id;
	}
	
	public function getName() {
		return $this->_name;
	}
}