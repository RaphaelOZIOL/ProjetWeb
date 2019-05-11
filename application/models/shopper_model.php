<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shopper_model extends CI_Model
{
  private $_table = "shopper";

  public function construct()
  {
    parent::construct();
    $this->load->database();
    $this->load->library('encrypt');

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
        $result=$this->db->insert('shopper',$data);
        return $result;
      }

      public function validate($mail, $password) {
          if (($passwd_crypt = $this->_getUser($mail)) !== FALSE)
              return (bool) ($password == $passwd_crypt);
          return false;
      }

      private function _getUser($mail) {
          $user = $this->db->select(array('email', 'password'))->get_where($this->_table, array('email' => $mail))->row();
          if (isset($user->password))
              return $this->encrypt->decode($user->password);
          return false;
      }

      public function _getUser_info($mail) {
          $user = $this->db->select('*')->get_where($this->_table, array('email' => $mail))->row();
          if (isset($user))
              return $user;
          return false;
      }

}
