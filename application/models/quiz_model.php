<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz_model extends MY_Model {
	public $table = 'quiz';

	public function get_result_ecard($answers) {
		$this->load->model('ecard_model');

		if(!is_array($answers)) {
			$answers = json_decode($answers, true);
		}

		switch($answers[2]) {
			case 0:
			case 1: 
				$prefix = 2;
				break;
			case 2:
			case 3:
				$prefix = 3;
				break;
			case 4: 
				$prefix = 1;
		}

		return $this->ecard_model->get_quiz_result($prefix);
	}

	public function prep_data($data) {
		$data = parent::prep_data($data);

		if(!$data['ip']) {
			$data['ip'] = $this->input->ip_address();
		}

		return $data;
	}
}