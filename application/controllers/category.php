<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/ADMINISTRATOR_Controller.php');

class Category extends ADMINISTRATOR_Controller
{

  public function __construct()
	{
		parent::__construct();
    $this->load->model('category_model');
	}

  public function index()
	{
		$this->list_category();
	}

  public function list_category()
	{
    $category=array();
		$categorys[0]= $this->category_model->get_list_category();
    $categorys[1]=parent::get_is_Admin();
    echo json_encode($categorys,JSON_UNESCAPED_SLASHES);
	}

  public function create_category(){
    $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name()));
    if($mail==null){
      redirect(site_url("connexion"));
    }
    $result = $this->category_model->create_category();
    echo json_encode($result,JSON_UNESCAPED_SLASHES);
  }

  public function test1(){
    $data['isAdmin']=parent::get_is_Admin();
    $this->load->view('header',$data);
    $this->load->view('add_category_admin');
  }

}
