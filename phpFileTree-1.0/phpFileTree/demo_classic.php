<?php
// PHP File Tree Demo
// For documentation and updates, visit http://abeautifulsite.net/notebook.php?article=21

// Main function file
include("php_file_tree.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>PHP File Tree Demo</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link href="styles/default/default.css" rel="stylesheet" type="text/css" media="screen" />
		
		<!-- Makes the file tree(s) expand/collapsae dynamically -->
		<script src="php_file_tree.js" type="text/javascript"></script>
	</head>

	<body>
	
		<h1>PHP File Tree Classic</h1>
		
		<p>
			This entire list was generated with one line of code:
		</p>
		
		<pre>	<?php echo php_file_tree('C:\xampp\htdocs\ide','C:\xampp\htdocs\ide\index.php'); ?></pre>
		
		<p>
			The dynamic effects are enabled by including one small JavaScript file:
		</p>
		
		<pre>	<script src="php_file_tree.js" type="text/javascript"></script></pre>
		
		<p>
			<a href="http://abeautifulsite.net/2007/06/php-file-tree/">Visit the project page</a>
		</p>
		
		<hr />
		
		<h2>Browing...</h2>
		
		<?php echo php_file_tree('C:\xampp\htdocs\ide','C:\xampp\htdocs\ide\index.php'); ?>
		
	</body>
	
</html>
