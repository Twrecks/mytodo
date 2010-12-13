<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<? $this->load->view('head')?>
	<title>Add files</title>
</head>
<body>
	<div id="container">
		<? $this->load->view('header')?>
		
		
		
		<h1>Add files</h1>

		<div class="box">
			<?= $this->session->flashdata('error'); ?>
			
			<?= form_open_multipart('file/add');?>
			<p><?= form_label('Task: ', 'task'); ?></p>
			<p><?= form_error('task'); ?></p>
			<p><?= form_dropdown('task', $tasks, set_value('task')); ?></p>
			
			<p><?= form_label('File: ', 'userfile'); ?></p>
			<p><?= form_upload('userfile');?></p>
			<p>
				<?= form_reset('reset', 'reset');?>  
				<?= form_submit('upload', 'upload' );?>	
			</p>		
			<?= form_close();?>

		</div>
		
		<? $this->load->view('footer')?>
</body>
</html>