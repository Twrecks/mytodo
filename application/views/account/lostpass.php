<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<? $this->load->view('head')?>
	<title>Login</title>
</head>
<body>
	<div id="container">
		<? $this->load->view('header')?>
		<h1>Lost Password</h1>
		<div class="box">
			<p>If you have lost or forgotten your password, please enter your email below</p><br/>
			
			<?= form_open('account/reset'); ?>
			<p>
				<?= form_error('email');?>
				<?= form_label('Email:', 'email'); ?>
				<?= form_input('email', set_value('email'));?>
			</p>
			
			<p>
				<input type="reset" name="reset" value="Reset" />
				<input type="submit" name="submit" value="Submit" />
			</p>
		</div>
		<? $this->load->view('footer')?>
	</div>
</body>
</html>