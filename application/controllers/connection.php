<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connection extends CI_Controller
{
  public function __construct()
	{
		parent::__construct();
    $this->load->model('connection_model');
	}

  public function index()
	{
    $this->load->view('header');
		$this->connect();
	}

  public function connect()
	{
    $this->load->view('register');
	}

/* ---------- Functions AJAX -----------*/
  public function registration(){
        $data= $this->connection_model->user_register();
        echo json_encode($data);
  }

}
