<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<link rel="stylesheet" href="<?= base_url()?>css/style.css" type="text/css" charset="utf-8">
	<title>Login or Register</title>
</head>
<body>
	<div id="container">
		<? $this->load->view('header')?>
		<h1>Unauthorized</h1>
		<div class="box">
			<p>This page requires authorization to continue, please
				<?= anchor('account/login', 'Login') ;?> or 
				<?= anchor('account/register', 'Register') ;?>
			</p>
		</div>
		<? $this->load->view('footer')?>
	</div>
</body>
</html>
