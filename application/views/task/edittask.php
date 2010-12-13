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
			<? $hidden = array('id' => $this->uri->segment(3)); ?>
			<?= form_open('task/do_update','', $hidden);?>
			
			<p><?= form_label('Title: ', 'title'); ?></p>
			<p><?= form_error('title'); ?></p>
			<p><?= form_input('title',  $task->title);?></p>
			
			
			<p><?= form_label('Details: ', 'details'); ?></p>
			<p><?= form_error('details'); ?></p>
			<?php $textarea = array('name' => 'details','cols'=> '50', 'rows' => '10') ;?>
			<p><?= form_textarea($textarea, $task->details );?></p>
		
			<p><?= form_label('User: ', 'user_id'); ?></p>
			<p><?= form_dropdown('user_id', $users, $task->user_id); ?></p>
			
			<p>
				<?= form_reset('reset', 'reset');?>  
				<?= form_submit('submit', 'submit' );?>	
			</p>		
			<?= form_close();?> 
		</div>
		
		<div class="box">
			<h2>Upload and delete files</h2>
			<div>
				<?php if(count($files) >= 1) {
					foreach($files as $file) 
					{
						echo "<span class=\"file_wrap\"><a href=\"http://localhost/todo/uploads/$file->file_name\"><img src=\"http://localhost/todo/uploads/thumbs/$file->file_name\" /></a>\n";
						echo "<a href=\"http://localhost/todo/task/delete_file/$file->file_name\" onclick=\"return confirm('Are you sure you want to delete this file?');\"><img src=\"http://localhost/todo/images/delete-icn.png\" alt=\"delete\" title=\"delete\"/></a></span>\n";
					}
				}
				
				?>
				
			</div>
			<? $hidden = array('task_id' => $this->uri->segment(3)); ?>
			<?= form_open_multipart('task/upload','', $hidden);?>
			
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