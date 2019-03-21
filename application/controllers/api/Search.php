<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Search extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model');
	}

	public function index_get()
	{
		$nama = $_GET['nama'];

		$result = $this->Mahasiswa_model->get_scan_mahasiswa($nama);

		if(!empty($result)){
			$this->set_response([
				'status'=> TRUE,
				'data' => $result], REST_Controller::HTTP_OK);
		}else{
			$this->set_response([
				'status' => FALSE,
				'message' => 'No users Found'],REST_Controller::HTTP_NOT_FOUND
			);
		}
	}
}
