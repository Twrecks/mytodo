<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<link rel="stylesheet" href="<?= base_url()?>css/style.css" type="text/css" charset="utf-8">
	<title>User Tasks</title>
</head>
<body>
	<div id="container">
		<? $this->load->view('header')?>
		<h1>User Tasks</h1>
			<?php if(count($tasks) >= 1) :?>
			<?php foreach($tasks as $task) : ?>
				<div class="box">
					<h2><?= anchor('task/view/'.$task->id, $task->title) ?></h2>
					<p><?= $task->details; ?></p>	
				</div>
			<?php endforeach; ?>
			<?= $this->pagination->create_links(); ?>
			
			<?php else : ?>
				<div class="alert_info"><p>There are no tasks assigned to you.</p></div>
			<?php endif; ?>
		<? $this->load->view('footer')?>
	</div>
</body>
</html>