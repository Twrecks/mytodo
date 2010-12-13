<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<? $this->load->view('head')?>
	<title>Success</title>
</head>
<body>
	<div id="container">
		<? $this->load->view('header')?>
		<h1>Success </h1>
		<p class="alert_success"><?= $message ;?></p>
		<div class="box">
			You have successfully logged in 
		</div>
		<? $this->load->view('footer')?>
	</div>
</body>
</html>