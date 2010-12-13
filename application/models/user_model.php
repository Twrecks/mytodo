<?php
class User_model extends Model {

	function User_model()
	{
		parent::Model();	
	}
	
	function get_user_list() {
		$userlist = array();
		$users = $this->db->select('id, name')->get('users')->result();
			
		$userlist = array('' => "-- select user --");	
		foreach($users as $user):
	         $userlist[$user->id] = $user->name;
		endforeach;
		
		return $userlist;
	}
	
}