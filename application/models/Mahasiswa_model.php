<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

	public function addMahasiswa()
	{
		$image = $this->upload->data('file_name');
		$this->db->insert('mahasiswa', ['nama' => $this->input->post('nama'),
										'nim' => $this->input->post('nim'),
										'ukt' => $this->input->post('ukt'),
										'email' => $this->input->post('email'),
										'angkatan' => $this->input->post('angkatan'),
										'alamat' => $this->input->post('alamat'),
										'kelas' => $this->input->post('kelas'),
										'image' => $image
						]);
	}


	public function deleteMahasiswa($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('mahasiswa');
	}


	public function updateMahasiswa($id)
	{
		$nama = $this->input->post('nama', true);
		$nim = $this->input->post('nim', true);
		$ukt = $this->input->post('ukt', true);
		$email = $this->input->post('email', true);
		$alamat = $this->input->post('alamat', true);
		$angkatan = $this->input->post('angkatan', true);
		$kelas = $this->input->post('kelas', true);
		$this->db->where('id', $id)->update('mahasiswa', ['nama' => $nama,
														'nim' => $nim,
														'ukt' => $ukt,
														'email' => $email,
														'alamat' => $alamat,
														'angkatan' => $angkatan,
														'kelas' => $kelas,
											]);
	}


	public function get_keyword($keyword)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->like('nama', $keyword);
		$this->db->or_like('nim', $keyword);
		$this->db->or_like('email', $keyword);
		$this->db->or_like('alamat', $keyword);
		$this->db->or_like('ukt', $keyword);
		$this->db->or_like('angkatan', $keyword);
		$this->db->or_like('kelas', $keyword);
		return $this->db->get()->result_array();
	}
}
?>