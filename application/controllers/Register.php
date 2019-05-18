<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Register extends CI_Controller
{
  public function __construct()
	{
		parent::__construct();
    $this->load->model('shopper_model');
    $this->load->library('form_validation');
    $this->load->library('encryption');

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

  /*public function encryption($pwd){
      return $this->encryption->encode($pwd);
  }*/

/* ---------- Functions AJAX -----------*/
  public function registration(){

        $this->form_validation->set_rules('firstName', 'Prénom', 'trim|htmlspecialchars|required|alpha');
                $this->form_validation->set_rules('lastName', 'Nom', 'trim|htmlspecialchars|required|alpha');
                $this->form_validation->set_rules('email', 'Email', 'trim|htmlspecialchars|required|valid_email|is_unique[shopper.email]|is_unique[admin.email]');
                $this->form_validation->set_rules('phoneNumber', 'Numéro de téléphone', 'required|htmlspecialchars|exact_length[10]|numeric');
                $this->form_validation->set_rules('yearBirth', 'Date de naissance', 'htmlspecialchars|required');
                $this->form_validation->set_rules('street', 'Adresse', 'htmlspecialchars|required|alpha_numeric_spaces');
                $this->form_validation->set_rules('password', 'Mot de passe', 'htmlspecialchars|required|alpha_numeric');
                $this->form_validation->set_rules('passwordConfirm', 'Confirmation du mot de passe', 'htmlspecialchars|required|alpha_numeric');
                $this->form_validation->set_rules('postalCode', 'Code postal', 'htmlspecialchars|required|exact_length[5]|numeric');
                $this->form_validation->set_rules('city', 'Ville', 'htmlspecialchars|required');

        if ($this->form_validation->run() == FALSE)
        {

          echo json_encode("false",JSON_UNESCAPED_SLASHES);

        }
        else{
          $_POST['firstName']= $this->security->xss_clean($_POST['firstName']);
          $_POST['lastName']= $this->security->xss_clean($_POST['lastName']);
          $_POST['email']= $this->security->xss_clean($_POST['email']);
          $_POST['phoneNumber']= $this->security->xss_clean($_POST['phoneNumber']);
          $_POST['yearBirth']= $this->security->xss_clean($_POST['yearBirth']);
          $_POST['street']= $this->security->xss_clean($_POST['street']);
          $_POST['password']= $this->security->xss_clean($_POST['password']);
          $_POST['passwordConfirm']= $this->security->xss_clean($_POST['passwordConfirm']);
          $_POST['postalCode']= $this->security->xss_clean($_POST['postalCode']);
          $_POST['city']= $this->security->xss_clean($_POST['city']);

          $pwdCrypt=$this->encryption->encrypt(htmlspecialchars($this->input->post('password')));
          $result= $this->shopper_model->user_register($pwdCrypt);
          echo json_encode("true",JSON_UNESCAPED_SLASHES);

        }

  }

}
