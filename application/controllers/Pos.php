<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class POS extends CI_Controller {
	function __construct() {   	
   		parent::__construct();		
		$this->load->helper(array('url','form','file'));	
		$this->load->library(array('email','upload','form_validation','encryption','pagination','session'));
		$this->load->model(array('User_model','Master_model','POS_model','M_barang','M_penjualan'));
		$this->isLoggedIn(FALSE);
	}

	public function index(){	
	   $data['menu'] = $this->Master_model->get_group_menu();
	   foreach ($data['menu'] as $value) {
	    	  $data['items'][$value->id_menu_katagori] = $this->Master_model->getmenu($value->id_menu_katagori);
	   }
/*	   print_r($this->db->last_query());
	   exit();*/
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

public function master(){		
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

public function psnsale(){		
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
	   $data['content'] = 'admin/pos/pesananpenjualan';
       $this->load->view('admin/include/template', $data);	
	}


	function get_barang(){
			$kobar=$this->input->post('kode_brg');
			$x['brg']=$this->M_barang->get_barang($kobar);
			$this->load->view('admin/pos/detail_barang_jual',$x);
	}

	function addtocart(){
		$kobar=$this->input->post('kode_brg');
		$produk=$this->M_barang->get_barang($kobar);
		$i=$produk->row_array();
		$data = array(
               'id'       => $i['barang_id'],
               'name'     => $i['barang_nama'],
               'satuan'   => $i['barang_satuan'],
               'harpok'   => $i['barang_harpok'],
               'price'    => str_replace(",", "", $this->input->post('harjul'))-$this->input->post('diskon'),
               'disc'     => $this->input->post('diskon'),
               'qty'      => $this->input->post('qty'),
               'amount'	  => str_replace(",", "", $this->input->post('harjul'))
            );
		if(!empty($this->cart->total_items())){
			foreach ($this->cart->contents() as $items){
				$id=$items['id'];
				$qtylama=$items['qty'];
				$rowid=$items['rowid'];
				$kobar=$this->input->post('kode_brg');
				$qty=$this->input->post('qty');
				if($id==$kobar){
					$up=array(
						'rowid'=> $rowid,
						'qty'=>$qtylama+$qty
						);
					$this->cart->update($up);
				}else{
					$this->cart->insert($data);
				}
			}
		}else{
			$this->cart->insert($data);
		}
		echo json_encode(true);

	}

	function removecart($rowid){
			$this->cart->update(array(
	               'rowid'      => $rowid,
	               'qty'     => 0
	            ));
			redirect('pos/psnsale');
	}


	function simpan_penjualan(){
		$total=$this->input->post('total');
		$jml_uang=str_replace(",", "", $this->input->post('jml_uang'));
		$kembalian=$jml_uang-$total;
		if(!empty($total) && !empty($jml_uang)){
			if($jml_uang < $total){
				echo $this->session->set_flashdata('msg','<label class="label label-danger">Jumlah Uang yang anda masukan Kurang</label>');
				redirect('pos/psnsale');
			}else{
				$nofak=$this->M_penjualan->get_nofak();
				$this->session->set_userdata('nofak',$nofak);
				$order_proses=$this->M_penjualan->simpan_penjualan($nofak,$total,$jml_uang,$kembalian);
				if($order_proses){
					$this->cart->destroy();					
					$this->session->unset_userdata('tglfak');
					$this->session->unset_userdata('suplier');
					$this->load->view('admin/pos/alertsukses');	
				}else{
					redirect('pos/psnsale');
				}
			}
			
		}else{
			echo $this->session->set_flashdata('msg','<label class="label label-danger">Penjualan Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
			redirect('pos/psnsale');
		}
	}

	
	function cetak_faktur(){
		$x['data']=$this->M_penjualan->cetak_faktur();
		$this->load->view('admin/pos/report/v_faktur',$x);
		//$this->session->unset_userdata('nofak');
	}

	function selectmenu($id){
		$data['query'] = $this->POS_model->getmenu_by_id($id);			
		echo json_encode($data);
	}

	function getmenu(){
    if (isset($_GET['term'])) {
	    $result = $this->POS_model->search_menu($_GET['term']); 
	    if (count($result) > 0) {
	      foreach ($result as $row)
	          $arr_result[] = array(
	                'label'         => $row->label_menu,
	                'description'   => $row->id_menu
	               );
	          echo json_encode($arr_result);
	     }
	 }  
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
