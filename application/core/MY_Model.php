<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Basic model to be extended by others.
 */
class MY_Model extends CI_Model {
	// model table
	public $table;

	// model primary key
	public $pk;

	// relations array
	public $relations;

	// default params
	public $defaults = array(
		'active' => 1,
		'limit' => null,
		'offset' => null,
		'order_by' => '',
	);

	public $fields = array();

	public $validate_rules = array();

	function __construct($table = '') {
		parent::__construct();

		$this->load->database();

		if($table) {
			$this->table = $table;
		}

		// generate primary key if it wasn't explicitly set
		// @todo maybe get actual primary key from list_fields
		if(empty($this->pk)) {
			$this->pk = 'id';
		}

		// set default order unless explicitly set
		if(empty($this->defaults['order_by'])) {
			$this->defaults['order_by'] = $this->pk.' desc';
		}

		// extract fields if the class is initialized via child model
		if($this->db->table_exists($this->table)) {
			$this->fields = $this->db->list_fields($this->table);
		}
	}

	// get single entry by pk
	public function get($id) {
		$results = $this->get_by($this->pk, $id);
		return $results[0];
	}

	// get entries by custom sql where
	public function get_where($where, $p = array()) {
		$p = array_merge($this->defaults, $p);

		$where = $where.$this->active_where($p['active'], true);
		
		$this->db->where($where);
		$this->db->order_by($p['order_by']);
		
		$query = $this->db->get($this->table, $p['limit'], $p['offset']);
		return $this->prep_results($query);
	}

	public function get_one_where($where, $p = array()) {
		$p['limit'] = 1;
		$p['offset'] = 0;

		$items = $this->get_where($where, $p);
		return $items[0];
	}

	// get entries by field value(s)
	public function get_by($field, $value, $p = array()) {
		$p = array_merge($this->defaults, $p);

		// if(!in_array($field, $this->fields)) {
		// 	throw new Exception('Field not found');
		// }

		$this->db->order_by($p['order_by']);

		// accept multiple values
		if(is_array($value)) {
			$this->db->where_in($field, $value);
		} elseif(is_scalar($value)) {
			$this->db->where($field, $value);
		} else {
			return array();
		}

		// $this->active_where($p['active']);

		$query = $this->db->get($this->table, $p['limit'], $p['offset']);
		return $this->prep_results($query);
	}

	public function get_one_by($field, $value, $p = array()) {
		$p['limit'] = 1;
		$p['offset'] = 0;

		$items = $this->get_by($field, $value, $p);
		return $items[0];
	}

	// assume data is validated
	public function insert($data) {
		$values = $this->prep_data($data);

		if(!count($values)) return null;

		$this->db->set($values);
		$this->db->insert($this->table);

		return $this->db->insert_id();
	}

	// assume data is validated
	public function update($id, $data) {
		$values = $this->prep_data($data);

		if(!count($values)) return null;

		$this->db->set($values);
		$this->db->where($this->pk, $id);
		$this->db->update($this->table);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$this->db->where($this->pk, $id);
		$this->db->delete($this->table);

		return $this->db->affected_rows();
	}

	protected function active_where($active, $return_string = false) {
		if($return_string) {
			return isset($active) ? ' AND active = '.$active : '';
		} elseif(isset($active)) {
			$this->db->where('active', $active);
		}
	}

	protected function prep_data($data) {
		$values = array();
		$data = (array) $data;

		foreach($this->fields as $field) if(isset($data[$field])) {
			$values[$field] = $data[$field];
		}

		return $values;
	}

	protected function prep_results($query, $single_row = false) {
		$results = array();

		foreach($query->result() as $row) {
			$row = $this->prep_row($row);

			$results[] = $row;
		}

		if($single_row) {
			return $results[0];
		} else {
			return $results;
		}
	}

	protected function prep_row($row) {
		return $row;
	}

	public function validation_rules($key = null) {
		if(is_array($this->validation_rules[$key])) {
			return $this->validation_rules[$key];
		} 

		return $this->validate_rules;
	}
}