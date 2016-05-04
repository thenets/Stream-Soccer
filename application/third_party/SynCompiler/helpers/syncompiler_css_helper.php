<?php
/* 
 * Syn Compiler for SCSS -> CSS
 * 
 * Return true if has any modification.
 * 
 * @return [boolean]
 */
function SynCompileCSS_ () {
	// Get CodeIgniter Instance
	$ci =& get_instance();

	// Load dependences
	$ci->load->helper('url');

	// Active debug
	$DEBUG = false;

	// Compiled CSS output content
	$comp['out'] = '';

	// Sub-directories list
	$comp['sub-dirs'] = [];

	// SCSS files founded
	$comp['scss_commons']  = [];

	// SCSS partials files founded
	$comp['scss_partials'] = [];
	
	// Get application directory
	$comp['dir'] = getcwd();

	// Get modules dir
	$comp['modules_dir'] = $comp['dir'].'/application/modules';

	// Cache Diretory
	$cache_dir = $comp['dir'].'/application/cache/';

	// Get list of modules
	$comp['modules'] = scandir($comp['modules_dir']);


	// Recursive check sub-directories
	// check_dirs_css (String, Array<String>)
	// @return [0-1] int 
	// 		0 - No sub-dirs
	//		1 - Has 1 or more sub-dirs
	if(! function_exists('check_dirs_css')) {
		function check_dirs_css ($module_dir, &$sub_dirs) {
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
				check_dirs_css ($value, $sub_dirs);
			}
		}
	}


	// Search SCSS files on each module
	// 		(-2 because has two relative pointers: '.' and '..')
	for ($i=0; $i<count($comp['modules'])-2; $i++) {
		// actual module inside the loop
		$module_name 		= $comp['modules'][$i+2];
		$module 			= $comp['modules_dir'].'/'.$module_name;
		$module_scss_files 	= [];

		// Check if "$module" really is a diretory
		if (is_dir($module)) {
			if($DEBUG) echo '"'.$module_name.'"'." is a module.\n";

			// Check if module has a SCSS diretory
			if (is_dir($module.'/scss')) {
				if($DEBUG) echo '"'.$module_name.'"'." has SCSS diretory.\n";


				// Get list of sub-directories
				$comp['sub-dirs'] = [$module.'/scss'];
				check_dirs_css ($module.'/scss', $comp['sub-dirs']);

				// Check if has scss files
				// And add to list of SCSS files
				foreach ($comp['sub-dirs'] as $dir_key => $dir) {
					$module_scss_files = scandir($dir);
					foreach ($module_scss_files as $key => $value) {
						// Check common file: *.scss
						if(substr( $value, 0, 1 ) != '_' && substr( $value, -5 ) == '.scss') {
							if($DEBUG) print_r("File common found  : ".$value."\n");

							$comp['scss_commons'][] = $dir.'/'.$value;
						}

						// Check partial files: _*.scss
						if(substr( $value, 0, 1 ) == '_' && substr( $value, -5 ) == '.scss') {
							if($DEBUG) print_r("File partial found : ".$value."\n");

							$comp['scss_partials'][] = $dir.'/'.$value;
						}
					}
				}
			}
		}
	}


	// Sort all JS files found
	sort($comp['scss_commons']);
	sort($comp['scss_partials']);



	// Split in modules
	$modules = [];
	foreach ($comp['scss_commons'] as $key => $value) {
		$module_name = preg_split('/modules\//', $value, -1)[1];
		$module_name = preg_split('/\//', $module_name, -1)[0];
		
		$modules[$module_name][] = $value;
	}


	// Compile each module individualy
	$has_modification = false;
	foreach ($modules as $module_name => $module) {
		// Concatenate content
		foreach ($module as $key => $value) {
			$comp['out'] .= file_get_contents($value);
			clearstatcache();
		}


		// Compiling SCSS using SASS Ruby Gem
			// SCSS Cached file
			$cached_scss_file = $cache_dir.'_style_'.$module_name.'.scss';

			// Create a empty "_style_.scss" in the first time
			if (!file_exists($cached_scss_file)) {
				touch($cached_scss_file);
			}

			// Checking MD5
			// Compile just if has changes
			if ( md5($comp['out']) != md5(file_get_contents($cached_scss_file)) ) {
				$has_modification = true;
				file_put_contents($cached_scss_file, ($comp['out']));				// Save SCSS file

				// Check SASS support
				$sass_support = false;
				if(function_exists('exec')) {
					$sass_support = substr(exec('sass -v'), 0, 4) == 'Sass';
				}

				// Using SASS Ruby Gem
				if($sass_support) {
					exec('sass '.$cache_dir.'_style_'.$module_name.'.scss '.$cache_dir.'_style_'.$module_name.'.css --style compressed');
				}

				// Using SCSS PHP
				else {
					$ci->load->helper('scssphp');
					$compiled_css_content = scss_compiler($comp['out']);
					file_put_contents($cache_dir.'_style_'.$module_name.'.css', $compiled_css_content);
				}

				$compiled_css_content = file_get_contents($cache_dir.'_style_'.$module_name.'.css');			// Get CSS content
			}


			// Or just load the cached file
			else
				$compiled_css_content = file_get_contents($cache_dir.'_style_'.$module_name.'.css');


		$comp['out'] = ''; // Wipe old out
	}




	// For each file into Cache Dir
	// Searching to *.css files
	$comp['out'] = $out_static = '';
	foreach (scandir($cache_dir) as $key => $file) {
		// If is a *.css file
		if (substr( $file, -4 ) == '.css') {
			$out_static .= "\n".file_get_contents($cache_dir.$file);
		};
	}


	// Output data to ~/public/css/style.css
	if ($has_modification) {
		unlink('./public/css/style.css');
		file_put_contents('./public/css/style.css', $out_static);
	}

	
	// Compress
	if($has_modification) {
		if(is_file('./public/css/style.min.css'))
			unlink('./public/css/style.min.css');

		// Don't Compress on localhost
		if ($_SERVER['HTTP_HOST'] != 'localhost' && $_SERVER['HTTP_HOST'] != '127.0.0.1') {
			// Compress
			$minifier = new MatthiasMullie\Minify\CSS('./public/css/style.css');
			$minifier->minify('./public/css/style.min.css');
		}
		else {
			//copy('./public/css/style.css', './public/css/style.min.css');
		}
	}



	// Create fingerprint
	if($has_modification) {
		$key  = 'ilk544RfC7*j#U_y^M1)EmAuxWmd6';
		$time = time();
		$hash = md5($key . $time);

		file_put_contents($cache_dir.'_style_fingerprint', $hash);
	}


	// Debug all content
	if($DEBUG) print_r($comp);


	return $has_modification;
}