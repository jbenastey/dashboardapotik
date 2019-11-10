<?php

class Obat_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function tambah_obat($data){

		$this->db->insert('obat', $data);
		return $this ->db->affected_rows();
	}
	public function lihat_obat(){

		$this->db->select('*');
		$this ->db->from('obat');
		$query = $this->db->get();
		return $query->result_array();
}
public function lihat_satuobat($code){

$this->db->select('*');
		$this ->db->from('obat');
		$this ->db->where('kode_obat',$code);
		$query = $this->db->get();
		return $query->row_array();	
	}
	public function edit_obat($data,$id){
$this ->db->where('kode_obat',$id);
$this ->db->update('obat',$data);
}
	public function delete_obat($id){
$this ->db->where('kode_obat',$id);
$this ->db->delete('obat');
}

}
