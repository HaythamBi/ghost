<?php

class Author extends Eloquent {

	public static $hidden = array('password');

	# password mutator

	public function set_password($password)
	{
		$this->set_attribute('password', \Hash::make($password));
	}

}
