<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shopper_model extends CI_Model
{
  private $_table = "shopper";

  public function construct()
  {
    parent::construct();
    $this->load->database();
  }

  public function user_register($pwd){

        $data = array(
                'firstName'  => htmlspecialchars($this->input->post('firstName')),
                'lastName'  => htmlspecialchars($this->input->post('lastName')),
                'email' => htmlspecialchars($this->input->post('email')),
                'yearBirth' => htmlspecialchars($this->input->post('yearBirth')),
                'phoneNumber' => htmlspecialchars($this->input->post('phoneNumber')),
                'postalCode' => htmlspecialchars($this->input->post('postalCode')),
                'street'  => htmlspecialchars($this->input->post('street')),
                'password' => $pwd,
                'city' => htmlspecialchars($this->input->post('city'))
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


      public function update_shopper_user($mail){
        $pwdCrypt= $this->encrypt->encode(htmlspecialchars($_POST['newpass']));
        $data = array(
                'firstName'  => htmlspecialchars($_POST['firstName']),
                'lastName'  => htmlspecialchars($_POST['lastName']),
                'yearBirth' => htmlspecialchars($_POST['yearBirth']),
                'phoneNumber' => htmlspecialchars($_POST['phoneNumber']),
                'postalCode' => htmlspecialchars($_POST['postalCode']),
                'street'  => htmlspecialchars($_POST['street']),
                'password' => $pwdCrypt,
                'city' => htmlspecialchars($_POST['city']),
            );

            $this->db->where('email', $mail);
            $result=$this->db->update('shopper',$data);
            if(isset($result)){
              return $result;
            }
            return false;
      }

}
