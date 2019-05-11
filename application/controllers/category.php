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

}
