<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/Administrator_controller.php');

class Searchproduct extends Administrator_controller
{

  public function __construct()
	{
		parent::__construct();
    $this->load->model('search_product_model');
    //$data['isAdmin']=parent::get_is_Admin();
    //$this->load->view('header',$data);
	}

  public function index()
	{

	}

  public function search($write){
      if($write == "all_product"){
        $data['product'] =$this->search_product_model->search_product("");
      }
      else{
        $data['product'] =$this->search_product_model->search_product(urldecode($write));
      }
        echo json_encode($data,JSON_UNESCAPED_SLASHES);
    }


}
