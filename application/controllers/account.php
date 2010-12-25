<?php
class Account extends Controller {
	
	function __construct() {
		parent::Controller();
		$this->load->library('form_validation');
		$this->load->helper(array('url', 'form'));
		$this->load->model(array('account_model', 'task_model'));
		
		$this->_salt = "123456789987654321";
	}
	
	function index() {
		if($this->account_model->logged_in() === TRUE) 
		{
			$this->dashboard(TRUE);
		} else {
			$this->load->view('account/details');
		}
	}
	
	function dashboard($condition = FALSE) {
		if($condition === TRUE || $this->account_model->logged_in() === TRUE) 
		{
			$id = $this->session->userdata('userid');
			
			$this->load->library('pagination');
			$config['base_url'] = site_url('account/dashboard');
			$config['total_rows'] = $this->task_model->count_where('user_id', $id);
			$config['per_page'] = 3;
			$config['num_links'] = 2;
			$config['full_tag_open'] = '<div id="pagination">';
			$config['full_tag_close'] = '</div>';
			$this->pagination->initialize($config);
			
			$data['tasks'] = $this->task_model->get_user_tasks($id, $config['per_page'], $this->uri->segment(3));
			$this->load->view('account/dashboard', $data);
		} else {
			$this->session->set_flashdata('msg', "<div class=\"alert_warning alert\">You must be logged in to access</div>");
			redirect('account/login');
		}
	}
	
	function login() {
		if($this->account_model->logged_in() === TRUE) 
		{
			redirect('account/dashboard');
		} else {
			$this->form_validation->set_error_delimiters('<div class="alert_error alert">', '</div>');
			$this->form_validation->set_rules('username', 'Username', 'xss_clean|required|callback_username_check');
			$this->form_validation->set_rules('password', 'Password', 'xss_clean|required|min_lenght[4]|max_length[12]|sha1|callback_password_check');

			$this->_username = $this->input->post('username');
			$this->_password = sha1($this->_salt.$this->input->post('password'));

			if($this->form_validation->run() == FALSE) 
			{
				$this->load->view('account/login');
			} else {
				$this->account_model->login();
				header("location: ".$_SERVER['HTTP_REFERER']);
			}
		}
	}
	
	function logout() {
		$this->session->sess_destroy();
		redirect('account/login');
	}
	
	function username_check() {
		$this->db->where('username', $this->_username);
		$query = $this->db->get('users');
		$result = $query->row_array();
		
		if($query->num_rows() >= 1) {
			return TRUE;
		}else {
			$this->form_validation->set_message('username_check', 'There was an error, Please try another username');
			return FALSE;
		}
	}
	
	function password_check() {
		$this->db->where('username', $this->_username);
		$query = $this->db->get('users');
		$result = $query->row_array();
		
		if($query->num_rows() == 0) 
		{
			$this->form_validation->set_message('password_check', "There was an error, Please try another password");
			return FALSE;
		}else {
			if($result['password'] == $this->_password)
			{
				return TRUE;
			}
		}
	}
	
	function register() {
		$this->form_validation->set_rules('username', 'Username', 'xss_clean|required|callback_user_exists');
		$this->form_validation->set_rules('email', 'Email Address', 'xss_clean|required|valid_email|callback_email_exists');
		$this->form_validation->set_rules('name', 'Name', 'xss_clean|required');
		$this->form_validation->set_rules('password', 'Password', 'xss_clean|required|min_length[4]|max_length[12]');
		$this->form_validation->set_rules('password_conf', 'Password Confirmation', 'xss_clean|required|matches[password]');	
		
		$this->form_validation->set_error_delimiters('<div class="alert_error alert">', '</div>');
		
		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('account/register');
		} else {
			$data['username'] = $this->input->post('username');
			$data['email'] = $this->input->post('email');
			$data['name'] = $this->input->post('name');
			$data['password'] = $this->_encode_pass($this->input->post('password'));
			
			if($this->account_model->create($data) === TRUE)
			{
				$data['message'] = "Your user account has been created! You can now ". anchor('account/login', 'Login'). ".";
				$this->_send_registration_email($data['username'], $this->input->post('password_conf'), $data['email']);
				$this->load->view('account/success', $data);
			} else {
				$data['error'] = "There was a problem creating your account.";
				$this->load->view('account/error', $data);
			}
		}
	}
	
	function user_exists($user) {
		$query = $this->db->get_where('users', array('username' => $user));
		if($query->num_rows() > 0) 
		{
			$this->form_validation->set_message('user_exists', 'The %s already existes, please try another.');
			return FALSE;
		}
		$query->free_result();
		return TRUE;
	}
	
	// returns true if email exists
	function email_exists($email) {
		$query = $this->db->get_where('users', array('email' => $email));
		if($query->num_rows() > 0) 
		{
			$this->form_validation->set_message('email_exists', 'The %s already existes, please try another.');
			return FALSE;
		}
		$query->free_result();
		return TRUE;
	}
	
	function email_db_check($email) {
		$query = $this->db->get_where('users', array('email' => $email));
		if(!$query->num_rows() > 0) 
		{
			$this->form_validation->set_message('email_db_check', 'The %s is not in our database.');
			return FALSE;
		}
		$query->free_result();
		return TRUE;
	}
	
	function reset() {
		$this->form_validation->set_rules('email', 'Email Address', 'xss_clean|required|valid_email|callback_email_db_check');
		$this->form_validation->set_error_delimiters('<div class="alert_error alert">', '</div>');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('account/lostpass');
		} else {
			$email = $this->input->post('email');
			if(!$this->_reset_password($email)) {
				$this->load->view('account/lostpass');
			} else {
				$this->load->view('account/passreset');
			}
		}
	}
	
	function _reset_password($email) {
		$newpass = $this->_gen_pass();
		$encodedpass = $this->_encode_pass($newpass);
		if( $this->db->where('email', $email)->update('users', array('password'=>$encodedpass)) ) {
			$this->_send_reset_email($email, $newpass);
			return TRUE;
		} else {
			$this->load->view('account/lostpass');
			return FALSE;
		}	
	}
	
	function _send_reset_email($email, $pass) {
		$this->load->library('email');

		$this->email->from('no-reply@example.com', 'Site Admin');
		$this->email->to($email); 

		$this->email->subject('Password Reset');
		$this->email->message("Your password has been reset. Please login using the password below.\n\n Password: $pass\n");	

		$this->email->send();
	}
	
	function _send_registration_email($user, $pass, $email) {
		$this->load->library('email');

		$this->email->from('no-reply@example.com', 'Site Admin');
		$this->email->to($email); 

		$this->email->subject('Registration Information');
		$this->email->message("Thank You for registering, your login credentials are below.\n\n Username: $user\n Password: $pass\n");	

		$this->email->send();
	}
	
	function _encode_pass($pass = null) {
		if (!$pass == null) {
			$pass = sha1($this->_salt.$pass);
			return $pass;
		}
	}
	
	function _gen_pass() {
		$length = mt_rand(5, 12);
	    $characters = '0123456789_abcdefghijklmnopqrstuvwxyz-';
	    $string = '';    
	    for ($p = 0; $p < $length; $p++) {
	        $string .= $characters[mt_rand(0, strlen($characters))];
	    }
	    return $string;
	}
}
?>