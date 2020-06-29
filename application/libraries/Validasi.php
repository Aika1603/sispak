<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Validasi {

	// SET SUPER GLOBAL
  	var $CI = NULL;
  	public function __construct() {
  		$this->CI =& get_instance();
  	}

    function limit_words($string, $word_limit){
        $words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
    }

  	// Fungsi login
  	public function login($username, $password) {
      //ngambil data tahun aktif
      $query = $this->CI->db->get_where('user',array('username'=>$username, 'password'=>$password));
      $row_user = $query->row_array();
      $cek = $query->num_rows();
      if($cek > 0){
        if($row_user['akses'] == 'admin'){
          if($row_user['username'] == $username AND $row_user['password'] == $password)
          	{
              //menambah session_start
              $this->CI->session->set_userdata('id_login', uniqid(rand()));
              $this->CI->session->set_userdata('username', $username);
              $this->CI->session->set_userdata('name', $row_user['name']);
              $this->CI->session->set_userdata('akses', 'admin');
              $this->CI->session->set_userdata('email', $row_user['email']);
              redirect(site_url('admin'));
            }else {
              return 0;
            }
        }
      }else{
        return 0;
      }
      return 0;
  	}

  	// Proteksi halaman
  	public function cek_login_admin() {
      if($this->CI->session->userdata('username') != '') {
        if($this->CI->session->userdata('akses') != 'admin') {
          $this->CI->session->set_flashdata('message','Anda belum login sebagai Admin');
    			redirect(base_url('login'));
        }
  		}else {
        $this->CI->session->set_flashdata('message','Anda belum login');
  			redirect(base_url('login'));
      }

  	}

    public function cek_login_user() {
      if($this->CI->session->userdata('username') != '') {
        if($this->CI->session->userdata('akses') != 'user') {
          $this->CI->session->set_flashdata('error','Anda belum login sebagai User');
          redirect(base_url('login'));
        }
      }else {
        $this->CI->session->set_flashdata('error','Anda belum login');
        redirect(base_url('login'));
      }

    }

  	public function cek_login_for_ajax() {
  		if($this->CI->session->userdata('sesi_username') == '') {
  				$arr = array(
  					"Message" => "Access Denied - Silahkan login",
  				);
  				echo json_encode($arr);
  				exit();
  		}
  	}

  	// Fungsi logout
  	public function logout() {
      $this->CI->session->sess_destroy();
  		$this->CI->session->set_flashdata('message','Anda berhasil logout');
  		redirect('login');
  	}


}
