<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
	<title>menu</title>
    <link rel="stylesheet" href="estilos/editor.css">
	<link rel="stylesheet" href="estilos/estilo.css">
	<link rel="stylesheet" href="estilos/font-awesome.min.css">
	<link rel="stylesheet" href="icon-font-google/material-icons.css">
	<link rel="stylesheet" href="icon-font-win10/styles.css">
    <link rel="stylesheet" href="estilos/create.css">
    <script src="src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
    <script src="lib/js/editor.js" type="text/javascript" charset="utf-8"></script>
    </head> 
<body>
    <form method="get" action="" id="check-form" class="check-form" onsubmit="">
        <ul>
            <li class="li-default">
                Nombre y Extension: 
            </li>
            <li class="li-default">
                <input type="text" name="nombre-archivo" id="nombre-archivo" placeholder="nombre"></input> . 
                <select name="extension">
                    <option id="js">js</option>
                    <option id="php">php</option>
                    <option id="html">html</option>
                    <option id="css">css</option>
                    <option id="cpp">cpp</option>
                    <option id="java">java</option>
                    <option id="myd">myd</option>
                    <option id="carpeta">Nueva Carpeta</option>
                    <option id="txt">txt</option>
                </select>
            </li>
            <li class="li-default">    
                <input type="submit" name="submit-check">
            </li>
        </ul>           
    </form>
    <?php 
        include("process.php");
    ?>
</body>
</html>