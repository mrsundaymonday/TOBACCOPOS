<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Main extends CI_Controller {
	function __construct() {   	
   		parent::__construct();		
		$this->load->helper(array('url','form','file'));	
		$this->load->library(array('email','upload','form_validation','encryption','pagination','session'));
		$this->load->model(array('User_model','Master_model'));
		$this->isLoggedIn(FALSE);
	}

	public function index(){	
	   $data['menu'] = $this->Master_model->get_group_menu();
	   foreach ($data['menu'] as $value) {
	    	  $data['items'][$value->id_menu_katagori] = $this->Master_model->getmenu($value->id_menu_katagori);
	   }
	   $data['waiting'] = "31";
   	   $data['approved'] = "33";
   	   $data['in'] = "2";
   	   $data['out'] = "3000000";
	   $data['content'] = 'admin/adminarea';
       $this->load->view('admin/include/template', $data);	
	}

	public function syspos(){	
	   $data['menu'] = $this->Master_model->get_group_menu();
	   foreach ($data['menu'] as $value) {
	    	  $data['items'][$value->id_menu_katagori] = $this->Master_model->getmenu($value->id_menu_katagori);
	   }
	   $data['waiting'] = "1";
   	   $data['approved'] = "2";
   	   $data['in'] = "2";
   	   $data['out'] = "3";
	   $data['waitingcollection'] = "12";
   	   $data['approvedcollection'] = "2";
  	   $data['rejectedcollection'] = "2";
	   $data['content'] = 'admin/pos/adminpos';
       $this->load->view('admin/include/template', $data);	
	}



	public function isLoggedIn(){
		$isLoggedIn = $this->session->userdata('isLoggedIn');
		if(!isset($isLoggedIn) || $isLoggedIn != true)
		{
	   		$this->session->set_flashdata('error','You dont have permission to access previous page, please login here..');
			redirect('home');
		}		
	}

}
