<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
  public function __construct()
	{
		parent::__construct();
    $this->load->model('shopper_model');
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
        $data= $this->shopper_model->user_register();
        echo json_encode($data,JSON_UNESCAPED_SLASHES);
  }

}
