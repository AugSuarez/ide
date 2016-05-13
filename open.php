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
            <li>Nombre y Extension: </li>
            <li>
                <input type="text" name="nombre-archivo"></input> . 
                    <select name="extension">
                        <option id="js" name="extension">js</option>
                        <option id="php" name="extension">php</option>
                        <option id="html" name="extension">html</option>
                        <option id="css" name="extension">css</option>
                        <option id="cpp" name="extension">cpp</option>
                        <option id="java" name="extension">java</option>
                        <option id="myd" name="extension">myd</option>
                        <option id="myd" name="extension">txt</option>
                    </select>
            </li>
            <li><input id="create" type="submit" name="CREATE" value="Guardar"></input></li>
    <script src="src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
    <script src="create.js" type="text/javascript" charset="utf-8"></script>

        <?php 
        function createFile() {
                $nombreArchivo = $_GET["nombre-archivo"];
                $extension = $_GET["extension"];
                $nombreCompleto = $nombreArchivo.".".$extension;
                echo '<p id="container-name">' . 'Archivo se Llama: ' . '\'' . '<span id="nombre-completo">' . $nombreCompleto . '</span>' . '\'' . '</p>';
                if (file_exists('C:\xampp\htdocs\$nombreCompleto')) {
                    echo 'Archivo ya existe!';
                }
                else echo '<script> myfunction();</script>';
            }
            if (isset($_GET["CREATE"])){
                createFile();
            }
        ?>
        </ul>
    </form>
</body>
</html>