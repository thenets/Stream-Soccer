<?php
require "application/third_party/SynCompiler/helpers/scssphp/scss.inc.php";


// SCSS Compiler
function scss_compiler ($scss_content='') {
	// Instance a scssc object
	$scss = new scssc();
	$scss->setFormatter("scss_formatter_compressed");

	// Compile content
	return $scss->compile($scss_content);	
}