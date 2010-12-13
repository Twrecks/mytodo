<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<? $this->load->view('head')?>
	<title>Logout</title>
</head>
<body>
	<div id="container">
		<? $this->load->view('header')?>
		<h1>Logout</h1>
		<div class="box">
			<p>You are now logged out. You can <?= anchor('account/login','log back in');?>.</p>
		</div>
		<? $this->load->view('footer')?>	
	</div>
</body>
</html>