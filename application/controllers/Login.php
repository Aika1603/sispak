<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

	public function index()
	{
    if($this->session->userdata('username')) {
      if($this->session->userdata('akses') == 'user') {
        redirect('user');
      }else if($this->session->userdata('akses') == 'admin'){
        redirect('admin');
      }
    }
    $this->load->view('layout/header_panel');
    $this->load->view('v_login');
    $this->load->view('layout/footer_panel');
	}

  public function validasi()
  {
    $this->form_validation->set_rules('username', 'Username', 'required',
            array('required' => 'You must provide a %s.')
    );
    $this->form_validation->set_rules('password', 'Password', 'required',
            array('required' => 'You must provide a %s.')
    );

    if ($this->form_validation->run())
     {

       $cek = $this->validasi->login($this->input->post('username'), md5($this->input->post('password')));
       if($cek == 0){
         $this->session->set_flashdata('message', '<i class="fa fa-warning fa-fw"></i> Username atau Password Salah');
         redirect('login');
       }
     }else{
       $this->index();

     }
  }

  public function logout()
  {
    $this->validasi->logout();

  }
}
