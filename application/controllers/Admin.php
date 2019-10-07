<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admin');
		$this->load->model('Mahasiswa_model', 'mahasiswa');
		$this->load->model('Dosen_model', 'dosen');
		$this->load->model('Penjurusan_model', 'jurusan');
		logged_in();
	}

	
	public function index()
	{
		$data['stat_mahasiswa'] = $this->admin->jumlahDataMahasiswa();
		$data['stat_dosen'] = $this->admin->jumlahDataDosen();
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('templates/footer');
	}


	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('role', 'Role', 'required');

		$data['role'] = $this->db->get('user_role')->result_array();

		if($this->form_validation->run() == false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/role',$data);
		$this->load->view('templates/footer');
		}
		else{
			$this->admin->addRole();

			$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Success add new role!</div>');
			redirect('admin/role');
		}
	}


	public function ubahRole($id)
	{
		$data['title'] = 'Role Update';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('role', 'Role', 'required');

		$data['user_role'] = $this->db->get_where('user_role', ['id' => $id])->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();

		if($this->form_validation->run() == false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/edit-role',$data);
		$this->load->view('templates/footer');
		}
		else{
			$this->admin->updateRole($id);

			$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Success Update role!</div>');
			redirect('admin/role');
		}
	}


	public function hapusRole($id)
	{
		$this->admin->deleteRole($id);
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Delete row success!</div>');
		redirect('admin/role');
	}

	
	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/role-access',$data);
		$this->load->view('templates/footer');
	}


	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if($result->num_rows() < 1){
			$this->db->insert('user_access_menu', $data);
			$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Access Changed!</div>');
		}
		else{
			$this->db->delete('user_access_menu', $data);
			$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Deleted Access!</div>');
		}
	}


	public function Mahasiswa()
	{
		$data['title'] = "Data Mahasiswa";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nim', 'Nim', 'trim|required|is_unique[mahasiswa.nim]', ['is_unique' => 'This nim has already used!']);
		$this->form_validation->set_rules('ukt', 'UKT', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('angkatan', 'Angkatan', 'required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');

		$data['nama'] = $this->db->get('mahasiswa')->result_array();
		$data['jurusan'] = $this->db->get('penjurusan')->result_array();

		if($this->form_validation->run() == false){	
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('admin/data-mahasiswa');
			$this->load->view('templates/footer');
		}
		else{
			if($image=''){
			}
			else{
				$config['upload_path'] = './assets/img/img_mahasiswa/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '4800';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('image')){
					$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Gambar tidak cocok!</div>');
					redirect('admin/mahasiswa');
				}
				else{
					$this->mahasiswa->addMahasiswa();
				}
			}

			$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Add Mahasiswa success!</div>');
			redirect('admin/mahasiswa');
		}

	}


	public function detailMahasiswa($id)
	{
		$data['title'] = 'Detail Mahasiswa';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['id' => $id])->row_array();

		if($this->form_validation->run() == false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/detail-mahasiswa',$data);
		$this->load->view('templates/footer');
		}
	}


	public function editMahasiswa($id)
	{

		$data['title'] = 'Edit Mahasiswa';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nim', 'Nim', 'trim|required');
		$this->form_validation->set_rules('ukt', 'UKT', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('angkatan', 'Angkatan', 'required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');

		$data['nama'] = $this->db->get('mahasiswa')->result_array();
		$data['jurusan'] = $this->db->get('penjurusan')->result_array();
		$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['id' => $id])->row_array();

		if($this->form_validation->run() == false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/edit-mahasiswa',$data);
		$this->load->view('templates/footer');
		}
		else{
			$upload_image = $FILES['image']['nama'];
			if($upload_image){
			}
			else{
				$config['upload_path'] = './assets/img/img_mahasiswa/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '4800';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('image')){
				$old_image = $data['mahasiswa']['image'];
					if ($old_image != 'default.jpg'){
						unlink(FCPATH . 'assets/img/img_mahasiswa/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				}
				else{
					$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Your image not suitable!</div>');
					redirect('admin/mahasiswa');
				}
			}
			$this->mahasiswa->updateMahasiswa($id);
			$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Mahasiswa update success!</div>');
			redirect('admin/mahasiswa');
		}
	}


	public function hapusMahasiswa($id)
	{
		$this->mahasiswa->deleteMahasiswa($id);
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Delete data success!</div>');
			redirect('admin/mahasiswa');
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
		$this->load->view('admin/data-mahasiswa',$data);
		$this->load->view('templates/footer');
		}
	}


	public function Dosen()
	{
		$data['title'] = "Data Dosen";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama_dosen', 'Nama', 'required');
		$this->form_validation->set_rules('nip_dosen', 'Nip', 'required|numeric|is_unique[dosen.nip]', ['is_unique' => 'This nip has already used!']);
		$this->form_validation->set_rules('jabatan', 'Jabatan Akademik', 'required');
		$this->form_validation->set_rules('email_dosen', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('gelar', 'Gelar Akademik', 'required');

		$data['nama'] = $this->db->get('dosen')->result_array();

		if($this->form_validation->run() == false){	
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('admin/data-dosen');
			$this->load->view('templates/footer');
		}
		else{
			if($image_dosen=''){
			}
			else{
				$config['upload_path'] = './assets/img/img_dosen/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '4800';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('image_dosen')){
					$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Gambar tidak cocok!</div>');
					redirect('admin/dosen');
				}
				else{
					$this->dosen->addDosen();
				}
			}

			$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Add Mahasiswa success!</div>');
			redirect('admin/dosen');
		}

	}


	public function editDosen($id)
	{

		$data['title'] = 'Edit Dosen';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama_dosen', 'Nama', 'required');
		$this->form_validation->set_rules('nip_dosen', 'Nip', 'required|numeric');
		$this->form_validation->set_rules('jabatan', 'Jabatan Akademik', 'required');
		$this->form_validation->set_rules('email_dosen', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('gelar', 'Gelar Akademik', 'required');

		$data['nama'] = $this->db->get('dosen')->result_array();
		$data['dosen'] = $this->db->get_where('dosen', ['id' => $id])->row_array();

		if($this->form_validation->run() == false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/edit-dosen',$data);
		$this->load->view('templates/footer');
		}
		else{
			$upload_image = $FILES['image']['nama'];
			if($upload_image){
			}
			else{
				$config['upload_path'] = './assets/img/img_dosen/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '4800';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('image_dosen')){
				$old_image = $data['dosen']['image'];
					if ($old_image != 'default.jpg'){
						unlink(FCPATH . 'assets/img/img_dosen/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				}
				else{
					$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Your image not suitable!</div>');
					redirect('admin/dosen');
				}
			}
			$this->dosen->updateDosen($id);
			$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Mahasiswa update success!</div>');
			redirect('admin/dosen');
		}
	}


	public function hapusDosen($id)
	{
		$this->dosen->deleteDosen($id);
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Delete data success!</div>');
			redirect('admin/dosen');
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
		$this->load->view('admin/detail-dosen',$data);
		$this->load->view('templates/footer');
		}
	}


	public function searchDosen()
	{
		$data['title'] = 'Data Dosen';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$keyword = $this->input->post('keyword');
		$data['nama'] = $this->dosen->get_keyword($keyword);

		if($this->form_validation->run() == false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/data-dosen',$data);
		$this->load->view('templates/footer');
		}
	}


	public function Penjurusan()
	{
		$data['title'] = 'Data Jurusan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('kode_kelas', 'Kode Kelas', 'required|is_unique[penjurusan.kode_kelas]', ['is_unique' => 'This kode kelas has already used!']);
		$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required|is_unique[penjurusan.nama_kelas]', ['is_unique' => 'This nama kelas has already used!']);

		$data['jurusan'] = $this->db->get('penjurusan')->result_array();

		if($this->form_validation->run() == false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/data-jurusan',$data);
		$this->load->view('templates/footer');
		}
		else{
			$this->jurusan->addJurusan();
			$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">New menu added!</div>');
			redirect('admin/penjurusan');
		}
	}


	public function editJurusan($id)
	{

		$data['title'] = 'Edit Jurusan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('kode_kelas', 'Kode Kelas', 'required');
		$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');

		$data['jurusan'] = $this->db->get('penjurusan')->result_array();
		$data['penjurusan'] = $this->db->get_where('penjurusan', ['id' => $id])->row_array();

		if($this->form_validation->run() == false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/edit-jurusan',$data);
		$this->load->view('templates/footer');
		}
		else{
			$this->jurusan->updateJurusan($id);
			$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Update data success!</div>');
			redirect('admin/penjurusan');
		}
	}


	public function hapusJurusan($id)
	{		
		$this->jurusan->deleteJurusan($id);
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Delete data success!</div>');
			redirect('admin/penjurusan');
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
		$this->load->view('admin/lihat-mahasiswa',$data);
		$this->load->view('templates/footer');
		}
	}
}
?>