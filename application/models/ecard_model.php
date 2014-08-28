<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ecard_model extends CI_Model {
	public function get_all() {
		$files = glob('static/img/ecards/*.*');

		return $files;
	}

	public function get_quiz_result($prefix = '') {
		$files = glob('static/img/quiz_ecards/'.$prefix.'*.*');
		shuffle($files);

		return $files[0];
	}
}