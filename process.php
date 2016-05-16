

<script type="text/javascript" src="phpFileTree-1.0/phpFileTree/php_file_tree.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> 
<script src="src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/js/editor.js" type="text/javascript"></script>
<?php

    function showContents(){
    }

    function saveFile(){//called from index.php
        echo '<script>  alert(document.getElementById("open-file-name").innerHTML)  </script>' ;
    }
    function checkAvailable(){
        
    }
    function createFile($nombre) {//called from create.php
        $newdoctext = file_get_contents('lib/txt/newdoctext.txt', "r");
        file_put_contents( $nombre, $newdoctext);
        echo '<script>  alert("Archivo: '. $nombre . ' creado")  </script>' .
        '<script> window.opener.location.reload() </script>' .
        '<script>  closeWin();  </script>';
    }
    function createDirectory($nombreDir){
        mkdir($nombreDir);
    }
    function getFullPath(){//for loadFile()
    	$full_name = realpath($GLOBALS['full_name']);
        return $full_name;
    }
	function loadFile(){
		$input_file=getFullPath();
    	if(is_file($input_file))
    		$output_file=file_get_contents($input_file, "r");
    	else
    		echo "/*ARCHIVO NO VALIDO: */";
    	if (!file_exists($input_file)){
            echo "el archivo deseado no existe";
    	}

		if (!file_get_contents($input_file)){
	    	echo "//ARCHIVO NO SE PUDO ABRIR! Se cargo el contenido predeterminado\n";
		  $output_file=file_get_contents('lib/txt/defaulttext.txt', "r");
		}
        return $output_file;
	}

    if (isset($_GET['SHOW'])) {
        showContents();
        echo '<script> window.location.href="index.php" </script>';
    }
    if (!empty($_GET["submit-check"])) {
        $nombreArchivo = $_GET["nombre-archivo"];
        $extension = $_GET["extension"];
        if($extension == "Nueva Carpeta"){
            $nombreDocNuevo = $nombreArchivo;
        }
        else{
            $nombreDocNuevo = $nombreArchivo . "." . $extension;
        }
        if (file_exists('C:\xampp\htdocs\ide\\' . $nombreDocNuevo)) {
            echo '<script> alert("'. $nombreDocNuevo .' ya existe en el directorio indicado!") </script>';
            return;
        }
        else{
            if ($extension=="Nueva Carpeta") {
                createDirectory($nombreDocNuevo);
            }
            else{
                createFile($nombreDocNuevo);
            }
        }
    }
    if (!empty($_GET["SAVE"])) {//called from index.php
        saveFile();
    }