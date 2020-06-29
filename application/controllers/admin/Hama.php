<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hama extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url_helper');
    $this->load->model('crud_model', 'cm');
    $this->validasi->cek_login_admin();
  }

	public function index()
	{
    $data['list'] = $this->cm->get_data('hama',  '', 'kode_hama ASC')->result();
    $this->layout->load('layout/v_admin_layout','admin/hama/v_index', $data, 'Hama');
	}

  public function tambah()
  {
    $this->layout->load('layout/v_admin_layout','admin/hama/v_tambah', '', 'Hama');
  }

  public function tambah_action()
  {
    //tidak menggunakan form_validation
    if ($this->input->post())
     {
         $data = array(
           'kode_hama' => $this->input->post('kode_hama'),
           'nama_hama' => $this->input->post('nama_hama'),
           'nama_latin' => $this->input->post('nama_latin'),
           'gambar_hama' => $this->input->post('gambar_hama'),
           'ordo' => $this->input->post('ordo'),
         );
         $cek = $this->cm->get_data('hama', array('kode_hama' => $this->input->post('kode_hama')))->num_rows();
         if($cek == 0):
           $insert = $this->cm->input_data('hama',$data);
           if($insert):
             $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
             redirect('admin/hama');
           else:
             $this->session->set_flashdata('error', 'Data Gagal Disimpan');
             redirect('admin/hama');
           endif;
         else:
           $this->session->set_flashdata('error', 'Kode Sudah Digunakan');
           redirect('admin/hama');
         endif;
     }else{
       $this->add();
     }
  }

  public function edit($id = NULL)
  {
    $data['list'] = $this->cm->get_data('hama',  array('kode_hama' => $id), '')->row();
    $this->layout->load('layout/v_admin_layout','admin/hama/v_edit', $data, 'Hama');
  }

  public function edit_action()
  {
    //tidak menggunakan form_validation
    if ($this->input->post())
     {
         $data = array(
           'nama_hama' => $this->input->post('nama_hama'),
           'nama_latin' => $this->input->post('nama_latin'),
           'gambar_hama' => $this->input->post('gambar_hama'),
           'ordo' => $this->input->post('ordo'),
         );
         $cek = $this->cm->get_data('hama', array('kode_hama' => $this->input->post('kode_hama')))->num_rows();
         if($cek != 0):
         $insert = $this->cm->update_data(array('kode_hama' => $this->input->post('kode_hama')), $data, 'hama');
         if($insert):
           $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
           redirect('admin/hama');
         else:
           $this->session->set_flashdata('error', 'Data Gagal Diupdate');
           redirect('admin/hama');
         endif;
       else:
         $this->session->set_flashdata('error', 'Kode Tidak Ada');
         redirect('admin/hama');
       endif;
     }else{
       $this->edit($this->input->post('kode_hama'));
     }
  }

  public function hapus($id = NULL)
  {
    $delete= $this->cm->delete_data(array('kode_hama' => $id),'hama');
    if($delete):
      $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
    else:
      $this->session->set_flashdata('error', 'Data Gagal Dihapus');
    endif;
    redirect('admin/hama');
  }
}
