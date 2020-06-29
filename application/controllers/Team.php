<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url_helper');
		$this->load->database();
  }

	public function index()
	{
    $data = "Put Data in here....";
    $this->layout->load('layout/v_layout','v_our_team', $data, 'Team');
	}

}
