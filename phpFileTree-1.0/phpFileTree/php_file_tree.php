<?php

$GLOBALS['extension']="";
$GLOBALS['this_file']="";
$GLOBALS['full_address']="";

/*
	
	== PHP FILE TREE ==
	
		Let's call it...oh, say...version 1?
	
	== AUTHOR ==
	
		Cory S.N. LaViska
		http://abeautifulsite.net/
		
	== DOCUMENTATION ==
	
		For documentation and updates, visit http://abeautifulsite.net/notebook.php?article=21
		
*/
function php_file_tree($directory, $return_link, $extensions = array()) {
	// Generates a valid XHTML list of all directories, sub-directories, and files in $directory
	// Remove trailing slash
	$code = "";
	if( substr($directory, -1) == "/" ) 
		$directory = substr($directory, 0, strlen($directory) - 1);
	$code .= php_file_tree_dir($directory, $return_link, $extensions);
	return $code;

}
