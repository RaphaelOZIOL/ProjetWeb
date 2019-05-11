<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator_model extends CI_Model {

    private $_table = "admin";

    function __construct() {
        $this->load->library('encrypt');
        $this->load->database();

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

    public function update_admin_user($id){
      $pwdCrypt= $this->encrypt->encode($this->input->post('password'));
      $data = array(
              'firstName'  => $this->input->post('firstName'),
              'lastName'  => $this->input->post('lastName'),
              'email' => $this->input->post('email'),
              'yearBirth' => $this->input->post('yearBirth'),
              'phoneNumber' => $this->input->post('phoneNumber'),
              'postalCode' => $this->input->post('postalCode'),
              'street'  => $this->input->post('street'),
              'password' => $this->pwdCrypt,
              'city' => $this->input->post('city'),
          );

          $this->db->where('idUser', $id);
          $result=$this->db->update('admin',$data);
          if(isset($result)){
            return $result;
          }
          return false;
    }

}
