<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
	<title>menu</title>
	<link rel="stylesheet" href="estilos/estilo.css">
	<link rel="stylesheet" href="estilos/font-awesome.min.css">
	<link rel="stylesheet" href="icon-font-google/material-icons.css">
	<link rel="stylesheet" href="icon-font-win10/styles.css">
	<link rel="stylesheet" href="estilos/create.css">
    </head>
<body>
    <form method="get">
        <ul>
            <li class="li-default">Nombre y Extension: </li>
            <li class="li-default">
                <input type="text" name="nombre-archivo"></input> . 
                    <select name="extension">
                        <option id="js">js</option>
                        <option id="php">php</option>
                        <option id="html">html</option>
                        <option id="css">css</option>
                        <option id="cpp">cpp</option>
                        <option id="java">java</option>
                        <option id="myd">myd</option>
                        <option id="txt">txt</option>
                    </select>
            </li>
            <li class="li-default"><input id="create" type="submit" name="SAVE" value="Guardar"></input></li>
    <script src="src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
    <script src="editor.js" type="text/javascript" charset="utf-8"></script>

        <?php 
        function saveFile() {
                $nombreArchivo = $_GET["nombre-archivo"];
                $extension = $_GET["extension"];
                $nombreCompleto = $nombreArchivo.".".$extension;
                echo '<p id="container-name">' . 'Archivo se Llama: ' . '\'' . '<span id="nombre-completo">' . $nombreCompleto . '</span>' . '\'' . '</p>';
                if (file_exists('C:\xampp\htdocs\$nombreCompleto')) {
                    echo 'Archivo ya existe!';
                }
                else echo '<script> confirmSave();</script>';

            }
            if (isset($_GET["SAVE"])){
                saveFile();
            }
        ?>
        </ul>
    </form>
</body>
</html>