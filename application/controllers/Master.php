<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Master extends CI_Controller {
	function __construct() {   	
   	parent::__construct();		

		$this->load->helper(array('url','form','file'));	
		$this->load->library(array('email','upload','form_validation','encryption','pagination','session'));
		$this->load->model(array('User_model','Master_model'));
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

	
	public function user(){	
		$data['menu'] = $this->Master_model->get_group_menu();
	   	foreach ($data['menu'] as $value) {
	    	  $data['items'][$value->id_menu_katagori] = $this->Master_model->getmenu($value->id_menu_katagori);
	   	}
		$data['waiting'] = $this->Secnote_model->get_waiting($this->session->userdata('labeldept'));
   		$data['approved'] = $this->Secnote_model->get_approved($this->session->userdata('labeldept'));
		$data['dept'] = $this->Master_model->get_all_dept();
		$data['user'] = $this->User_model->get_all();
		$data['content'] = 'admin/master/user';
    	$this->load->view('admin/include/template', $data);	
	}
	
	public function akses(){	
		$data['menu'] = $this->Master_model->get_group_menu();
	   foreach ($data['menu'] as $value) {
	    	  $data['items'][$value->id_menu_katagori] = $this->Master_model->getmenu($value->id_menu_katagori);
	   }
		$data['waiting'] = $this->Secnote_model->get_waiting($this->session->userdata('labeldept'));
   		$data['approved'] = $this->Secnote_model->get_approved($this->session->userdata('labeldept'));
		$data['dept'] = $this->Master_model->get_all_dept();
		$data['user'] = $this->User_model->get_all();
		$data['datamenu'] = $this->Master_model->get_all_menu();
		$data['akses'] = $this->Master_model->get_all_akses();
		$data['content'] = 'admin/master/akses';
    	$this->load->view('admin/include/template', $data);	
	}
	

	
	public function dept(){
		$data['menu'] = $this->Master_model->get_group_menu();
	   	foreach ($data['menu'] as $value) {
	    	  $data['items'][$value->id_menu_katagori] = $this->Master_model->getmenu($value->id_menu_katagori);
	   	}	
		$data['waiting'] = $this->Secnote_model->get_waiting($this->session->userdata('labeldept'));
   		$data['approved'] = $this->Secnote_model->get_approved($this->session->userdata('labeldept'));
		$data['dept'] = $this->Master_model->get_all_dept();
		$data['content'] = 'admin/master/dept';
    	$this->load->view('admin/include/template', $data);	
	}

	public function cc(){
	   	$data['menu'] = $this->Master_model->get_group_menu();
	   	foreach ($data['menu'] as $value) {
	    	  $data['items'][$value->id_menu_katagori] = $this->Master_model->getmenu($value->id_menu_katagori);
	   	}				
		
		$data['waiting'] = $this->Secnote_model->get_waiting($this->session->userdata('labeldept'));
   		$data['approved'] = $this->Secnote_model->get_approved($this->session->userdata('labeldept'));
		$data['cc'] = $this->Master_model->get_all_cc();
		$data['content'] = 'admin/master/cc';
    	$this->load->view('admin/include/template', $data);	
	}

	public function setapproval(){
	   	$data['menu'] = $this->Master_model->get_group_menu();
	   	foreach ($data['menu'] as $value) {
	    	  $data['items'][$value->id_menu_katagori] = $this->Master_model->getmenu($value->id_menu_katagori);
	   	}				
		$data['waiting'] = $this->Secnote_model->get_waiting($this->session->userdata('labeldept'));
   		$data['approved'] = $this->Secnote_model->get_approved($this->session->userdata('labeldept'));
		$data['setapproval'] = $this->Master_model->get_all_setapproval();
		$data['dept'] = $this->Master_model->get_all_dept();
		$data['content'] = 'admin/master/setapproval';
    	$this->load->view('admin/include/template', $data);	
	}

	public function get_cc($id){
		$query = $this->Master_model->get_all_cc_by_id($id);
		echo json_encode($query);	
	}
	public function get_user($id){
		$query = $this->User_model->get_user_by_id($id);
		echo json_encode($query);	
	}


	public function get_dept($id){
		$query = $this->Master_model->get_all_dept_by_id($id);
		echo json_encode($query);	
	}


	public function get_setapproval($id){
		$query = $this->Master_model->get_all_setapproval_by_id($id);
		echo json_encode($query);	
	}


	public function get_loadingin($id){
		$query = $this->Master_model->get_loadingin_by_id($id);
		echo json_encode($query);	
	}


	public function get_loadingout($id){
		$query = $this->Master_model->get_loadingout_by_id($id);
		echo json_encode($query);	
	}

	public function loadingin(){
	   	$data['menu'] = $this->Master_model->get_group_menu();
	   	foreach ($data['menu'] as $value) {
	    	  $data['items'][$value->id_menu_katagori] = $this->Master_model->getmenu($value->id_menu_katagori);
	   	}		
		
		$data['waiting'] = $this->Secnote_model->get_waiting($this->session->userdata('labeldept'));
   		$data['approved'] = $this->Secnote_model->get_approved($this->session->userdata('labeldept'));
		$data['loadingin'] = $this->Master_model->get_all_in();
		//$data['loading_out'] = $this->Master_model->get_all_out();
		$data['content'] = 'admin/master/loading-in';
    	$this->load->view('admin/include/template', $data);	
	}

	public function loadingout(){
	   	$data['menu'] = $this->Master_model->get_group_menu();
	   	foreach ($data['menu'] as $value) {
	    	  $data['items'][$value->id_menu_katagori] = $this->Master_model->getmenu($value->id_menu_katagori);
	   	}	
		
		$data['waiting'] = $this->Secnote_model->get_waiting($this->session->userdata('labeldept'));
   		$data['approved'] = $this->Secnote_model->get_approved($this->session->userdata('labeldept'));
		$data['loadingout'] = $this->Master_model->get_all_out();
		$data['content'] = 'admin/master/loading-out';
    	$this->load->view('admin/include/template', $data);	
	}

	public function save_user(){
		$data = array(
					'fullname'=>$this->input->post('fullname'),
					'username'=>$this->input->post('username'),
					'email_user'=>$this->input->post('email'),
					'password'=>sha1($this->input->post('password').$this->config->item('binary_salt')),
					'gender'=>$this->input->post('gender'),
					'dept'=>$this->input->post('dept'),
					'level'=>$this->input->post('level'),
					'aktif'=>$this->input->post('aktif'),
					'approver'=>$this->input->post('approver'),
					'ttd'=>'',
					'ttd_name'=>$this->input->post('username'),
					'created_by'=>$this->session->userdata('username'),
					'created_date'=>date('Y-m-d H:i:s')
			);
			$save= $this->User_model->add_user($data);
			if ($save) {
				echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
	}

	public function changepass(){
		$data = array(
					'password'=>sha1($this->input->post('pass').$this->config->item('binary_salt')),
					'created_by'=>$this->session->userdata('username'),
					'created_date'=>date('Y-m-d H:i:s')
			);
			$save= $this->User_model->changepass(array('id'=>$this->session->userdata('id')),$data);
	/*		print_r($this->db->last_query());
			exit();*/
			if ($save) {
				echo json_encode(array("status" => TRUE));
				$this->session->set_flashdata('success', 'password berhasil diubah');
			}else{
				$this->session->set_flashdata('error', 'Oops password gagal diubah');
				echo json_encode(array("status" => FALSE));
			}
	}



	public function save_akses(){
		$save="";
		for ($i=0; $i < count($this->input->post('menu')) ; $i++) { 
				$data = array(
			    	'id_akses' =>'',
	 				'id_user'=>$this->input->post('user'),
					'id_menu' => $this->input->post('menu')[$i]
		    	);	
		$save = $this->Master_model->add_aksesmenu($data);
		}
		if ($save) {
				echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
	}

	public function save_loadingin(){
		$data = array(
					'nama_lokasi_loading_in'=>$this->input->post('lokasi_loading_in'),
					'created_by'=>$this->session->userdata('username'),
					'created_date'=>date('Y-m-d H:i:s')
			);
			$save= $this->Master_model->add_loadingin($data);
			if ($save) {
				echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
	}

	public function save_loadingout(){
		$data = array(
					'nama_lokasi_loading_out'=>$this->input->post('lokasi_loading_out'),
					'created_by'=>$this->session->userdata('username'),
					'created_date'=>date('Y-m-d H:i:s')
			);
			$save= $this->Master_model->add_loadingout($data);
			if ($save) {
				echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
	}

	public function save_cc(){
		$data = array(
					'email_cc'=>$this->input->post('email_cc'),
					'is_active'=>$this->input->post('is_active'),
					'created_by'=>$this->session->userdata('username'),
					'created_date'=>date('Y-m-d H:i:s')
			);
			$save= $this->Master_model->add_cc($data);
			if ($save) {
				echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
	}

	public function save_dept(){
		$data = array(
					'nama_dept'=>$this->input->post('nama_dept'),
					'label_dept'=>$this->input->post('label_dept'),
					'created_by'=>$this->session->userdata('username'),
					'created_date'=>date('Y-m-d H:i:s')
			);
			$save= $this->Master_model->add_dept($data);
			if ($save) {
				echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
	}

	public function save_setapproval(){
		$data = array(
					'level'=>$this->input->post('level'),
					'porsi'=>$this->input->post('porsi'),
					'bagian_approve'=>$this->input->post('bagian_approve'),
					'kode_department'=>$this->input->post('dept'),
					'email_recipient'=>$this->input->post('email')
			);
			$save= $this->Master_model->add_setapproval($data);
			if ($save) {
				echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
	}

	public function edit_setapproval($id){
		$data = array(
					'level'=>$this->input->post('level'),
					'porsi'=>$this->input->post('porsi'),
					'bagian_approve'=>$this->input->post('bagian_approve'),
					'kode_department'=>$this->input->post('dept'),
					'email_recipient'=>$this->input->post('email')
			);
		$save=$this->Master_model->setapproval_update(array('id' => $id), $data);
		if ($save) {
				echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
	}


	public function edit_cc($id){
		$data = array(
					'email_cc'=>$this->input->post('email_cc'),
					'is_active'=>$this->input->post('is_active')
				);
		$save=$this->Master_model->cc_update(array('id_cc' => $id), $data);
		if ($save) {
				echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
	}



		public function edit_dept($id){
		$data = array(
					'nama_dept'=>$this->input->post('nama_dept'),
					'label_dept'=>$this->input->post('label_dept')
				);
		$save=$this->Master_model->dept_update(array('id_dept' => $id), $data);
		if ($save) {
				echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
	}

	public function edit_loading_in($id){
		$data = array(
					'nama_lokasi_loading_in'=>$this->input->post('lokasi_loading_in')
				);
		$save=$this->Master_model->loadingin_update(array('id_loading_in' => $id), $data);
		if ($save) {
				echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
	}

	public function edit_loading_out($id){
		$data = array(
					'nama_lokasi_loading_out'=>$this->input->post('lokasi_loading_out')
				);
		$save=$this->Master_model->loadingout_update(array('id_loading_out' => $id), $data);
		if ($save) {
				echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
	}

	public function edit_user($id){
		$data = array(
					'fullname'=>$this->input->post('fullname'),
					'username'=>$this->input->post('username'),
					'email_user'=>$this->input->post('email'),
					'password'=>sha1($this->input->post('password').$this->config->item('binary_salt')),
					'gender'=>$this->input->post('gender'),
					'dept'=>$this->input->post('dept'),
					'level'=>$this->input->post('level'),
					'aktif'=>$this->input->post('aktif'),
					'approver'=>$this->input->post('approver')
				);
		$save=$this->User_model->user_update(array('id' => $id), $data);
		if ($save) {
				echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => FALSE));
			}
	}


	public function del_akses($id){
		$this->Master_model->delete_by_id_akses($id);
		echo json_encode(array("status" => TRUE));
	}
	public function del_setapproval($id){
		$this->Master_model->delete_by_id_setapproval($id);
		echo json_encode(array("status" => TRUE));
	}
	public function del_emailcc($id){
		$this->Master_model->delete_by_id_email_cc($id);
		echo json_encode(array("status" => TRUE));
	}
	public function del_dept($id){
		$this->Master_model->delete_dept_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	public function del_user($id){
		$this->User_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	public function del_loadingin($id){
		$this->Master_model->delete_loadingin_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	public function del_loadingout($id){
		$this->Master_model->delete_loadingout_by_id($id);
		echo json_encode(array("status" => TRUE));
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
