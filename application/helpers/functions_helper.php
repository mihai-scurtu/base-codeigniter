<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*********
	GENERAL FUNCTIONS
*********/


if(!function_exists('debug_mode')) {
	function debug_mode() {
		return $_SERVER['REMOTE_ADDR'] == '194.50.126.3' || $_SERVER['REMOTE_ADDR'] == '86.34.135.9';
	}
}

if(!function_exists('dump')) {
	function dump($var) {
		if(debug_mode()) {
			echo '<pre>';
			var_dump($var);
			echo '</pre>';
		}
	}
}

if(!function_exists('url')) {
	function url($url = '') {
		$CI =& get_instance();

		$urls = $CI->config->item('url');

		return $CI->config->site_url($urls[$url]);
	}
}

if(!function_exists('active_class')) {
	function active_class($page, $cur_page, $class = 'active') {
		if($cur_page == $page) {
			return $class;
		}
	}
}

/*********
	PROJECT SPECIFIC FUNCTIONS
*********/
