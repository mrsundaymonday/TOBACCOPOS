<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Master extends CI_Controller {
	function __construct() {   	
   	parent::__construct();		

		$this->load->helper(array('url','form','file'));	
		$this->load->library(array('email','upload','form_validation','encryption','pagination','session'));
		$this->load->model(array('User_model','Master_model','M_barang'));
		//$this->load->library("excel");
		$this->isLoggedIn(FALSE);
		/*if ($this->session->userdata('password')==$this->config->item('passdef')) {
			redirect('setpass');
		}*/
	}

	public function index(){		
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

	   $data['content'] = 'admin/pos/adminmaster';
       $this->load->view('admin/include/template', $data);	
	}

	function _convert($data){
		$str2 = substr($data, 4);        
        $expl=explode('.', $str2);
        return $impl=implode('', $expl);
    }

	public function add_item(){
		$data = array(
					'barang_id'=>$this->input->post('barang_id'),
					'barang_nama'=>$this->input->post('barang_nama'),
					'barang_satuan'=>$this->input->post('satuan'),
					'barang_harpok'=>$this->_convert($this->input->post('harpok')),
					'barang_harjul'=>$this->_convert($this->input->post('harjul')),
					'barang_harjul_grosir'=>$this->_convert($this->input->post('harjulgross')),
					'barang_stok'=>$this->input->post('brg_stok'),
					'barang_min_stok'=>$this->input->post('brg_min_stok'),
					'barang_tgl_input'=>date('Y-m-d H:i:s'),
					'barang_tgl_last_update'=>date('Y-m-d H:i:s'),
					'barang_kategori_id'=>$this->input->post('katagori'),
					'created_by'=>$this->session->userdata('username')
			);
			$save= $this->M_barang->simpan_barang($data);
			if ($save) {
				echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
	}

	function isLoggedIn(){
		$isLoggedIn = $this->session->userdata('isLoggedIn');
		if(!isset($isLoggedIn) || $isLoggedIn != true)
		{
	   	$this->session->set_flashdata('error','You dont have permission to access previous page, please login here..');
			redirect('home');
		}		
	}

}
