<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model');
	}

	public function index_get()
	{
		$id = $this->get('id');

		if($id === null){
			$get = $this->Mahasiswa_model->get_mahasiswa();
		}else{
			$get = $this->Mahasiswa_model->get_mahasiswa_id($id);
		}

		if(!empty($get)){
			$this->set_response([
				'status'=> TRUE,
				'data' => $get], REST_Controller::HTTP_OK);
		}else{
			$this->set_respose([
				'status' => FALSE,
				'message' => 'No users Found'],REST_Controller::HTTP_NOT_FOUND
			);
		}
	}

	public function index_post()
	{
		$data = $this->Mahasiswa_model->insert_mahasiswa();
		$id = $this->db->insert_id();

		$temp = $this->db->get_where('tb_mahasiswa',array('id'=>$id))->result();

		if($data){
			$this->set_response([
				'status' => TRUE,
				'data' => $temp],REST_Controller::HTTP_CREATED
			);
		}else{
			$this->set_response([
				'status' => FALSE,
				'message' => 'Failed to insert'],REST_Controller::HTTP_BAD_REQUEST
			);
		}
	}

	public function index_put()
	{
		$id = $this->uri->segment(3);
		$data = $this->Mahasiswa_model->update_mahasiswa($id);
		$temp = $this->db->select('*')->where('id',$id)->get('tb_mahasiswa')->result();
		if($data){
			$this->set_response([
				'status' => TRUE,
				'data' => $temp],200);
		}else{
			$this->set_response([
				'status' => FALSE,
				'message' => 'Cannot update mahasiswa'],502);
		}
	}

	public function index_delete()
	{
		$id = $this->uri->segment(3);

		$delete = $this->Mahasiswa_model->delete_mahasiswa($id);
		if($delete){
			$this->set_response([
				'status' => TRUE,
				'message' => 'Deleted'],200);
		}else{
			$this->set_response([
				'status' => FALSE,
				'message' => 'Cannot deleted'],REST_Controller::HTTP_NOT_FOUND);
		}
	}
}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/api/Mahasiswa.php */
