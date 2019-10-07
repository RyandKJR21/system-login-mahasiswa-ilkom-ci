<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model
{

	public function addDosen()
	{
		$image_dosen = $this->upload->data('file_name');
		$this->db->insert('dosen', ['nama' => $this->input->post('nama_dosen'),
										'nip' => $this->input->post('nip_dosen'),
										'jabatan' => $this->input->post('jabatan'),
										'email' => $this->input->post('email_dosen'),
										'gelar' => $this->input->post('gelar'),
										'image' => $image_dosen
						]);
	}


	public function deleteDosen($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('dosen');
	}


	public function updateDosen($id)
	{
		$nama_dosen = $this->input->post('nama_dosen', true);
		$nip_dosen = $this->input->post('nip_dosen', true);
		$jabatan = $this->input->post('jabatan', true);
		$email_dosen = $this->input->post('email_dosen', true);
		$gelar = $this->input->post('gelar', true);
		$this->db->where('id', $id)->update('dosen', ['nama' => $nama_dosen,
														'nip' => $nip_dosen,
														'jabatan' => $jabatan,
														'email' => $email_dosen,
														'gelar' => $gelar,
											]);
	}


	public function get_keyword($keyword)
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->like('nama', $keyword);
		$this->db->or_like('nip', $keyword);
		$this->db->or_like('jabatan', $keyword);
		$this->db->or_like('gelar', $keyword);
		$this->db->or_like('email', $keyword);
		return $this->db->get()->result_array();
	}

}
?>