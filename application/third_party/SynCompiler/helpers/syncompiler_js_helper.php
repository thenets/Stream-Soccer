<?php

/* 
 * Syn Compiler for JS
 * 
 * Return true if has any modification.
 * 
 * @return [boolean]
 */

function SynCompileJS_ () {
	// Get CodeIgniter Instance
	$ci =& get_instance();

	// Load dependences
	$ci->load->helper('url');

	// Active debug
	$DEBUG = false;

	// Compiled JS output content
	$comp['out'] = '';

	// Sub-directories list
	$comp['sub-dirs'] = [];

	// JS files founded
	$comp['js_files']  = [];

	// Get application directory
	$comp['dir'] = getcwd();

	// Get modules dir
	$comp['modules_dir'] = $comp['dir'].'/application/modules';

	// Get list of modules
	$comp['modules'] = scandir($comp['modules_dir']);

	// Recursive check sub-directories
	// check_dirs_js (String, Array<String>)
	// @return [0-1] int 
	// 		0 - No sub-dirs
	//		1 - Has 1 or more sub-dirs
	if(! function_exists('check_dirs_js')) {
		function check_dirs_js ($module_dir, &$sub_dirs) {
			// List of all dirs found
			$new_dirs = scandir($module_dir);

			// Remove "." and ".." pointers
			unset($new_dirs[0],$new_dirs[1]);

			// Remove any file from $new_dirs array
			// And add full path to new dirs
			foreach ($new_dirs as $key => $value) {
				if (is_dir($module_dir.'/'.$value)){
					$new_dirs[$key] = $module_dir.'/'.$value;
				}
				else {
					unset($new_dirs[$key]);
				}
			}

			// Merge new directories found
			$sub_dirs = array_merge($sub_dirs, $new_dirs);

			// Recursive check the dirs found
			foreach ($new_dirs as $key => $value) {
				check_dirs_js ($value, $sub_dirs);
			}
		}
	}

	// Search JS files on each module
	// 		(-2 because has two relative pointers: '.' and '..')
	for ($i=0; $i<count($comp['modules'])-2; $i++) {
		// actual module inside the loop
		$module_name 		= $comp['modules'][$i+2];
		$module 			= $comp['modules_dir'].'/'.$module_name;
		$module_js_files 	= [];

		// Check if "$module" really is a diretory
		if (is_dir($module)) {
			if($DEBUG) echo '"'.$module_name.'"'." is a module.\n";

			// Check if module has a JS diretory
			if (is_dir($module.'/js')) {
				if($DEBUG) echo '"'.$module_name.'"'." has JS diretory.\n";

				// Get list of sub-directories
				$comp['sub-dirs'] = [$module.'/js'];
				check_dirs_js($module.'/js', $comp['sub-dirs']);

				// Check if has JS files into each sub-dir
				// And add to list of JS files
				foreach ($comp['sub-dirs'] as $dir_key => $dir) {
					$module_JS_files = scandir($dir);
					foreach ($module_JS_files as $key => $value) {
						// Check common file: *.js
						if(substr( $value, -3 ) == '.js') {
							if($DEBUG) print_r("File common found  : ".$value."\n");

							$comp['js_files'][] = $dir.'/'.$value;
						}
					}
				}
			}
		}
	}

	
	// Sort all JS files found
	sort($comp['js_files']);

	// Concatenate content
	foreach ($comp['js_files'] as $key => $value) {
		$comp['out'] .= "\n".file_get_contents($value);
		clearstatcache();
	}


	// Check modification by MD5
	$has_modification = false;
	$static_file = './public/js/app.js';
	if (is_file($static_file)) {
		if ( md5($comp['out']) != md5(file_get_contents($static_file)) ) {
			$has_modification = true;
		}
	}
	else {
		$has_modification = true;
	}


	// Output data to ~/public/css/style.css
	if ($has_modification) {
		unlink($static_file);
		file_put_contents($static_file, $comp['out']);
	}


	// Compress
	if($has_modification) {
		if(is_file('./public/js/app.min.js'))
			unlink('./public/js/app.min.js');

		// Don't compress on localhost
		if ($_SERVER['HTTP_HOST'] != 'localhost' && $_SERVER['HTTP_HOST'] != '127.0.0.1') {
			// Compress
			$minifier = new MatthiasMullie\Minify\JS('public/js/app.js');
			$minifier->minify('public/js/app.min.js');
		}
		else {
			//copy('./public/css/style.css', './public/css/style.min.css');
		}
	}


	// Create fingerprint
	if($has_modification) {
		$key  = 'ilk544RfC7*j#U_y^M1)uxWmd6';
		$time = time();
		$hash = md5($key . $time);

		file_put_contents($comp['dir'].'/application/cache/_js_fingerprint', $hash);
	}


	// Debug all content
	//unset($comp['out']);
	if($DEBUG) print_r($comp);


	return $has_modification;
}