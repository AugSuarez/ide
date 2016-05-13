<html>
<head>
    <meta charset="UTF-8">
	<title>menu</title>
	<!--<link rel="stylesheet" href="estilos/estilo.css">-->
	<link rel="stylesheet" href="estilos/newestilo.css">
	<link rel="stylesheet" href="estilos/font-awesome.min.css">
	<link rel="stylesheet" href="icon-font-google/material-icons.css">
	<link rel="stylesheet" href="icon-font-win10/styles.css">
	<link rel="stylesheet" href="estilos/neweditor.css">
	<link href="phpFileTree-1.0/phpFileTree/styles/default/default.css" rel="stylesheet">
	<script type="text/javascript" src="phpFileTree-1.0/phpFileTree/php_file_tree.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> 
  <body>
<div class="container inner-width">	
<?php 
include("phpFileTree-1.0\phpFileTree\php_file_tree_dir.php");
include("phpFileTree-1.0\phpFileTree\php_file_tree.php");

global $full_name;

    function showContents(){
        echo '<script> alert("contenido mostrado!"); </script>';
    }

    function saveFile(){
        echo '<script> saveAlert(); </script>';
    }

    if (!empty($_GET["SAVE"])) {
    	saveFile();
    }

    if (isset($_GET['SHOW'])) {
    	showContents();
    	echo '<script> window.location.href="index.php" </script>';
    }

    function getFullPath()
    {
    	$full_name = realpath($GLOBALS['full_name']);
        return $full_name;
    }

	function loadFile(){
		$input_file=getFullPath();
    	if(is_file($input_file))
    		$output_file=file_get_contents($input_file, "r");
    	else
    		echo "//ARCHIVO NO VALIDO: ";
    	if (file_exists($input_file)){
    		echo "//ARCHIVO UBICADO!\n" . "//ARCHIVO ABIERTO CON EXITO!\n" ;
    		return $output_file;
    	}
    	else
    		echo "el archivo deseado no existe";

		if (!file_get_contents($input_file)) {
	    	echo "//ARCHIVO NO SE PUDO ABRIR O TIENE CONTENIDO NULO. Se cargo el contenido predeterminado";

			return '<div id="default-content">' .'function foo(items) {
<!--                            -->var i;
<!--                            -->for (i = 0; i < items.length; i++) {
<!--                            -->    alert("Ace Rocks " + items[i]);
<!--                        -->    }
<!--                        -->}' . '</div>';
		}
	}
	    		
?>
</head>

<header>
	<nav>
		<form method="get" name="formName">
			<ul class="ul-default">
				<li class="btn-docs"><a href="index.php"><i class="icons8-left-round round file-oper"></i></a></li>

				<input type="submit" name="SHOW" id="SHOW" class="btn-docs-input no-display">
					<li class="btn-docs">
						<a href="#">
							<label for="SHOW" type="checkbox">
								<i class="fa fa-folder-open fa-2x file-oper"></i>
							</label>
						</a>
					</li>
				<input type="submit" id="CREATE" name="CREATE" class="btn-docs-input no-display">
					<li class="btn-docs">
						<a href="#">
							<label for="LOAD" type="checkbox">
								<i class="material-icons  add file-oper">add_circle</i>
							</label>
						</a>
					</li>
				
				<li class="btn-docs"><a href="#" onClick="openWin('create.php', 'creardoc')"><i class="fa fa-floppy-o fa-2x file-oper"></i></a></li>

			</ul>
		</form>
	</nav>
</header>

		<div class="barra-explorador">
			<div class="menu-explorador">
				<nav class="nav-barra-izq">
					<ul class="ul-default barra-busqueda">
						<li class="li-izq"><a class="a-izq" href="#"><i class="material-icons search">search</i></a></li>
						
					</ul>
				</nav>
			</div>
			<div class="folder-explorador">
				<div class="explorador-title">
					<a class="exp">EXPLORADOR</a>						
				</div>

			<form class="lista-dir" action="" method="get" name="forma-dir">
			<input id="full-name" class="no-display"  type="text" name="full-name"></input>
			<input  class="no-display" type="submit" name="OPEN"></input>
				<ul class="lista-ul">
				<?php echo php_file_tree('C:\xampp\htdocs\ide','C:\xampp\htdocs\ide\index.php', $extensions = array()); 
				?>
				</ul> 			
			</form>		

			</div>
		</div>

	<p id="content-display"></p>
		<div class="editor-container">
	            <form name="langForm">
	                <ul class="switch-container">
	                	<li class="switch-li">
	                    <input type="checkbox" name="js" onclick="
	                    	var editor = ace.edit('editor');editor.setTheme('ace/theme/tomorrow_night_eighties');
	                            editor.session.setMode('ace/mode/javascript');
							" class="lang-select" id="js">
	                        <label for="js" class="lang-btn" id="js" style="font-family: Lato;">
	                            <p>
	                                Javascript
	                            </p>
	                        </label>
	                    </input>
	                    </li>

	                    <li class="switch-li">
	                    <input type="checkbox" name="php" onclick="
	                    	var editor = ace.edit('editor');editor.setTheme('ace/theme/idle_fingers');
							editor.session.setMode('ace/mode/php');
							" class="lang-select" id="php">
	                        <label for="php" class="lang-btn" id="php" style="font-family: Lato;">
	                            <p>
	                                Php
	                            </p>
	                        </label>
	                    </input>
	                    </li>

	                    <li class="switch-li">
	                    <input type="checkbox" name="html" onclick="
	                    	var editor = ace.edit('editor');editor.setTheme('ace/theme/iplastic');
	                        editor.session.setMode('ace/mode/html');
							"
	                             class="lang-select" id="html">
	                        <label for="html" class="lang-btn" id="html" style="font-family: Lato;">
	                            <p>
	                                Html
	                            </p>
	                        </label>
	                    </input>
	                    </li>

	                    <li class="switch-li">
	                    <input type="checkbox" name="css" onclick="
	                    	var editor = ace.edit('editor');editor.setTheme('ace/theme/kr_theme');
	                            editor.session.setMode('ace/mode/css');
							"
							class="lang-select" id="css">
	                        <label for="css" class="lang-btn" id="css" style="font-family: Lato;">
	                            <p>
	                                Css
	                            </p>
	                        </label>
	                    </input>
	                    </li>

	                    <li class="switch-li">
	                    <input type="checkbox" name="cpp" onclick="
	                    	var editor = ace.edit('editor');editor.setTheme('ace/theme/terminal');
							editor.session.setMode('ace/mode/c_cpp');
							" class="lang-select" id="cpp">
	                        <label for="cpp" class="lang-btn" id="cpp" style="font-family: Lato;">
	                            <p>
	                                C++
	                            </p>
	                        </label>
	                    </input>
	                    </li>

	                    <li class="switch-li">
	                    <input type="checkbox" name="jar" onclick="
	                    	var editor = ace.edit('editor');editor.setTheme('ace/theme/merbivore_soft');
							editor.session.setMode('ace/mode/java');
							" class="lang-select" id="jar">
	                        <label for="jar" class="lang-btn" id="jar" style="font-family: Lato;">
	                            <p>
	                                Java
	                            </p>
	                        </label>
	                    </input>
	                    </li>

	                    <li class="switch-li">
	                    <input type="checkbox" name="myd" onclick="
	                    	var editor = ace.edit('editor');editor.setTheme('ace/theme/twilight');
							editor.session.setMode('ace/mode/sql');
							" class="lang-select" id="myd">
	                        <label for="myd" class="lang-btn" id="myd" style="font-family: Lato;">
	                            <p>
	                                Sql
	                            </p>
	                        </label>
	                    </input>
	                    </li>

	                </ul>
	            </form>
   
        <pre id="editor"><?php  
        if (!empty($_GET["OPEN"])) {
			$full_name = $_GET['full-name'];
        	echo loadFile(); 
        }?></pre>

		</div>

		<div class="barra-derecha">
			<nav class="nav-barra-der">
				<ul class="ul-default">
					<li class="li-default nav-list"><a class="nav-link" href="#"><i class="icon fa fa-home fa-2x"></i></a></li>
					<li class="li-default nav-list"><a class="nav-link" href="#"><i class="icon fa fa-files-o fa-2x"></i></a></li>
					<li class="li-default nav-list"><a class="nav-link" href="#"><i class="icon fa fa-clipboard fa-2x"></i></a></li>
					<li class="li-default nav-list"><a class="nav-link" href="#"><i class="icon fa fa-scissors fa-2x"></i></a></li>
					<li class="li-default nav-list"><a class="nav-link" href="#"><i class="icon fa fa-file-text-o fa-2x"></i></a></li>
				</ul>
			</nav>	
		</div>
<script src="src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="editor.js" type="text/javascript"></script>

	<script type="text/javascript">
        var editor = ace.edit("editor");
        editor.setTheme('ace/theme/tomorrow_night_eighties');
        editor.session.setMode('ace/mode/javascript');
	</script>
</html>