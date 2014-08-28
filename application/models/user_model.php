<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model {
	public $table = 'user';
	
	public function __construct() {
		parent::__construct();
	}

	public function phone_exists($phone) {
		return count($this->get_by('telefon', $phone));
	}

	public function login($phone, $pass) {
		$this->load->library('session');
		$this->load->helper('string');

		$check = $this->get_where('telefon = "'.$phone.'" AND parola = "'.md5($pass).'"');
		if(count($check)) {
			$token = random_string('unique');

			$this->update($check[0]->id, array('token' => $token));
			$this->session->set_userdata('token', $token);

			// return first user
			return $check[0];
		}

		return false;
	}

	public function logout() {
		$this->load->library('session');
		$this->session->unset_userdata('token');
	}

	public function get_logged_in() {
		$this->load->library('session');

		$token = $this->session->userdata('token');
		if($token) {
			$check = $this->get_by('token', $token);

			if(count($check)) {
				return $check[0];
			}
		}

		return false;
	}

	protected function prep_data($data) {
		$data = parent::prep_data($data);

		if($data['parola']) {
			$data['parola'] = md5($data['parola']);
		}

		if(!$data['ip']) {
			$data['ip'] = $this->input->ip_address();
		}

		return $data;
	}
}