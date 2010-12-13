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

		<div class="box">
			<?= form_open_multipart('task/add');?>
			
			
			<p><?= form_label('Title: ', 'title'); ?></p>
			<p><?= form_error('title'); ?></p>
			<p><?= form_input('title', set_value('title') );?></p>
			
			
			<p><?= form_label('Details: ', 'details'); ?></p>
			<p><?= form_error('details'); ?></p>
			<?php $textarea = array('name' => 'details','cols'=> '50', 'rows' => '10'); ?>
			<p><?= form_textarea($textarea, set_value('details') );?></p>
		
			<p><?= form_label('User: ', 'user_id'); ?></p>
			<p><?= form_error('user_id'); ?></p>
			<p><?= form_dropdown('user_id', $users); ?></p>
			
			<p><?= form_label('File: ', 'userfile'); ?></p>
			<p><?= form_upload('userfile');?></p>
			
			<p>
				<?= form_reset('reset', 'reset');?>  
				<?= form_submit('submit', 'submit' );?>	
			</p>		
			<?= form_close();?> 
		</div>
		<? $this->load->view('footer')?>
</body>
</html>