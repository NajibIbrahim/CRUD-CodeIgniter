<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mhs extends CI_Model {

	public function getMhs($table_name)
	{
		$get_mhs=$this->db->get($table_name);
		return $get_mhs->result_array();
	}
	public function tambahMhs($table_name, $data)
	{
		$tambah = $this->db->insert($table_name,$data);
		return $tambah;
	}	
	public function hapusMhs($table_name, $id)
	{
		$this->db->where('id_mhs',$id);
		$hapus=$this->db->delete($table_name);
		return $hapus;
	}
	public function dataEdit($table_name,$id)
	{
		$this->db->where('id_mhs',$id);
		$get_user=$this->db->get($table_name);
		return $get_user->row();
	}
	public function editMhs($table_name,$data,$id)
	{
		$this->db->where('id_mhs',$id);
		$edit=$this->db->update($table_name,$data);
		return $edit;
	}
}
