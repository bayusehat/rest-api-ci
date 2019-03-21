<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

	public function get_scan_mahasiswa($nama)
	{
		$nama = $_GET['nama'];
		
		return  $this->db->select('*')
						 ->like('nama',$nama)
						 ->get('tb_mahasiswa')
						 ->result();
	}

	public function get_mahasiswa()
	{
		return $this->db->get('tb_mahasiswa')
						->result();
	}

	public function get_mahasiswa_id($id)
	{
		return $this->db->where('id',$id)
						->get('tb_mahasiswa')
						->result();
	}

	public function insert_mahasiswa()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'jurusan' => $this->input->post('jurusan'),
			'alamat' => $this->input->post('alamat')
		);

		return $this->db->insert('tb_mahasiswa', $data);
	}

	public function update_mahasiswa($id)
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'jurusan' => $this->input->post('jurusan'),
			'alamat' => $this->input->post('alamat')
		);

		return $this->db->where('id',$id)
						->update('tb_mahasiswa', $data);
	}

	public function delete_mahasiswa($id)
	{
		return $this->db->where('id',$id)
						->delete('tb_mahasiswa');
	}

}

/* End of file Mahasiswa_model.php */
/* Location: ./application/models/Mahasiswa_model.php */
