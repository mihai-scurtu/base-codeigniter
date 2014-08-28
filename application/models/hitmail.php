<?php

class Hitmail extends CI_Model {
	protected $url = 'http://w3.hitmail.ro/connectors/promo/Chokotof0614/';

	function __construct() {
		parent::__construct();

		$this->load->library('curl');
	}

	public function send($input) {
		$options = array(
			'telefon' => $input['phone'],
			'cod' => $input['code'],
			'idnet' => $input['idnet'],
			'sursa' => $input['sursa'],
		);
		$response = $this->curl->simple_post($this->url.'entryjson.php', $options);
		$response = json_decode($response);
		return $response;
		
	}

	public function user($phone) {

		$options                =   array();
		$options['telefon']     =   $phone;
		
		$response = $this->curl->simple_post($this->url.'checkuser.php', $options);
		$response = json_decode($response, true);
		// dump($response);
		$codes = array();
		if(is_array($response['CodesWEB'])) {
			foreach($response['CodesWEB'] as $item) {
				$codes[] = array(
					'timestamp' => strtotime($item['data']),
					// 'date' => date('j.m.Y H:i', strtotime($item['data'])),
					'date' => $item['data'],
					'code' => $item['cod'],
					'origin' => 'WEB',
					);
			}
		}
		if(is_array($response['CodesSMS'])) {
			foreach($response['CodesSMS'] as $item) {
				$codes[] = array(
					'timestamp' => strtotime($item['data']),
					// 'date' => date('j/m/Y H:i', strtotime($item['data'])),
					'date' => $item['data'],
					'code' => $item['cod'],
					'origin' => 'SMS',
					);
			}
		}

		return $codes;
	}

	public function reset($phone) {

		$options                =   array();
		$options['telefon']     =   $phone;
		
		$response = $this->curl->simple_post($this->url.'reset.php', $options);
		// return json_decode($response, true);
	}

	public function valid($response) {

		if(empty($response) || in_array($response, array('ACCESDENIED', 'INVALIDPARAMS', 'TIMEOUT'))) return false;
		return true;	// MESAJ
		
	}

	public function response_explanation($response) {
		// if(empty($response)) return 'Datele introduse sunt invalide.';
		// elseif($response == 'ACCESDENIED') return 'Acces restricționat pentru informațiile introduse.';
		// elseif($response == 'INVALIDPARAMS') return 'Datele introduse sunt invalide.';
		// elseif($response == 'TIMEOUT') return 'Informațiile nu pot fi verificate momentan. Vă rugăm să încercați mai târziu.';
		// else return '';
		$msg = array(
			'BZ' => 'blocat pe zi la 10 corecte',
			'BL' => 'blocat la 10 incorecte consecutive',
		);

		return $msg[$response];
	}

	public function location($response) {

		if($response['Valid']) return 'code';
		return 'reject';
		
	}
}


