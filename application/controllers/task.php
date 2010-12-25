<?php

class Task extends Controller {

	function Task()
	{
		parent::Controller();
		$this->load->model(array('user_model', 'task_model', 'account_model', 'file_model'));	
	}
	
	
	function index() {
		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost/todo/task/index';
		$config['total_rows'] = $this->task_model->count();
		$config['per_page'] = 5;
		$config['num_links'] = 2;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		
		$this->pagination->initialize($config);
		
		$data['tasks'] = $this->task_model->to_do_list($config['per_page'], $this->uri->segment(3));
		$data['title'] = "Task list";
		$data['user'] = $this->session->userdata('username');
		
		$this->load->view('task/tasks', $data);
	}
	
	
	function view($id) {
		if($this->task_model->get_to_do($id) == false) {
			$data['message'] = "Invalid Task";
			$this->load->view('task/notask', $data);
		} else {
			$data['task'] = $this->task_model->get_to_do($id);
			$data['files'] = $this->task_model->get_files($id);
			$data['title'] = "Task";
			$this->load->view('task/task', $data);
		}
	}
	
	
	function add() {
		if($this->account_model->logged_in() === TRUE) 
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('details', 'Details', 'required');
			$this->form_validation->set_rules('user_id', 'User', 'required');
			$this->form_validation->set_error_delimiters('<div class="alert_error alert">', '</div>');

			$data = array(
				'user_id' => $this->input->post('user_id'),
				'title' => $this->input->post('title'),
				'details' => $this->input->post('details')
			);

			if ($this->form_validation->run() == FALSE)
			{
				$data['title'] = "Add a task";
				$data['users'] = $this->user_model->get_user_list();
				$this->load->view('task/addtask', $data);
			}
			else
			{		
				$id = $this->task_model->add_to_do($data);
				if (!empty($_FILES['userfile']['name'])) 
				{
					$this->file_model->upload_task_file($id);	
				}
				redirect('task/task');	
			}

		} else {		
			$this->load->view('account/login');
		}
	}
	
	
	function update() {
		if($this->account_model->logged_in() === TRUE) 
		{
			$id = $this->uri->segment(3);
			$data['task'] = $this->task_model->get_to_do($id);
			$data['users'] = $this->user_model->get_user_list();
			$data['files'] = $this->task_model->get_files($id);
			$data['title'] = "Edit to do: ";		
			$this->load->view('task/edittask', $data);	
		} else {
			//$this->session->set_flashdata('msg', "<div class=\"alert_error alert\">You must be logged in to edit</div>");
			//redirect('account/login');
			$this->load->view('account/login');
		}
	}
	
	
	function do_update() {
		$id = $this->input->post('id');
		$data = array(
			'user_id' => $this->input->post('user_id'),
			'title' => $this->input->post('title'),
			'details' => $this->input->post('details')
		);
		
		$this->task_model->update_to_do($id, $data);
		
		$this->session->set_flashdata('alert', "<div class=\"alert_success alert\">Task edited successfully</div");
		redirect("task/view/$id");
	}
	

	function delete() {
		if($this->account_model->logged_in() === TRUE) 
		{
			$id = $this->uri->segment(3);
			$this->task_model->delete($id);

			$this->session->set_flashdata('alert', "<div class=\"alert_success alert\">Task deleted successfully</div");
			redirect("task/index");
		} else {
			$this->load->view('account/login');
		}		
	}
	
	function delete_file($file)
	{
		$this->task_model->delete_task_file($file);
		redirect($_SERVER['HTTP_REFERER']);
		
	}
	
	
	function upload() {
		if($id = $this->input->post('task_id'))
		{
			$this->file_model->upload_task_file($id);
			redirect("task/update/$id");	
		}		
	}

	
	function uploadtest()
		{
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|pdf';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '1024';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload())
			{			
				$data = array('upload_data' => $this->upload->data());
				echo "<pre>";
				print_r($data);
				echo "<pre>";		
			}	
			else
			{
				$data = array('upload_data' => $this->upload->data());

				$this->load->view('upload_success', $data);
			}
		}
	function download_files($file) {
		$path = "http://localhost/todo/uploads/";
		$this->load->helper('download');
		$data = file_get_contents("$path$file"); 
		force_download($file, $data);
	}
		
	function test() {
		echo "<pre>";
		print_r($_SERVER['HTTP_REFERER']);
		echo "<pre>";
	}
	
	function msg() {
		$this->session->set_flashdata('alert', "<div class=\"alert_success\">Task deleted successfully</div");
		$this->load->view('task_removed');
	}
	
	
}