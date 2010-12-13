<div id="header">
	<?= anchor('task/add', 'Add a task'); ?> |
	<?= anchor('task/index', "View all tasks"); ?> |
	<?= anchor('account/dashboard', 'Dashboard'); ?> |
	
	<?php if($this->session->userdata('logged_in') == TRUE) {
		//echo "welcome ". $this->session->userdata('username')." ";
		echo anchor('account/logout', 'Logout');
	} else {
		echo anchor('account/login', 'Login') . " | ";
		echo anchor('account/register', 'Register');
	}

	?>
	
</div>
