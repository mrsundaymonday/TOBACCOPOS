<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

 class User_model extends CI_Model {
    var $tbl_user='tbl_user';

    public function login($uname,$pass){
        $this->db->where('username', $uname);
        $this->db->where('password', $pass);
        $this->db->where('aktif', '1');
        return $this->db->get($this->tbl_user)->row();
    }

   public function get_all(){
      return $this->db->get($this->tbl_user)->result();
    }


   public function get_user_by_id($id){
      $this->db->where('tbl_user.id',$id);
      return $this->db->get($this->tbl_user)->row();
    }

    

   public function user_update($where, $data)
   {
      $this->db->update($this->tbl_user, $data, $where);
      return $this->db->affected_rows();
   }
   public function add_user($data){
      $this->db->insert($this->tbl_user, $data);
      return $this->db->insert_id();
     }

   public function delete_by_id($id){
      $this->db->where('id', $id);
      $this->db->delete($this->tbl_user);
   }

   public function getsecnot_approver($dept){
      $this->db->where('tbl_department.label_dept',$dept);
      $this->db->where('approver','1');
      $this->db->join('tbl_department','tbl_department.id_dept=tbl_user.dept');
      return $this->db->get($this->tbl_user)->row();
   }
   public function getsecnot_approver_tenant($dept){
      $this->db->where('id_dept',$dept);
      $this->db->where('approver','1');
      $this->db->join('tbl_department','tbl_department.id_dept=tbl_user.dept');
      return $this->db->get($this->tbl_user)->row();
   }

   public function changepass($where, $data){
      $this->db->update($this->tbl_user, $data, $where);
      return $this->db->affected_rows();
   }


   public function get_depthead_approval(){
      $this->db->where('tbl_master_setting_approval.level',1);
      $this->db->where('tbl_master_setting_approval.kode_department',$this->session->userdata('kodedept'));
      return $this->db->get('tbl_master_setting_approval')->row();
   }

   public function get_collection_approval(){
      $this->db->where('tbl_master_setting_approval.level',2);
      $this->db->where('tbl_master_setting_approval.kode_department',$this->session->userdata('kodedept'));
      return $this->db->get('tbl_master_setting_approval')->row();
   }

   
   function getsecnot_approver_collection($level,$id){
      $this->db->where('tbl_master_setting_approval.level',$level);
      $this->db->where('tbl_master_setting_approval.id_secnote',$id);
      $this->db->join('tbl_user','tbl_master_setting_approval.approved_by=tbl_user.fullname');
      return $this->db->get('tbl_master_setting_approval')->row();
   }



 }
?>