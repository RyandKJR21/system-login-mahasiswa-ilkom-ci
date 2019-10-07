<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjurusan_model extends CI_Model
{

	public function addJurusan()
	{
		$this->db->insert('penjurusan', ['kode_kelas' => $this->input->post('kode_kelas'),
											'nama_kelas' => $this->input->post('nama_kelas')
										]);
	}


	public function updateJurusan($id)
	{
		$kode_kelas = $this->input->post('kode_kelas', true);
		$nama_kelas = $this->input->post('nama_kelas', true);
		$this->db->where('id', $id)->update('penjurusan', ['kode_kelas' => $kode_kelas,
															'nama_kelas' => $nama_kelas
														]);
	}


	public function deleteJurusan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('penjurusan');
	}


	public function lihatJurusan($kelas)
	{	
		$sql = "SELECT *
					FROM mahasiswa 
					WHERE kelas='$kelas'
					";
                $query = $this->db->query($sql);
                $result = $query->result_array();
                return $result;
	}
}
?>
