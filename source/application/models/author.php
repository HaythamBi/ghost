<?php

class Author extends Eloquent {

	public static $hidden = array('password');

	# password mutator

	public function set_password($password)
	{
		$this->set_attribute('password', \Hash::make($password));
	}

	# gravatar
	
	public function gravatar($size = 120, $extension = 'jpg')
	{
		if (! $this->email) return false;
		return 'http://www.gravatar.com/avatar/' . md5($this->email) . '.' . $extension . '?s=' . $size;
	}

}
