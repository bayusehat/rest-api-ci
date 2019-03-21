<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_controller extends CI_Controller {

	var $API = "";

	public function __construct()
	{
		parent::__construct();
		$this->API = 'http://localhost/rest/index.php/api/';
	}

	public function index()
	{
		$data['mahasiswa'] = json_decode($this->curl->simple_get($this->API.'/mahasiswa'),true);
		$this->load->view('data_mahasiswa', $data);
	}

	public function tambah()
	{
		$this->load->view('tambah_mahasiswa');
	}

	public function post()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'jurusan' => $this->input->post('jurusan'),
			'alamat' => $this->input->post('alamat') 
		);

		$post = $this->curl->simple_post($this->API.'/mahasiswa',$data,array(CURLOPT_BUFFERSIZE => 10));

		if($post){
			$this->session->set_flashdata('notif', 'berhasil insert');
			redirect('mahasiswa_controller');
		}else{
			$this->session->set_flashdata('notif', 'gagal insert');
			redirect('mahasiswa_controller');
		}
	}

	public function delete($id)
	{
		$delete = $this->curl->simple_delete($this->API.'/mahasiswa/'.$id);

		if($delete){
			$this->session->set_flashdata('notif', 'deleted');
			redirect('mahasiswa_controller');
		}else{
			$this->session->set_flashdata('notif', 'Cannot deleted');
			redirect('mahasiswa_controller');
		}
	}

	public function search()
	{
		$nama = $this->input->post('nama');

		$data = json_decode($this->curl->simple_get($this->API.'/search',array('nama' => $nama),array(CURLOPT_BUFFERSIZE => 10)),true);
		$output = '';
		if(!empty($data)){

			foreach ($data['data'] as $data) {
			$output .= '<div>'.$data['id'].'</div>
						<div>'.$data['nama'].'</div>';
			}
		}else{
			$output .= 'RAONOK COK';
		}
		

		echo $output;
	}

}

/* End of file Mahasiswa_controller.php */
/* Location: ./application/controllers/Mahasiswa_controller.php */