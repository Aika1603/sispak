<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url_helper');
    $this->load->model('crud_model', 'cm');
    $this->validasi->cek_login_admin();
  }

  public function upload(){
    // $this->login_simak->cek_login_mahasiswa();

  	$name      = null;
  	$error     = 'No file uploaded.';
  	$status    = 0;
  	if(isset($_FILES['file']['tmp_name']))
  	{
  					$file_ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
  					$config['upload_path']          = 'assets/img/';
  					$config['max_size']     				= '1024'; //max 1 mb
  					$config['allowed_types']        = 'jpg|bmp|png|gif|jpeg';
  					// $config['file_name']			=  date('Y-m-d-H-i-s').'.'.$file_ext;
  					$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
  					$config['overwrite']			= true;

  					$this->load->library('upload', $config);

  					if($this->upload->do_upload('file'))
  					{
  						$data = $this->upload->data();
  						$name =  $data['file_name'];
  						$error = 0;
  						$status= 1;

  						//Compress Image
  						// $config['image_library']='gd2';
  						// $config['source_image']='./assets/img/'.$data['file_name'];
  						// $config['create_thumb']= FALSE;
  						// $config['maintain_ratio']= FALSE;
  						// $config['quality']= '100%';
  						// $config['width']= 180;
  						// $config['height']= 270;
  						// $config['new_image']= './assets/img/'.$data['file_name'];
  						// $this->load->library('image_lib', $config);
  						// $this->image_lib->resize();
  						//lakukan sesuatu jika berhasil
  						;
  					}
  					else
  					{
  						$error = $this->filter($this->upload->display_errors());
  						$status= 0;
  					}
  	}
  	echo json_encode(array(
  		'name'  => $name,
  		'error' => $error,
  		'status' => $status,
  	));
  }
}
