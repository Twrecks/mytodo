<?php
class Task_model extends Model {

	function Task_model()
	{
		parent::Model();	
	}
	
	function to_do_list($limit, $offset) {
		$this->db->select('tasks.id, title, details, name');
		$this->db->join('users', 'users.id = user_id');	
		$this->db->order_by("tasks.id", "desc");
		$query = $this->db->get('tasks', $limit, $offset);	
		return $query->result();
	}
	
	function count() {
		return $this->db->get('tasks')->num_rows(); 
	}
	
	function count_where($field, $value) {
		return $this->db->get_where('tasks', array($field => $value))->num_rows();
	}
	
	function get_user_tasks($id, $limit, $offset) {
		$this->db->select('id, title, details')->where('user_id', $id)->order_by("tasks.id", "desc");
		$query = $this->db->get('tasks',$limit, $offset);	
		return $query->result();
	}
	
	function get_to_do($id) {
		$this->db->select('tasks.id, title, details, users.name, user_id');
		$this->db->where('tasks.id', $id)->join('users', 'users.id = user_id');
		$query = $this->db->from('tasks')->get();	
		
		if($query->num_rows() >= 1) {
			return $query->row();
		} else {
			return false;
		}		
	}

	function add_to_do($data) {
		$this->db->insert('tasks', $data);
		return $this->db->insert_id(); 
	}	
	
	function update_to_do($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('tasks', $data);
	}
	
	function delete($id)
	{
		if($this->db->where('id', $id)->delete('tasks')) 
		{
			$this->_delete_task_files($id);
		}
	}
	
	function _delete_task_files($task_id) {
		$files = $this->db->where('task_id', $task_id)->get('files')->result();
		
		if($this->db->where('task_id', $task_id)->delete('files'))
		{
			foreach($files as $file) 
			{
				unlink("./uploads/".$file->file_name);
				unlink("./uploads/thumbs/".$file->file_name);
			}
		}
	}
	
	function delete_task_file($file) {	
		if($this->db->where('file_name', $file)->delete('files'))
		{
			unlink("./uploads/$file");
			unlink("./uploads/thumbs/$file");
		}
	}
	
	function add_upload_to_db($data) {
		$this->db->insert('files', $data);
	}
	
	function get_files($id) {
		$query = $this->db->select('task_id, file_name')->where('task_id', $id)->get('files');
		return $query->result();
	}
	
	function get_task_list() {
		$tasklist = array();
		$tasks = $this->db->select('id, title')->get('tasks')->result();
			
		$tasklist = array('' => "-- select task --");	
		foreach($tasks as $task):
	         $tasklist[$task->id] = $task->title;
		endforeach;
		
		return $tasklist;
	}
	

}