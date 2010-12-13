<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<? $this->load->view('head')?>
	<title><?php echo $title ; ?></title>
</head>
<body>
	<?= $this->session->flashdata('msg'); ?>
	<div id="container">
		<? $this->load->view('header')?>
		<div id="main">
			<h1><?= $title ; ?></h1>
			<?= $this->session->flashdata('alert'); ?>
			
			<?php if(count($tasks) >= 1) :?>
			<?php foreach($tasks as $task) : ?>
				<div class="todo">
					<h2><?= anchor('task/view/'.$task->id.'/'.url_title($task->title, 'dash', TRUE), $task->title) ?></h2>
					<p><?= $task->details; ?></p>
					<br/>
					<p><b>Posted For: </b><em><?= $task->name; ?></em></p>
				</div>		
			<?php endforeach; ?>
			<?php else : ?>
				<div class="alert_info"><p>No tasks posted yet.</p></div>
			<?php endif; ?>
			<?= $this->pagination->create_links(); ?>
		</div>
		
		<? $this->load->view('footer')?>
	</div>
</body>
</html>