<?php

class User extends Controller {

	function User()
	{
		parent::Controller();
		$this->load->model('user_model');	
	}


}