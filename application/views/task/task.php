<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<? $this->load->view('head')?>
	<title><?= $title ; ?></title>
</head>
<body>
	<div id="container">
		<? $this->load->view('header')?>
		<h1><?= $title; ?></h1>
		<?= $this->session->flashdata('alert'); ?>
		<div class="todo">
			<h2><?= $task->title; ?></h2>
			<p><?= $task->details; ?></p>
			<br/>
			<p><b>Posted For: </b><em><?= $task->name; ?></em></p>
			<br/>
			<? if(count($files) >= 1) :?>
				<h3>Files:</h3>
				<? foreach($files as $file) :?>
					<a href="http://localhost/todo/uploads/<?= $file->file_name; ?>"><img src="http://localhost/todo/uploads/thumbs/<?= $file->file_name; ?>" /></a>
				<? endforeach; ?>
			<? endif; ?>

			<div class="right">
				<?= anchor('task/update/'.$task->id, 'edit') ?> |
				<?= anchor('task/delete/'.$task->id, 'delete', array('onclick'=>"return confirm('Are you sure you want to delete this task?');")) ?>
			</div>
		</div>	
		<? $this->load->view('footer')?>
	</div>
</body>
</html>