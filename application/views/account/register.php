<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<? $this->load->view('head')?>
	<title>Register for an account</title>
</head>
<body>
	<div id="container">
		<? $this->load->view('header')?>
		<h1>Register</h1>
		<div class="box">
			<?= form_open('account/register'); ?>
		
			<p><?= form_label('Name:', 'name'); ?></p>
			<p><?= form_error('name');?></p>
			<p><?= form_input('name', set_value('name'));?></p>
		
			<p><?= form_label('Email:', 'email'); ?></p>
			<p><?= form_error('email');?></p>
			<p><?= form_input('email', set_value('email'));?></p>
		
			<p><?= form_label('Username:', 'username'); ?></p>
			<p><?= form_error('username');?></p>
			<p><?= form_input('username', set_value('username'));?></p>
		
			<p><?= form_label('Password:', 'password'); ?></p>
			<p><?= form_error('password');?></p>
			<p><?= form_password('password');?></p>
		
			<p><?= form_label('Password Confirmation:', 'password_conf'); ?></p>
			<p><?= form_error('password_conf');?></p>
			<p><?= form_password('password_conf');?></p>
		
			<input type="reset" name="reset" value="Reset Form" />
			<input type="submit" name="submit" value="Register" />
		</div>
		<? $this->load->view('footer')?>
	</div>
</body>
</html>