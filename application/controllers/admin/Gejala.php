<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url_helper');
    $this->load->model('crud_model', 'cm');
    $this->validasi->cek_login_admin();
  }

	public function index()
	{
    $data['list'] = $this->cm->get_data('gejala',  '', 'daerah ASC')->result();
    $this->layout->load('layout/v_admin_layout','admin/gejala/v_index', $data, 'Gejala');
	}

  public function tambah()
  {
    $this->layout->load('layout/v_admin_layout','admin/gejala/v_tambah', '', 'Gejala');
  }

  public function tambah_action()
  {
    //tidak menggunakan form_validation
    if ($this->input->post())
     {
         $data = array(
           'kode_gejala' => $this->input->post('kode_gejala'),
           'nama_gejala' => $this->input->post('nama_gejala'),
           'daerah' => $this->input->post('daerah'),
           'bobot' => $this->input->post('bobot'),
         );
         $cek = $this->cm->get_data('gejala', array('kode_gejala' => $this->input->post('kode_gejala')))->num_rows();
         if($cek == 0):
           $insert = $this->cm->input_data('gejala',$data);
           if($insert):
             $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
             redirect('admin/gejala');
           else:
             $this->session->set_flashdata('error', 'Data Gagal Disimpan');
             redirect('admin/gejala');
           endif;
         else:
           $this->session->set_flashdata('error', 'Kode Sudah Digunakan');
           redirect('admin/gejala');
         endif;
     }else{
       $this->add();
     }
  }

  public function edit($id = NULL)
  {
    $data['list'] = $this->cm->get_data('gejala',  array('kode_gejala' => $id), '')->row();
    $this->layout->load('layout/v_admin_layout','admin/gejala/v_edit', $data, 'Gejala');
  }

  public function edit_action()
  {
    //tidak menggunakan form_validation
    if ($this->input->post())
     {
         $data = array(
           'nama_gejala' => $this->input->post('nama_gejala'),
           'daerah' => $this->input->post('daerah'),
           'bobot' => $this->input->post('bobot'),
         );
         $cek = $this->cm->get_data('gejala', array('kode_gejala' => $this->input->post('kode_gejala')))->num_rows();
         if($cek != 0):
         $insert = $this->cm->update_data(array('kode_gejala' => $this->input->post('kode_gejala')),$data, 'gejala');
         if($insert):
           $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
           redirect('admin/gejala');
         else:
           $this->session->set_flashdata('error', 'Data Gagal Disimpan');
           redirect('admin/gejala');
         endif;
       else:
         $this->session->set_flashdata('error', 'Kode Tidak Ada');
         redirect('admin/gejala');
       endif;
     }else{
       $this->edit($this->input->post('kode_gejala'));
     }
  }

  public function hapus($id = NULL)
  {
    $delete= $this->cm->delete_data(array('kode_gejala' => $id),'gejala');
    if($delete):
      $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
    else:
      $this->session->set_flashdata('error', 'Data Gagal Dihapus');
    endif;
    redirect('admin/gejala');
  }

}
