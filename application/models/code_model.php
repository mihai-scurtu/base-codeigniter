<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Code_model extends MY_Model {
	public $table = 'code';
	
	public function __construct() {
		parent::__construct();
	}

	public function submit($code, $phone, $id = null,  $src = 'NET') {
		$this->load->model('hitmail');

		if(!$id) {
			// insert code so we have an ID
			$data = array(
				'telefon' => $phone,
				'cod' => $code,
				'ip' => $this->input->ip_address(),
			);

			$id = $this->insert($data);
		}

		if($id) {
			// submit code
			$data = array(
				'phone' => $phone,
				'code' => $code,
				'idnet' => $id,
				'sursa' => $src,
			);

			$time = microtime(true);
			$response = $this->hitmail->send($data)->Respond;

			// update db with response
			$data = array(
				'response_time' => round(microtime(true) - $time, 3),
				'response' => $response,
				'message' => $this->hitmail->response_explanation($response),
			);

			$this->update($id, $data);
			return $response;
		}

		return false;
	}

	public function valid_response($response) {
		return in_array(strtolower($response), array('valid', 'premiu'));
	}

	public function response_message($response) {
		$response = strtolower($response);

		$msg = array(
			'valid'      => 'Felicitări! Ai înscris cu succes codul promoțional',
			'invalid'    => 'Codul tastat este greșit. Mai încearcă o data!',
			'bz'         => 'Ai depășit numarul de înscrieri acceptate într-o zi. Mai încearcă și mâine!',
			'bl'         => 'Ai depășit numarul permis de coduri introduse greșit. Numărul tau de telefon a fost blocat. Pentru deblocare apeleaza la Infoline 021/2330405.',
			'duplicat'   => 'Codul înscris a mai fost introdus o data. Te rugăm să introduci un alt cod de înregistrare.',
			'premiu'     => 'Felicitări! Ai câștigat un premiu instant!',
		);

		if(isset($msg[$response])) {
			return $msg[$response];
		} else {
			return 'A avut loc o eroare în sistem. Mai încearcă odată.';
		}
	}

	public function get_by_hash($hash) {
		$query = $this->db->where('MD5(id)', $hash)->get($this->table);
		return $this->prep_results($query, true);
	}

	public function prep_row($row) {
		$row = parent::prep_row($row);

		$row->nice_date = preg_replace('/(\d{4}).(\d{2}).(\d{2}).*/', '$3.$2.$1', $row->timestamp);

		return $row;
	}
}