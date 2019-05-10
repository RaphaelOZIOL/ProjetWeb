<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model
{
 public function construct()
  {
    parent::construct();
    $this->load->database();
  }

public function user_register(){
        $data = array(
                'firstName'  => $this->input->post('firstName'),
                'lastName'  => $this->input->post('lastName'),
                'email' => $this->input->post('email'),
                'yearBirth' => $this->input->post('yearBirth'),
                'phoneNumber' => $this->input->post('phoneNumber'),
                'postalCode' => $this->input->post('postalCode'),
                'street'  => $this->input->post('street'),
                'password' => $this->input->post('password'),
                'city' => $this->input->post('city'),
            );
        $result=$this->db->insert('user',$data);
        return $result;
}
}
