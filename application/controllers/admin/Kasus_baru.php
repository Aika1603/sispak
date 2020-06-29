<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasus_baru extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url_helper');
    $this->load->model('crud_model', 'cm');
    $this->validasi->cek_login_admin();
  }

	public function index()
	{
    $join = 'kasus.kode_hama = hama.kode_hama';
    $data['list_kasus'] = $this->cm->get_data_join('kasus', 'hama', $join , array('status' => 1), 'kasus.kode_hama ASC')->result();
    $this->layout->load('layout/v_admin_layout','admin/kasus_baru/v_index', $data, 'Kasus_baru');
	}



  public function hapus($id = NULL)
  {
    $delete= $this->cm->delete_data(array('id_data' => $id),'kasus');
    if($delete):
      $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
    else:
      $this->session->set_flashdata('error', 'Data Gagal Dihapus');
    endif;
    redirect('admin/kasus_baru');
  }


  public function detail($id = NULL)
  {
    $data['id'] = $id;
    $data['kasus'] = $this->cm->get_data('kasus',  array('id_data' => $id), '')->row();
    $kode_kasus = $data['kasus']->kode_kasus;
    $join = "basis_gejala.kode_gejala = gejala.kode_gejala";
    $data['basis_gejala'] = $this->cm->get_data_join('basis_gejala', 'gejala', $join, array('kode_kasus' => $kode_kasus), '')->result();

    $this->layout->load('layout/v_admin_layout','admin/kasus_baru/v_detail', $data, 'Kasus_baru');
  }

  public function detail_hapus($id = NULL, $id_data = NULL)
  {
    $delete= $this->cm->delete_data(array('id' => $id_data),'basis_gejala');
    if($delete):
      $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
    else:
      $this->session->set_flashdata('error', 'Data Gagal Dihapus');
    endif;
     redirect('admin/kasus_baru/detail/'.$id);
  }



}
