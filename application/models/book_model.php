<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book_model extends CI_Model
{
  private $_table = "book";

  public function construct()
  {
    parent::construct();
    $this->load->database();
  }
  /*htmlspecialchars($this->input->post('quantity')),
  'date'  => htmlspecialchars($this->input->post('date')),
  'comment' => htmlspecialchars($this->input->post('comment')),*/
  public function book_product($mail,$idProd){

        $data = array(
                'quantity'  => htmlspecialchars($_POST['quantityProduct']),
                'date'  => htmlspecialchars($_POST['date']),
                'comment' => htmlspecialchars($_POST['comment']),
                'IdProd' => $idProd,
                'email' => $mail
    );
        $result=$this->db->insert($this->_table,$data);
        return $result;
  }

  public function get_book_user($mail)
	{
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->join('product', 'book.IdProd = product.IdProd');
    $this->db->join('shopper', 'book.email = shopper.email');
    $this->db->where(array('book.email' => $mail));
    $query = $this->db->get()->result();
    return $query;
	}

  public function get_book_all_user()
	{
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->join('product', 'book.IdProd = product.IdProd');
    $this->db->join('shopper', 'book.email = shopper.email');
    $query = $this->db->get()->result();
    return $query;
	}

/*
  public function update_shopper_user($id){
        $pwdCrypt= $this->encrypt->encode(htmlspecialchars($_POST['newpass']));
        $data = array(
                'firstName'  => htmlspecialchars($_POST['firstName']),
                'lastName'  => htmlspecialchars($_POST['lastName']),
                'email' => htmlspecialchars($_POST['email']),
                'yearBirth' => htmlspecialchars($_POST['yearBirth']),
                'phoneNumber' => htmlspecialchars($_POST['phoneNumber']),
                'postalCode' => htmlspecialchars($_POST['postalCode']),
                'street'  => htmlspecialchars($_POST['street']),
                'password' => $pwdCrypt,
                'city' => htmlspecialchars($_POST['city']),
            );

            $this->db->where('idUser', $id);
            $result=$this->db->update('shopper',$data);
            if(isset($result)){
              return $result;
            }
            return false;
  }*/

}
