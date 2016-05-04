<?php

/*
 * --------------------------------------------------------------------
 * COMPOSER AUTOLOAD
 * --------------------------------------------------------------------
 */
require_once APPPATH . 'third_party/SynCompiler/libraries/autoload.php';


/*
	Check if "public" dir exists
	Used to put assets/static files
*/
function SynCheckPublicExist () {
	// Get CodeIgniter Instance
	$ci =& get_instance();

	// Load dependences
	$ci->load->helper('url');

	// Check if "~/public/" exist
	if (!is_dir('./public')) {
		mkdir('./public');
	}

	// Check if "~/public/css" exist
	if (!is_dir('./public/css')) {
		mkdir('./public/css');
	}

	// Create empty CSS file
	if (!is_file('./public/css/style.css')) {
		touch('./public/css/style.css');
	}

	// Check if "~/public/js" exist
	if (!is_dir('./public/js')) {
		mkdir('./public/js');
	}

	// Create empty JS file
	if (!is_file('./public/js/app.js')) {
		touch('./public/js/app.js');
	}
}



/*
	Syn Compiler for SCSS -> CSS
*/
function SynCompileCSS () {
	// Get CodeIgniter Instance
	$ci =& get_instance();

	// Load dependences
	$ci->load->helper('url');

	// Check if "~/public/" exist
	SynCheckPublicExist ();

	// Load CSS Compiler Helper
	$ci->load->helper('syncompiler_css');

	// Compile CSS files
	SynCompileCSS_();

	// Get hash
	if(file_exists('application/cache/_style_fingerprint')):
		$hash = file_get_contents('application/cache/_style_fingerprint');
	else:
		$hash = 0;
	endif;

	
	// Check if exist a compressed CSS file
	if(file_exists('./public/css/style.min.css')) {
		$out = '<link rel="stylesheet" href="'.base_url('public/css/style.min.css?hash='.$hash.'').'" type="text/css" />';
	}
	else {
		$out = '<link rel="stylesheet" href="'.base_url('public/css/style.css?hash='.$hash.'').'" type="text/css" />';
	}

	return $out;
}



/*
	Syn Compiler for JS
*/
function SynCompileJS () {
	// Get CodeIgniter Instance
	$ci =& get_instance();

	// Load dependences
	$ci->load->helper('url');

	// Check if "~/public/" exist
	SynCheckPublicExist ();

	// Load CSS Compiler Helper
	$ci->load->helper('syncompiler_js');
	$ci->load->helper('url');

	// Compile CSS files
	SynCompileJS_();

	// Get hash
	if(file_exists('application/cache/_js_fingerprint')):
		$hash = file_get_contents('application/cache/_js_fingerprint');
	else:
		$hash = 0;
	endif;
	
	$out  = '';
	$out .= '<script type="text/javascript">var BASE_URL = "'.base_url().'";</script>'."\n 	";

	// Check if exist a compressed JS file
	if(file_exists('public/js/app.min.js'))
		$out .= '<script type="text/javascript" src="'.base_url('public/js/app.min.js?hash='.$hash.'').'"></script>'."\n";
	else
		$out .= '<script type="text/javascript" src="'.base_url('public/js/app.js?hash='.$hash.'').'"></script>'."\n";

	return $out;
}


