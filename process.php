

<script type="text/javascript" src="phpFileTree-1.0/phpFileTree/php_file_tree.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> 
<script src="src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/js/editor.js" type="text/javascript"></script>
<?php

//make field with name dynamic, and make it so that if its empty or has an invalid extension
//set ace mode at create, load and save file
    function saveFile(){//called from index.php
        $contents=$_GET['contents-to-write'];
        $nombreDocNuevo=$_GET['current-file'];
        if (!file_exists($nombreDocNuevo)) {
            echo '<script>  alert("No se puede guardar un documento sin nombre")  </script>' .  
            '<script>  window.location.href  = "index.php"  </script>' ;
            return;
        }
        file_put_contents($nombreDocNuevo, $contents);
        echo '<script>  alert("Archivo ' . $nombreDocNuevo . ' guardado")  </script>';   
        echo '<script>  window.location.href  = "index.php?full-name='. $nombreDocNuevo . '&OPEN=Submit"  </script>';   
    }

    function createFile($nombre) {//called from create.php
        $newdoctext = file_get_contents('lib/txt/newdoctext.txt', "r");
        file_put_contents( $nombre, $nombre . "\n" . $newdoctext);
        echo '<script>  alert("Archivo: '. $nombre . ' creado")  </script>' .
        '<script> window.opener.location.href  = "index.php?full-name='. $nombre . '&OPEN=Submit" </script>' .
        '<script>  closeWin();  </script>';
    }
    function createDirectory($nombreDir){
        mkdir($nombreDir);
    }
    function getFullPath(){//for loadFile()
        $full_name="";
        if (!empty($_GET['full-name'])) {
            $full_name = realpath($_GET['full-name']);
        }
        return $full_name;
    }
	function loadFile(){
		$input_file=getFullPath();
        if (file_exists($input_file) && is_file($input_file)){
    		$output_file=file_get_contents($input_file, "r");
            if (!file_get_contents($input_file)){
                file_put_contents($input_file, "\n");
                $output_file=$input_file;
            }
        }

    	else if (!file_exists($input_file)){
            echo "/*ARCHIVO NO VALIDO: el archivo deseado no existe, Se cargo el contenido predeterminado*/\n";
            $output_file=file_get_contents('lib/txt/defaulttext.txt', "r");
        }
        else
            $output_file=file_get_contents('lib/txt/defaulttext.txt', "r");

        return $output_file;
	}

    if (isset($_GET['SHOW'])) {
        showContents();
        echo '<script> window.location.href="index.php" </script>';
    }
    if (!empty($_GET["submit-check"])) {//check if file already exists, if not, call createFile()
        $nombreArchivo = $_GET["nombre-archivo"];
        $extension = $_GET["extension"];
        if($extension == "Nueva Carpeta"){
            $nombreDocNuevo = $nombreArchivo;
        }
        else{
            $nombreDocNuevo = $nombreArchivo . "." . $extension;
        }
        if (file_exists(rtrim(realpath('index.php'), 'index.php') . $nombreDocNuevo)) {
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
    