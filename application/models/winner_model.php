<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Winner_model extends MY_Model {
	public $table = 'winner';

	public function prep_row($row) {
		$row = parent::prep_row($row);

		$row->nice_date = preg_replace('/(\d{4}).(\d{2}).(\d{2})/', '$3.$2.$1', $row->date);

		return $row;
	}
}