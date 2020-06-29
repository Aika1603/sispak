<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasus extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url_helper');
    $this->load->model('crud_model', 'cm');
  }

	public function index()
	{
    $join = 'kasus.kode_hama = hama.kode_hama';
    $data['kasus'] = $this->cm->get_data_join('kasus', 'hama', $join , array('kasus.status' => 0), 'kasus.kode_hama ASC')->result();

    $this->layout->load('layout/v_layout','v_kasus', $data, 'Kasus');
	}



}
