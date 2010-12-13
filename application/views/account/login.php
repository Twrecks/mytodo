<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<? $this->load->view('head')?>
	<title>Login</title>
</head>
<body>
	<div id="container">
		<? $this->load->view('header')?>
		
		<h1>Account Login</h1>
		<?= $this->session->flashdata('msg'); ?>
		
		<div class="box">
			<?= form_open('account/login'); ?>
		
			<p><?= form_label('Username:', 'username'); ?></p>
			<p><?= form_error('username');?></p>
			<p><?= form_input('username', set_value('username'));?></p>
		
			<p><?= form_label('Password:', 'password'); ?></p>
			<p><?= form_error('password');?></p>
			<p><?= form_password('password', set_value('password'));?></p>
		
			<p><input type="submit" name="submit" value="Login" /></p>	
			<p>Lost password <?= anchor('account/reset', 'click here'); ?></p>
		</div>
		
		<? $this->load->view('footer')?>
	</div>
</body>
</html>