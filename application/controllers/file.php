<?php
class File extends Controller {
	
	function __construct() {
		parent::Controller();
		$this->load->helper(array('url', 'form'));
		$this->load->model(array('account_model', 'task_model', 'file_model'));
	}
	
	function add() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('task', 'Task', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert_error alert">', '</div>');
		
		$data['tasks'] = $this->task_model->get_task_list();
		
		if ($this->form_validation->run() == FALSE)
		{			
			$this->load->view('file/add', $data);
		}
		else
		{		
			$task = $_POST['task'];
			if($this->file_model->upload_task_file($task) ) {	
			redirect('task/view/'.$task);		
			}
		}
	}

}
?>