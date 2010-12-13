<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>Error</title>
</head>
<body>
	<div id="container">
		<? $this->load->view('header')?>
		<h1>Error</h1>
		<div class="box">
			<p class="alert_error"><?= $error ;?></p>
		</div>
		<? $this->load->view('footer')?>
	</div>
</body>
</html>