<?php

class Transaksi_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function tambah_transaksi($data){

		$this->db->insert('transaksi', $data);
		return $this ->db->affected_rows();
	}
	public function lihat_transaksi(){

		$this->db->select('*');
		$this ->db->from('transaksi');
		$query = $this->db->get();
		return $query->result_array();
}
public function lihat_satutransaksi($code){

$this->db->select('*');
		$this ->db->from('transaksi');
		$this ->db->where('id_transaksi',$code);
		$query = $this->db->get();
		return $query->row_array();	
	}
	public function edit_transaksi($data,$id){
$this ->db->where('id_transaksi',$id);
$this ->db->update('transaksi',$data);
}
	public function delete_transaksi($id){
$this ->db->where('id_transaksi',$id);
$this ->db->delete('transaksi');
}

}
