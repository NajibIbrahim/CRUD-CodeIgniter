<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->data['tampil']=$this->m_mhs->getMhs('tb_mahasiswa');
		$this->load->view('welcome_message',$this->data);
	}
	public function form_input()
	{
		$this->load->view('form-input');
	}
	public function insert()
	{
		$nama=$_POST['nama'];
		$nim=$_POST['nim'];
		$jurusan=$_POST['jurusan'];
		$angkatan=$_POST['angkatan'];
		$data = array('nama' => $nama, 'nim' => $nim,'jurusan' => $jurusan,'angkatan' => $angkatan,);
		$tambah = $this->m_mhs->tambahMhs('tb_mahasiswa',$data);
		if ($tambah>0) {
			redirect('welcome/index');
		}
		else{
			echo "Gagal disimpan";
		}
	}
	public function delete($id)
	{
		$hapus=$this->m_mhs->hapusMhs('tb_mahasiswa',$id);
		if ($hapus>0) {
			redirect('welcome/index');
		}
		else
		{
			echo "Gagal dihapus";
		}
	}
	public function form_edit($id)
	{
		$this->data['dataEdit'] = $this->m_mhs->dataEdit('tb_mahasiswa',$id);
		$this->load->view('form-edit',$this->data);
	}
	public function update($id)
	{
		$nama=$_POST['nama'];
		$nim=$_POST['nim'];
		$jurusan=$_POST['jurusan'];
		$angkatan=$_POST['angkatan'];
		$data = array('nama' => $nama, 'nim' => $nim,'jurusan' => $jurusan,'angkatan' => $angkatan,);
		$edit = $this->m_mhs->editMhs('tb_mahasiswa',$data,$id);
		// echo $this->db->last_query();
		if ($edit>0) {
			redirect('welcome/index');
		}
		else{
			echo "Gagal disimpan";
		}
	}
}
