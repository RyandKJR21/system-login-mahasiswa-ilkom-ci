<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	// memaksa ke halaman login jika mengubah url
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model', 'mahasiswa');
		$this->load->model('Dosen_model', 'dosen');
		$this->load->model('Penjurusan_model', 'jurusan');
		logged_in();
	}
	// end
	
	public function index()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('user/index',$data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');

		if($this->form_validation->run() == false) {
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('user/edit',$data);
			$this->load->view('templates/footer');
		}
		else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			//Update Image
			$upload_image = $_FILES['image']['name'];

			if($upload_image){
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '4800';
				$config['upload_path'] = './assets/img/profile/';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('image')){
					//jika ada gambar baru yang diupload maka gambar lama akan dihapus
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg'){
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				}
				else{
					$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Your image not suitable!</div>');
					redirect('user');
				}
			}

				$this->db->set('name', $name);
				$this->db->where('email', $email);
				$this->db->update('user');

				$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">You profile has been updated!</div>');
				redirect('user');
		}
	}

	public function changePassword()
	{
		$data['title'] = 'Change Password';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[5]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[5]|matches[new_password1]');

		if($this->form_validation->run() == false){	
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('user/changepassword',$data);
			$this->load->view('templates/footer');
		}
		else{
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if(!password_verify($current_password, $data['user']['password'])){
				$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
					redirect('user/changepassword');
			}
			else{
				if($current_password == $new_password){
					$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">New password cannont be the same as current password!</div>');
						redirect('user/changepassword');
				}
				else{
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Change password success!</div>');
						redirect('user/changepassword');
				}
			}
		}

	}


	public function Mahasiswa()
	{
		$data['title'] = "Data Mahasiswa";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['nama'] = $this->db->get('mahasiswa')->result_array();

		if($this->form_validation->run() == false){	
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('user/data-mahasiswa');
			$this->load->view('templates/footer');
		}

	}


	public function detailMahasiswa($id)
	{
		$data['title'] = 'Detail Mahasiswa';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['nama'] = $this->db->get('mahasiswa')->result_array();
		$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['id' => $id])->row_array();

		if($this->form_validation->run() == false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('user/detail-mahasiswa',$data);
		$this->load->view('templates/footer');
		}
	}


	public function printMahasiswa()
	{
		$data['nama'] = $this->db->get('mahasiswa')->result_array();
		$this->load->view('user/print-mahasiswa', $data);
	}


	public function searchMahasiswa()
	{
		$data['title'] = 'Data Mahasiswa';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$keyword = $this->input->post('keyword');
		$data['nama'] = $this->mahasiswa->get_keyword($keyword);

		if($this->form_validation->run() == false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('user/data-mahasiswa',$data);
		$this->load->view('templates/footer');
		}
	}


	public function Dosen()
	{
		$data['title'] = "Data Dosen";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['nama'] = $this->db->get('dosen')->result_array();

		if($this->form_validation->run() == false){	
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('user/data-dosen');
			$this->load->view('templates/footer');
		}
	}


	public function detailDosen($id)
	{
		$data['title'] = 'Detail Dosen';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['dosen'] = $this->db->get_where('dosen', ['id' => $id])->row_array();

		if($this->form_validation->run() == false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('user/detail-dosen',$data);
		$this->load->view('templates/footer');
		}
	}


	public function printDosen()
	{
		$data['nama'] = $this->db->get('dosen')->result_array();
		$this->load->view('user/print-dosen', $data);
	}


	public function searchDosen()
	{
		$data['title'] = 'Data Mahasiswa';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$keyword = $this->input->post('keyword');
		$data['nama'] = $this->dosen->get_keyword($keyword);

		if($this->form_validation->run() == false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('user/data-dosen',$data);
		$this->load->view('templates/footer');
		}
	}


	public function Penjurusan()
	{
		$data['title'] = 'Data Jurusan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['jurusan'] = $this->db->get('penjurusan')->result_array();

		if($this->form_validation->run() == false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('user/data-jurusan',$data);
		$this->load->view('templates/footer');
		}
	}


	public function lihatMahasiswa($kelas)
	{		
		$data['title'] = 'Lihat Mahasiswa';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['lihat_kelas'] = $this->jurusan->lihatJurusan($kelas);
		$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['kelas' => $kelas])->row_array();

		if($this->form_validation->run() == false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('user/lihat-mahasiswa',$data);
		$this->load->view('templates/footer');
		}
	}
}
?>