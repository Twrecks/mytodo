<?php
class File_model extends Model {

	function File_model()
	{
		parent::Model();	
		$this->load->model('task_model');	
	}
	
	function upload_task_file($id)
	{
		$uploadconfig = array(
			'upload_path' => './uploads/',
			'allowed_types' => 'gif|jpg|png|pdf',
			'max_size' => '5048',
			'max_width' => '1024',
			'max_height' => '768',
			'remove_spaces' => TRUE
			);
		$this->load->library('upload', $uploadconfig);

		if (!$this->upload->do_upload())
		{
			
			$error =  $this->upload->display_errors();
			$this->session->set_flashdata('error', "<div class=\"alert_error alert\">".$error."</div>");
			redirect('file/add');
		}	
		else
		{
			$upload = $this->upload->data();			
			
			$imageconfig = array(
				'source_image' => $upload['full_path'],
				'new_image' => './uploads/thumbs/',
				'maintain_ration' => true,
				'width' => 150,
				'height' => 150
				);
			$this->load->library('image_lib', $imageconfig);
			$this->image_lib->resize();
			
			$data = array(
				'task_id' => $id,
				'file_name' => $upload['file_name'],
				'file_type' => $upload['file_type']
			);
			$this->db->insert('files', $data);
			return true;
		}
	}

}