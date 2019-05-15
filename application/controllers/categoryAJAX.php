<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/ADMINISTRATOR_Controller.php');

class CategoryAJAX extends ADMINISTRATOR_Controller
{

  public function __construct()
	{
		parent::__construct();
    $this->load->model('category_model');
    $this->load->model('product_model');

	}

  public function list_category()
  {
    $category=array();
    $categorys[0]= $this->category_model->get_list_category();
    $categorys[1]=parent::get_is_Admin();
    echo json_encode($categorys,JSON_UNESCAPED_SLASHES);
  }

  public function info_category()
  {
    $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name()));
    if($mail==null){
      redirect(site_url("connexion"));
    }
    //$result;
    //if(isset($_GET['IdCat'])){intval($_GET['IdCat'])
      $result= $this->category_model->get_category_by_id(intval($_GET['IdCat']));
    //}

    echo json_encode($result,JSON_UNESCAPED_SLASHES);

  }

  public function get_product_by_category($idCat){
    $result= $this->category_model->get_product_by_category(intval($idCat));
    echo json_encode($result,JSON_UNESCAPED_SLASHES);
  }



}
