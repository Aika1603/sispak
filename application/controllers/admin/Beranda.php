<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url_helper');
    $this->load->model('crud_model', 'cm');
    $this->validasi->cek_login_admin();
  }

	public function index()
	{
    $data['kasus'] = $this->cm->get_data('kasus',  array('status' => 0), '')->num_rows();
    $data['new_kasus'] = $this->cm->get_data('kasus',  array('status' => 1), '')->num_rows();
    $data['gejala'] = $this->cm->get_data('gejala',  '', '')->num_rows();
    $data['hama'] = $this->cm->get_data('hama',  '', '')->num_rows();
    $this->layout->load('layout/v_admin_layout','admin/v_index', $data, 'Beranda');
	}

}
