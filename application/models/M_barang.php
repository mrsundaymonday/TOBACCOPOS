<?php
class M_barang extends CI_Model{

	var $tbl_barang = 'tbl_barang';
	var $tbl_satuan = 'tbl_satuan';
	var $tbl_kategori = 'tbl_kategori';

	function get_satuan(){
		return $this->db->get($this->tbl_satuan)->result();
	}
	function get_katagori(){
		return $this->db->get($this->tbl_kategori)->result();
	}

	function hapus_barang($kode){
		$hsl=$this->db->query("DELETE FROM tbl_barang where barang_id='$kode'");
		return $hsl;
	}

	function update_barang($where, $data){
      $this->db->update($this->tbl_barang, $data, $where);
      return $this->db->affected_rows();
   }

	function tampil_barang(){
		$this->db->join('tbl_kategori','tbl_kategori.kategori_id=tbl_barang.barang_kategori_id');
		return $this->db->get($this->tbl_barang)->result();
	}

/*	function simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("INSERT INTO tbl_barang (barang_id,barang_nama,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_kategori_id,barang_user_id) VALUES ('$kobar','$nabar','$satuan','$harpok','$harjul','$harjul_grosir','$stok','$min_stok','$kat','$user_id')");
		return $hsl;
	}*/

	function simpan_barang($data){
      $this->db->insert($this->tbl_barang, $data);
      return $this->db->insert_id();
     }
   


	function get_barang($kobar){
		$hsl=$this->db->query("SELECT * FROM tbl_barang where barang_id='$kobar'");
		return $hsl;
	}

	function get_kobar(){
		$q = $this->db->query("SELECT MAX(RIGHT(barang_id,6)) AS kd_max FROM tbl_barang");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "BR".$kd;
	}

}