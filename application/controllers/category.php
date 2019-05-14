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

  public function create_category(){
    $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name()));
    if($mail==null){
      redirect(site_url("connexion"));
    }
    $result = $this->category_model->create_category();
    echo json_encode($result,JSON_UNESCAPED_SLASHES);
  }

  public function update_category(){

    $data['isAdmin']=parent::get_is_Admin();

    if($data['isAdmin']==2){

      if (htmlspecialchars($_POST['nameCat'])!=null && htmlspecialchars($_FILES['srcImg'])==null){
        $result[0]= $this->category_model->update_category_only_name($_POST['IdCat']);
        $this->load->view('success', $data);

      }

        else if(htmlspecialchars($_POST['nameCat'])!=null ){
          $result[0]= $this->category_model->update_category($_POST['IdCat']);

          $config['upload_path']          = './assets/images/category/';
          $config['allowed_types']        = 'gif|jpg|png';
          $config['max_size']             = 100000;
          $config['max_width']            = 20000;
          $config['max_height']           = 20000;
          $config['remove_spaces']        = TRUE;
          $config['detect_mime']          = TRUE;
          $config['mod_mime_fix']         = TRUE;
          $config['file_name']         = $_POST['IdCat'];
          $config['overwrite']         = TRUE;
          


          $this->load->library('upload', $config);

          if ( ! $this->upload->do_upload('srcImg'))
          {
                  $error = array('error' => $this->upload->display_errors());
                  $this->load->view('product', $data);
          }
          else
          {
                  $data1 = array('upload_data' => $this->upload->data());
                  $this->load->view('product', $data);
          }
        }



        //echo json_encode($result,JSON_UNESCAPED_SLASHES);
   }

}




  public function do_upload_category()
        {
                $config['upload_path']          = './assets/images/category/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['remove_spaces']        = TRUE;
                $config['detect_mime']          = TRUE;
                $config['mod_mime_fix']         = TRUE;;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('srcImg'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        return true;
                        //$this->load->view('connexion', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        return false;
                      //  $this->load->view('success', $data);
                }
        }

  public function test1(){
    $data['isAdmin']=parent::get_is_Admin();
    $this->load->view('header',$data);
    $this->load->view('add_category_admin');
  }

}
