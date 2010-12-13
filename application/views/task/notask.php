<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<? $this->load->view('head')?>
	<title>Error</title>
</head>
<body>
	<div id="container">
		<? $this->load->view('header')?>
		<h1>Error</h1>
		<?= $this->session->flashdata('alert'); ?>
		<div class="alert_error alert"><?= $message; ?></div>	
		<div class="todo">
			<p>An error has occored</p>
		</div>
		
		<? $this->load->view('footer')?>
	</div>
</body>
</html>