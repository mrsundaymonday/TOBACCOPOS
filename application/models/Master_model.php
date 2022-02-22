<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

 class Master_model extends CI_Model {
    var $tbl_loading_in_lokasi='tbl_loading_in_lokasi';
    var $tbl_loading_out_lokasi='tbl_loading_out_lokasi';
    var $tbl_cc_email='tbl_cc_email';
    var $tbl_department='tbl_department';
    var $tbl_master_setting_approval='tbl_master_setting_approval';
    var $tbl_menu='tbl_menu';
    var $tbl_menu_katagori='tbl_menu_katagori';
    var $tbl_akses='tbl_akses';    
    var $tbl_user='tbl_user';


    public function get_master_settingapproval_by_id_secnot($id){
      $this->db->where('id_secnote',$id);
      $this->db->order_by('level','asc');
      return $this->db->get($this->tbl_master_setting_approval)->row();
    }

    public function get_master_settingapproval_by_collection($id,$level){
      $this->db->where('id_secnote',$id);
      $this->db->where('level',$level);
      $this->db->order_by('level','asc');
      return $this->db->get($this->tbl_master_setting_approval)->row();
    }


   public function getmenu($id_kategori){
      $this->db->where('tbl_akses.id_user',$this->session->userdata('id'));
      $this->db->where('tbl_menu.id_kategori',$id_kategori);
      $this->db->join('tbl_menu','tbl_menu.id_menu = tbl_akses.id_menu');
      $this->db->join('tbl_menu_katagori','tbl_menu_katagori.id_menu_katagori=tbl_menu.id_kategori');
      return $this->db->get($this->tbl_akses)->result();
   } 
   
   public function get_group_menu(){
      $this->db->where('tbl_akses.id_user',$this->session->userdata('id'));
      $this->db->join('tbl_menu','tbl_menu.id_menu = tbl_akses.id_menu');
      $this->db->join('tbl_menu_katagori','tbl_menu_katagori.id_menu_katagori=tbl_menu.id_kategori');
      $this->db->group_by('tbl_menu_katagori.nama_katagori');
      return $this->db->get($this->tbl_akses)->result();
   }
   
   public function get_all_akses(){
      $this->db->join('tbl_user','tbl_akses.id_user = tbl_user.id');
      $this->db->join('tbl_menu','tbl_menu.id_menu = tbl_akses.id_menu');
      $this->db->join('tbl_menu_katagori','tbl_menu_katagori.id_menu_katagori=tbl_menu.id_kategori');
      return $this->db->get($this->tbl_akses)->result();
    }
   public function get_all_in(){
      return $this->db->get($this->tbl_loading_in_lokasi)->result();
    }

   public function get_all_menu(){
      return $this->db->get($this->tbl_menu)->result();
    }

   public function get_all_menu_katagori(){
      return $this->db->get($this->tbl_menu_katagori)->result();
    }

   public function get_all_out(){
      return $this->db->get($this->tbl_loading_out_lokasi)->result();
    }

   public function get_all_cc(){
      return $this->db->get($this->tbl_cc_email)->result();
    }

   public function get_all_setapproval(){
      $this->db->select('tbl_master_setting_approval.*,tbl_department.id_dept,tbl_department.nama_dept,tbl_department.label_dept');
      $this->db->join('tbl_department','tbl_department.id_dept=tbl_master_setting_approval.kode_department');
      return $this->db->get($this->tbl_master_setting_approval)->result();
    }
    
    
   public function get_approver($step){
      $this->db->select('tbl_master_setting_approval.*,tbl_department.id_dept,tbl_department.nama_dept,tbl_department.label_dept');
      $this->db->join('tbl_user','tbl_user.dept=tbl_master_setting_approval.kode_department');
      $this->db->join('tbl_department','tbl_user.dept=tbl_department.id_dept');
      $this->db->where('tbl_user.dept',$this->session->userdata('kodedept'));
      $this->db->where('tbl_user.approver',1);
      $this->db->where('tbl_master_setting_approval.level',$step);
      return $this->db->get($this->tbl_master_setting_approval)->row();
    }

    public function get_approver_user(){     
      $this->db->join('tbl_department','tbl_user.dept=tbl_department.id_dept');
      $this->db->where('tbl_user.dept',$this->session->userdata('kodedept'));
      $this->db->where('tbl_user.approver',1);
      return $this->db->get($this->tbl_user)->row(); 
    }

    public function get_approver_user_collection(){     
      $this->db->join('tbl_department','tbl_user.dept=tbl_department.id_dept');
      $this->db->where('tbl_user.level','Finance');
      $this->db->where('tbl_user.approver',1);
      return $this->db->get($this->tbl_user)->row(); 
    }

    
   public function get_approver_collection($step){
      $this->db->select('tbl_master_setting_approval.*,tbl_department.id_dept,tbl_department.nama_dept,tbl_department.label_dept');
      $this->db->join('tbl_user','tbl_user.dept=tbl_master_setting_approval.kode_department');
      $this->db->join('tbl_department','tbl_user.dept=tbl_department.id_dept');
      $this->db->where('tbl_user.approver',1);
      $this->db->where('tbl_master_setting_approval.bagian_approve','Collection');
      $this->db->where('tbl_master_setting_approval.level',$step);
      return $this->db->get($this->tbl_master_setting_approval)->row();
    }


     
   
   public function get_all_dept(){
      return $this->db->get($this->tbl_department)->result();
    }

   public function get_all_cc_active(){
      $this->db->where('is_active','1');
      return $this->db->get($this->tbl_cc_email)->result();
    }
   public function get_all_cc_by_id($id){
      $this->db->where('id_cc',$id);
      return $this->db->get($this->tbl_cc_email)->row();
    }

 public function get_all_dept_by_id($id){
      $this->db->where('id_dept',$id);
      return $this->db->get($this->tbl_department)->row();
    }

 public function get_all_setapproval_by_id($id){
      $this->db->where('id',$id);
      return $this->db->get($this->tbl_master_setting_approval)->row();
    }


   public function get_loadingin_by_id($id){
      $this->db->where('id_loading_in',$id);
      return $this->db->get($this->tbl_loading_in_lokasi)->row();
    }

   public function get_loadingout_by_id($id){
      $this->db->where('id_loading_out',$id);
      return $this->db->get($this->tbl_loading_out_lokasi)->row();
    }
    

   public function add_loadingout($data){
      $this->db->insert($this->tbl_loading_out_lokasi, $data);
      return $this->db->insert_id();
     }
     
   public function add_loadingin($data){
      $this->db->insert($this->tbl_loading_in_lokasi, $data);
      return $this->db->insert_id();
     }
   public function add_cc($data){
      $this->db->insert($this->tbl_cc_email, $data);
      return $this->db->insert_id();
     }

   public function add_dept($data){
      $this->db->insert($this->tbl_department, $data);
      return $this->db->insert_id();
     }

   public function add_setapproval($data){
      $this->db->insert($this->tbl_master_setting_approval, $data);
      return $this->db->insert_id();
     }


   public function add_aksesmenu($data){
      $this->db->insert($this->tbl_akses, $data);
      return $this->db->insert_id();
     }

   public function setapproval_update($where, $data)
   {
      $this->db->update($this->tbl_master_setting_approval, $data, $where);
      return $this->db->affected_rows();
   }

   public function dept_update($where, $data)
   {
      $this->db->update($this->tbl_department, $data, $where);
      return $this->db->affected_rows();
   }
  public function cc_update($where, $data)
   {
      $this->db->update($this->tbl_cc_email, $data, $where);
      return $this->db->affected_rows();
   }

   public function loadingin_update($where, $data)
   {
      $this->db->update($this->tbl_loading_in_lokasi, $data, $where);
      return $this->db->affected_rows();
   }

   public function loadingout_update($where, $data)
   {
      $this->db->update($this->tbl_loading_out_lokasi, $data, $where);
      return $this->db->affected_rows();
   }

   public function delete_by_id($id){
      $this->db->where('id', $id);
      $this->db->delete($this->tbl_user);
   }

   public function delete_by_id_akses($id){
      $this->db->where('id_akses', $id);
      $this->db->delete($this->tbl_akses);
   }
   public function delete_by_id_setapproval($id){
      $this->db->where('id', $id);
      $this->db->delete($this->tbl_master_setting_approval);
   }
   public function delete_by_id_email_cc($id){
      $this->db->where('id_cc', $id);
      $this->db->delete($this->tbl_cc_email);
   }
   public function delete_loadingin_by_id($id){
      $this->db->where('id_loading_in', $id);
      $this->db->delete($this->tbl_loading_in_lokasi);
   }
   public function delete_loadingout_by_id($id){
      $this->db->where('id_loading_out', $id);
      $this->db->delete($this->tbl_loading_out_lokasi);
   }

   public function delete_dept_by_id($id){
      $this->db->where('id_dept', $id);
      $this->db->delete($this->tbl_department);
   }


 }
?>