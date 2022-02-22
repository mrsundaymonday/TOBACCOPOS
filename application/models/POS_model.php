<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

 class POS_model extends CI_Model {
    var $tbl_menu='tbl_menu';
    var $tbl_akses='tbl_akses';

   public function search_menu($search){
      $this->db->join('tbl_user','tbl_akses.id_user = tbl_user.id');
      $this->db->join('tbl_menu','tbl_menu.id_menu = tbl_akses.id_menu');
      $this->db->join('tbl_menu_katagori','tbl_menu_katagori.id_menu_katagori=tbl_menu.id_kategori');
      $this->db->like('tbl_menu.label_menu',$search);
      $this->db->limit(10);
      return $this->db->get($this->tbl_akses)->result();
    }

   public function getmenu_by_id($id){
      $this->db->where('id_menu',$id);
      return $this->db->get($this->tbl_menu)->row();
    }



 }
?>