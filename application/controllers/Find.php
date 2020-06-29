<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Find extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url_helper');
    $this->load->model('crud_model', 'cm');
  }

	public function index()
	{
    $data['daun'] = $this->cm->get_data('gejala', array('daerah' => 'daun'))->result_array();
    $data['batang'] = $this->cm->get_data('gejala', array('daerah' => 'batang'))->result_array();
    $data['polong'] = $this->cm->get_data('gejala', array('daerah' => 'polong'))->result_array();
    $this->layout->load('layout/v_layout','v_find', $data, 'Find');
	}

  public function result()
  {
    $bobot_kasus_baru = 0;
    $kasus = $this->cm->get_data('kasus', array('status' => 0),'kode_kasus ASC')->result();
    if($this->input->post('gejala')):
      foreach ($this->input->post('gejala') as $row) {
        $row = $this->cm->get_data('gejala', array('kode_gejala' => $row))->row();
        $bobot_kasus_baru = $bobot_kasus_baru +  $row->bobot;
      }
       $bobot_kasus_baru;
      // echo "<hr/>";

      $bobot_kasus_lama = array();
      $i = 0;
      foreach ($kasus as $row_kasus) {
        $join = "basis_gejala.kode_gejala = gejala.kode_gejala";
        $basis_gejala = $this->cm->get_data_join('basis_gejala', 'gejala', $join, array('kode_kasus' => $row_kasus->kode_kasus))->result();
        foreach ($basis_gejala as $row_gejala) {
          //mengecek apakah gejala baru sama dengan kasus
          foreach ($this->input->post('gejala') as $row) {
            if($row_gejala->kode_gejala == $row){
              @$bobot_kasus_lama[$i] = $bobot_kasus_lama[$i] + $row_gejala->bobot;
            }else{
              @$bobot_kasus_lama[$i] = $bobot_kasus_lama[$i];
            }
          }
        };

         $bobot_kasus_lama[$i];
        // echo " - ";
        $count[$i] = $bobot_kasus_lama[$i]/$bobot_kasus_baru;

        $hasil[$i] = array(
          'order' => $i,
          'kode_kasus' => $row_kasus->kode_kasus,
          'nama_kasus' => $row_kasus->nama_kasus,
          'solusi' => $row_kasus->solusi,
          'deskripsi' => $row_kasus->deskripsi,
          'result' => substr($count[$i], 0, 4) * 100,
        );

        $i++;
      }
      $revise = 0;
      $data['i'] = $i;
      for ($a=0; $a < $i; $a++) {
         $data['hasil'][$a] = $hasil[$a];
         if($data['hasil'][$a]['result'] >= 70){
           $revise = $revise + 1;
         }
      }

      if($revise == 0){
        $kode_kasus = $this->cm->get_data_max('kasus')->row_array();
        $kode_kasus['max']++;
        $kode_max = $kode_kasus['max']++;
        $data_baru = array(
          'kode_kasus' => $kode_max,
          'nama_kasus' => 'Kasus Baru',
          'status' => 1,
        );
        $insert_kasus = $this->cm->input_data('kasus',$data_baru);
        foreach ($this->input->post('gejala') as $row) {
         $this->cm->input_data('basis_gejala', array('kode_kasus' => $kode_max, 'kode_gejala' => $row));
        }
      }

      // pengurutan array

      $this->layout->load('layout/v_layout','v_result', $data, 'Find');

    else:
      $this->session->set_flashdata('error', 'Silahkan Pilih Gejala Dengan Benar');
      redirect('find');
    endif;

  }


  public function solusi($id = NULL)
  {
    $join = 'kasus.kode_hama = hama.kode_hama';
    $data['kasus'] = $this->cm->get_data_join('kasus', 'hama', $join , array('kode_kasus' => $id), 'kasus.kode_hama ASC')->row_array();

    $this->layout->load('layout/v_layout','v_solusi', $data, 'Find');
  }

  public function cek()
  {
    $this->load->view('view2');
  }
}
