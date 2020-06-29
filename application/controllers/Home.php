<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url_helper');
  }

	public function index()
	{

    $this->load->view('layout/header');
    $this->load->view('home/v_index');
    $this->load->view('layout/footer');
	}


  public function view($page = 'v_index')
	{
    if ( ! file_exists(APPPATH.'views/home/'.$page.'.php'))
       {
               // Whoops, we don't have a page for that!
               show_404();
       }
    $data = "Ini adalah halaman $page";

    $this->load->view('layout/header');
    $this->load->view('home/'.$page);
    $this->load->view('layout/footer');
	}

}
