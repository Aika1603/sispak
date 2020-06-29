<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layout {

		var $template_data = array();

	  function limit_words($string, $word_limit){
	      $words = explode(" ",$string);
	      return implode(" ",array_splice($words,0,$word_limit));
	  }

		function set($name, $value)
		{
    	$this->template_data[$name] = $value;
		}

		function load($template = '', $view = '' , $view_data = 0,  $menu_open = NULL, $menu_open2 = NULL)
		{
      $this->CI =& get_instance();
			$this->set('menu_open', $menu_open);
			// $this->set('menu_open2', $menu_open2);
			// $this->set('header_menu', $this->CI->load->view($header_menu, $this->template_data, TRUE));
			// $this->set('footer', $this->CI->load->view('web/layout/v_footer', '', TRUE));
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
			return $this->CI->load->view($template, $this->template_data);
		}

}
