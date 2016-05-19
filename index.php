<html>
<head>
    <meta charset="UTF-8">
	<title id="page-title">IDE</title>
	<link rel="stylesheet" href="estilos/estilo.css">
	<link rel="stylesheet" href="estilos/font-awesome.min.css">
	<link rel="stylesheet" href="icon-font-google/material-icons.css">
	<link rel="stylesheet" href="icon-font-win10/styles.css">
	<link rel="stylesheet" href="estilos/editor.css">
	<link href="phpFileTree-1.0/phpFileTree/styles/default/default.css" rel="stylesheet">
	<script type="text/javascript" src="phpFileTree-1.0/phpFileTree/php_file_tree.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> 
  <body>
<div class="container inner-width">	
<?php 
include("phpFileTree-1.0\phpFileTree\php_file_tree_dir.php");
include("phpFileTree-1.0\phpFileTree\php_file_tree.php");
include_once("process.php"); 		
?>
</head>

<div class="content">
<header>
	<nav>
		<form method="get" name="formName" onsubmit="return confirmSave()">
			<ul class="ul-default file-oper-list">

				<li class="btn-docs"><a href="index.php"><i class="icons8-left-round round file-oper"></i></a></li>

				<li class="btn-docs docs-open">
				<p class="hidden-tip-1">Abrir Ventana Nueva Con Editor</p>
					<a href="index.php" target="_blank">
						<i class="fa fa-folder-open fa-2x file-oper"></i>
					</a>
				</li>

				<li class="btn-docs docs-create">
				<p class="hidden-tip-2">Crear Archivo Nuevo</p>
					<a href="#" onClick="openWin('create.php', 'creardoc')">
						<i class="material-icons  add file-oper">add_circle</i>
					</a>
				</li>

				<input type="submit" id="SAVE" name="SAVE" class="btn-docs-input no-display" onclick="jscriptSaveFunction()">
				<input type="text" id="current-file" name="current-file" class="no-display"></input>
				<li class="btn-docs docs-save">
				<p class="hidden-tip-3">Guardar Archivo</p>
					<a href="#">
						<label for="SAVE" type="checkbox">
							<i class="fa fa-floppy-o fa-2x file-oper"></i>
						</label>
					</a>
				</li>
				<textarea type="text" name="contents-to-write" id="contents-to-write" class="no-display">
				</textarea>

			</ul>
		</form>
	</nav>
</header>
		<div class="barra-explorador">
			<div class="menu-explorador">
				<nav class="nav-barra-izq">
					<ul class="ul-default barra-busqueda">
							<li class="li-izq">
								<a class="a-izq" href="#">
									<label for="checkboxid" class="search-label">
										<i class="material-icons file-search">
											search
										</i>
									</label>
								</a>
							</li>
							<li class="li-borrar docs-delete">
								<p class="hidden-tip-4">Borrar Archivo En Uso??</p>
								<form action="" method="get" name="form-delete" onsubmit="return confirmDelete()">
									<a class="a-izq" href="#">
										<input type="submit" id="submit-delete" class="no-display">
											<label for="submit-delete">
												<i class="material-icons file-delete">
													delete
												</i>
											</label>
										</input>
									</a>
								<textarea type="text" name="file-to-delete" class="no-display" id="file-to-delete"></textarea>
								</form>
							</li>
					</ul>
				</nav>
			</div>
			<div class="folder-explorador">
				<div class="explorador-title">
					<a class="exp">EXPLORADOR</a>						
				</div>

			<form class="lista-dir" action="" method="get" name="forma-dir" id="forma-dir">
			<input type="checkbox" class="checkboxclass no-display" name="checkboxname" id="checkboxid" for="OPEN"/>
			<input id="full-name" name="full-name" class="textboxclass search-display"  type="text" placeholder="  abrir por direccion completa"></input>
			<input  class="no-display search-display" id="search-submit" type="submit" name="OPEN"></input>
				<ul class="lista-ul">
				<?php 
					echo php_file_tree(rtrim(realpath('index.php'), 'index.php'),"realpath('index.php')", $extensions = array()); 
				?>
				</ul> 			
			</form>		

			</div>
		</div>

	<p id="content-display"></p>
		<div class="editor-container">
			<div class="container">
		            <form name="langForm" class="lang-form">
					<input type="checkbox" class="show-lang-class no-display">
					<i class="material-icons lang-arrow" onclick="toggleSwitchView()">change_history</i>
		                <ul class="switch-container">
							<li class="switch-li">
		                    <input type="checkbox" name="js" onclick="
		                    	var editor = ace.edit('editor');editor.setTheme('ace/theme/idle_fingers');
		                            editor.session.setMode('ace/mode/javascript');
		                            toggleSwitchView();
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
		                    	var editor = ace.edit('editor');editor.setTheme('ace/theme/terminal');
									editor.session.setMode('ace/mode/php');
		                            toggleSwitchView();
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
		                            toggleSwitchView();
								" class="lang-select" id="html">
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
		                            toggleSwitchView();
								" class="lang-select" id="css">
		                        <label for="css" class="lang-btn" id="css" style="font-family: Lato;">
		                            <p>
		                                Css
		                            </p>
		                        </label>
		                    </input>
		                    </li>

		                    <li class="switch-li">
		                    <input type="checkbox" name="txt" onclick="
		                    	var editor = ace.edit('editor');editor.setTheme('ace/theme/twilight');
									editor.session.setMode('ace/mode/text');
		                            toggleSwitchView();
								" class="lang-select" id="txt">
		                        <label for="txt" class="lang-btn" id="txt" style="font-family: Lato;">
		                            <p>
		                               Txt
		                            </p>
		                        </label>
		                    </input>
		                    </li>

		                    <!-- <li class="switch-li">
		                    <input type="checkbox" name="java" onclick="
		                    	var editor = ace.edit('editor');editor.setTheme('ace/theme/merbivore_soft');
		                    									editor.session.setMode('ace/mode/java');
		                            toggleSwitchView();
		                    								" class="lang-select" id="java">
		                        <label for="java" class="lang-btn" id="java" style="font-family: Lato;">
		                            <p>
		                                Java
		                            </p>
		                        </label>
		                    </input>
		                    </li> -->

		                    <li class="switch-li">
		                    <input type="checkbox" name="myd" onclick="
		                    	var editor = ace.edit('editor');editor.setTheme('ace/theme/tomorrow_night_eighties');
								editor.session.setMode('ace/mode/sql');
								toggleSwitchView();
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
	        	echo htmlspecialchars(loadFile());
	        }?></pre>
	        <?php 
	        if (loadFile()!=file_get_contents('lib/txt/defaulttext.txt', "r")) {
	        	if (!empty($_GET["full-name"])) {
	        		echo '<p id="open-file-name" name="open-file-name">' . $_GET['full-name'] .'</p>';
	        	}
	        	else{
	        	echo '<p id="open-file-name" name="open-file-name">' . "..." .'</p>';
	        	}
	        }
	   			
	   		 ?>
			</div>
		</div>
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
<script src="lib/js/editor.js" type="text/javascript"></script>
	<script type="text/javascript">
        var editor = ace.edit("editor");
        editor.setTheme('ace/theme/idle_fingers');
        editor.session.setMode('ace/mode/javascript');
	</script>
</html>