<?php

/**
 * /application/core/MY_Loader.php
 *
 */
class MY_Loader extends CI_Loader {
	public function template($template_name, $content_view, $vars = array(), $override = array(), $return = false) {
		$template = array(
			'menu' => 'menu',
			'meta' => 'meta',
			'header' => 'header',
			'footer' => 'footer',
			'content' => 'content',
		);

		if(is_array($override)) {
			$template = array_merge($template, $override);
		}

		foreach($template as $key => $view) {
			if(is_file(APPPATH.'views/'.$template_name.'/'.$view.'.php')) {
				$vars[$key] = $this->view($template_name.'/'.$view, $vars, true);
			}
		}
		

		// if(is_file(APPPATH.'views/'.$template_name.'/'.$template['menu'].'.php')) {
		// 	$vars['menu'] = $this->view($template_name.'/'.$template['menu'], $vars, true);
		// }

		// if(is_file(APPPATH.'views/'.$template_name.'/'.$template['header'].'.php')) {
		// 	$vars['header'] = $this->view($template_name.'/'.$template['header'], $vars, true);
		// }

		// if(is_file(APPPATH.'views/'.$template_name.'/'.$template['footer'].'.php')) {
		// 	$vars['footer'] = $this->view($template_name.'/'.$template['footer'], $vars, true);
		// }

		if(is_file(APPPATH.'views/'.$template_name.'/'.$content_view.'.php')) {
			$vars['content'] = $this->view($template_name.'/'.$content_view, $vars, true);
		}
		
		$this->view($template_name, $vars, $return);
	}
}