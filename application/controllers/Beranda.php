<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url_helper');
    $this->load->model('crud_model', 'cm');
  }

	public function index()
	{
    // $data['kasus'] = $this->cm->get_data('kasus',  '', '')->result();
    $join = 'kasus.kode_hama = hama.kode_hama';
    $data['kasus'] = $this->cm->get_data_join('kasus', 'hama', $join , '', 'kasus.kode_kasus ASC', 3)->result();

    $data['gejala'] = $this->cm->get_data('gejala',  '', '')->result();
    $data['hama'] = $this->cm->get_data('hama',  '', '')->result();
    $this->layout->load('layout/v_layout','v_index', $data, 'Beranda');
	}

}
