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
$return_link;
function php_file_tree_dir($directory, $return_link, $extensions = array(), $first_call = true, $dir_copy = "") {
	// Recursive function called by php_file_tree() to list directories/files
	// Get and sort directories/files
	if(function_exists("scandir")) 
		$file = scandir($directory); 
	else $file = php4_scandir($directory);
	natcasesort($file);
	// Make directories first
	$files = $dirs = array();
	foreach($file as $this_file) {
		if( is_dir("$directory/$this_file" ) ) $dirs[] = $this_file; else $files[] = $this_file;
	}
	$file = array_merge($dirs, $files);
	// Filter unwanted extensions
	if( !empty($extensions) ) {
		foreach( array_keys($file) as $key ) {
			if( !is_dir("$directory/$file[$key]") ) {
				$ext = substr($file[$key], strrpos($file[$key], ".") + 1); 
				if( !in_array($ext, $extensions) ) unset($file[$key]);
			}
		}
	}

	if( count($file) > 2 ) { // Use 2 instead of 0 to account for . and .. "directories"
		$php_file_tree = "<ul";
		if( $first_call ) { $php_file_tree .= " class=\"php-file-tree\""; $first_call = false; }
		$php_file_tree .= '><input type="submit" id="LOAD" name="OPEN" class="no-display"></input>';
		foreach( $file as $this_file ) {
				if ($dir_copy) {
					$my_temp_var = $dir_copy . "/" . $this_file;
				}
				else{
					$my_temp_var = $this_file;
				}
			if( $this_file != "." && $this_file != ".." ) {
				if( is_dir("$directory/$this_file") ) {
					// Directory
					$php_file_tree .= "<li class=\"pft-directory\"><a href=\"#\">" . htmlspecialchars($this_file) . "</a>";
					$php_file_tree .= php_file_tree_dir("$directory/$this_file", $return_link ,$extensions, false, $my_temp_var);
					$php_file_tree .= "</li>";
				} else {
					// File
					// Get extension (prepend 'ext-' to prevent invalid classes from extensions that begin with numbers)
					$ext = "ext-" . substr($this_file, strrpos($this_file, ".") + 1); 
					$link = str_replace("[link]", "$directory/" . urlencode($this_file), $return_link);
					$php_file_tree .= 
					'<li class="pft-file ' . strtolower($ext) . '">
						<a href="$link">' 
						.'<label class="file-tree-label" for="LOAD" type="checkbox" name="' . $dir_copy . " " . '" onclick="assignId(\'' . $my_temp_var . '\');' . '">' 
							. htmlspecialchars($this_file) 
						.'</label>' 
					. '</a>
					</li>';
				}
			}
		}
		$php_file_tree .= "</ul>";
	}
	return $php_file_tree;
}


// For PHP4 compatibility
function php4_scandir($dir) {
	$dh  = opendir($dir);
	while( false !== ($filename = readdir($dh)) ) {
	    $files[] = $filename;
	}
	sort($files);
	return($files);
}


$return_link=$full_address;
echo '<script> alert("' . $full_address . '""); </script>';