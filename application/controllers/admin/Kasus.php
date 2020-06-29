<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasus extends CI_Controller {

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
    $data['list_kasus'] = $this->cm->get_data_join('kasus', 'hama', $join , array('status' => 0), 'kasus.kode_hama ASC')->result();
    $this->layout->load('layout/v_admin_layout','admin/kasus/v_index', $data, 'Kasus');
	}

  public function tambah()
  {
    $data['hama'] = $this->cm->get_data('hama',  '', '')->result();
    $this->layout->load('layout/v_admin_layout','admin/kasus/v_tambah', $data, 'Kasus');
  }

  public function tambah_action()
  {
    $this->form_validation->set_rules('kode_kasus', 'Kode Kasus', 'required',
            array('required' => 'You must provide a %s.')
    );
    $this->form_validation->set_rules('nama_kasus', 'Nama Kasus', 'required',
            array('required' => 'You must provide a %s.')
    );
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required',
            array('required' => 'You must provide a %s.')
    );
    $this->form_validation->set_rules('solusi', 'Solusi', 'required',
            array('required' => 'You must provide a %s.')
    );
    $this->form_validation->set_rules('kode_hama', 'Kode Hama', 'required',
            array('required' => 'You must provide a %s.')
    );

    if ($this->form_validation->run())
     {
         $data = array(
           'kode_hama' => $this->input->post('kode_hama'),
           'kode_kasus' => $this->input->post('kode_kasus'),
           'nama_kasus' => $this->input->post('nama_kasus'),
           'deskripsi' => $this->input->post('deskripsi'),
           'solusi' => $this->input->post('solusi'),
         );
         $cek = $this->cm->get_data('kasus', array('kode_kasus' => $this->input->post('kode_kasus')))->num_rows();
         if($cek == 0){
           $insert = $this->cm->input_data('kasus',$data);
           if($insert):
             $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
             redirect('admin/kasus');
           else:
             $this->session->set_flashdata('error', 'Data Gagal Disimpan');
             redirect('admin/kasus');
           endif;
         }else{
           $this->session->set_flashdata('error', 'Kode Kasus Sudah Digunakan');
           redirect('admin/kasus');

         }
     }else{
       $this->tambah();

     }
  }

  public function edit($id = NULL)
  {
    $data['list'] = $this->cm->get_data('kasus',  array('id_data' => $id), '')->row();
    $data['hama'] = $this->cm->get_data('hama',  '', '')->result();

    $this->layout->load('layout/v_admin_layout','admin/kasus/v_edit', $data, 'Kasus');
  }

  public function edit_action()
  {
    //tidak menggunakan form_validation
    if ($this->input->post())
     {
         $data = array(
           'kode_hama' => $this->input->post('kode_hama'),
           'nama_kasus' => $this->input->post('nama_kasus'),
           'deskripsi' => $this->input->post('deskripsi'),
           'solusi' => $this->input->post('solusi'),
         );
         $cek = $this->cm->get_data('kasus', array('kode_kasus' => $this->input->post('kode_kasus')))->num_rows();
         if($cek != 0):
         $update = $this->cm->update_data(array('id_data' => $this->input->post('id_data')),$data, 'kasus');
         if($update):
           $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
           redirect('admin/kasus');
         else:
           $this->session->set_flashdata('error', 'Data Gagal Disimpan');
           redirect('admin/kasus');
         endif;
       else:
         $this->session->set_flashdata('error', 'Kode Kasus Tidak Ada');
         redirect('admin/kasus');
       endif;
     }else{
       $this->edit($this->input->post('id_data'));
     }
  }

  public function hapus($id = NULL)
  {
    $delete= $this->cm->delete_data(array('id_data' => $id),'kasus');
    if($delete):
      $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
    else:
      $this->session->set_flashdata('error', 'Data Gagal Dihapus');
    endif;
    redirect('admin/kasus');
  }


  public function detail($id = NULL)
  {
    $data['id'] = $id;
    $data['kasus'] = $this->cm->get_data('kasus',  array('id_data' => $id), '')->row();
    $kode_kasus = $data['kasus']->kode_kasus;
    $join = "basis_gejala.kode_gejala = gejala.kode_gejala";
    $data['basis_gejala'] = $this->cm->get_data_join('basis_gejala', 'gejala', $join, array('kode_kasus' => $kode_kasus), '')->result();

    $this->layout->load('layout/v_admin_layout','admin/kasus/v_detail', $data, 'Kasus');
  }


  public function detail_tambah($id = NULL)
  {
    $data['id'] = $id;
    $data['gejala'] = $this->cm->get_data('gejala',  '', '')->result();

    $data['kasus'] = $this->cm->get_data('kasus',  array('id_data' => $id), '')->row();

    $this->layout->load('layout/v_admin_layout','admin/kasus/detail/v_tambah', $data, 'Kasus');
  }

  public function detail_tambah_action($id = NULL)
  {
    $data['id'] = $id;

    $this->form_validation->set_rules('kode_gejala', 'Kode Gejala', 'required',
            array('required' => 'You must provide a %s.')
    );

    if ($this->form_validation->run())
     {
         $data = array(
           'kode_gejala' => $this->input->post('kode_gejala'),
           'kode_kasus' => $this->input->post('kode_kasus'),
         );
         $cek = $this->cm->get_data('basis_gejala', array('kode_kasus' => $this->input->post('kode_kasus'), 'kode_gejala' => $this->input->post('kode_gejala')))->num_rows();
         if($cek == 0){
           $insert = $this->cm->input_data('basis_gejala',$data);
           if($insert):
             $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
             redirect('admin/kasus/detail/'.$id);
           else:
             $this->session->set_flashdata('error', 'Data Gagal Disimpan');
             redirect('admin/kasus/detail/'.$id);
           endif;
         }else{
           $this->session->set_flashdata('error', 'Kode Gejala pada Kasus Sudah Digunakan');
           redirect('admin/kasus/detail/'.$id);

         }
     }else{
       $this->detail_tambah($id);

     }
  }

  public function detail_hapus($id = NULL, $id_data = NULL)
  {
    $delete= $this->cm->delete_data(array('id' => $id_data),'basis_gejala');
    if($delete):
      $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
    else:
      $this->session->set_flashdata('error', 'Data Gagal Dihapus');
    endif;
     redirect('admin/kasus/detail/'.$id);
  }


}
