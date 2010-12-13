<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<? $this->load->view('head')?>
	<title>Task added</title>
</head>
<body>
	<div id="container">
		<? $this->load->view('header')?>
		<h1>Task added</h1>
		<div class="todo">
			<p>Thank you, to do item successfully added.</p>
		</div>	
			<?= anchor('/', "View To do's"); ?>
	</div>
</body>
</html>