<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
  public function __construct()
	{
		parent::__construct();
    $this->load->model('shopper_model');
    $this->load->library('encrypt');

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

  /*public function encrypt($pwd){
      return $this->encrypt->encode($pwd);
  }*/

/* ---------- Functions AJAX -----------*/
  public function registration(){
        $pwdCrypt=$this->encrypt->encode(htmlspecialchars($this->input->post('password')));
        $data= $this->shopper_model->user_register($pwdCrypt);
        echo json_encode($data,JSON_UNESCAPED_SLASHES);
  }

}