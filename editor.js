
var mywindow;
	function openWin(link, windowName) {
		if (! window.focus) return true;
		var href;
		if(typeof(link) == 'string')
			href=link;
		else
			href=link.href;
		mywindow = window.open(href, windowName, 'width=700, height=220, left= 200, top=100, directories=no, scrollbars=yes');
		return false;
	}
	function closeWin() {
		mywindow = window.close();
	}
//-----------START SAVE FUNCTIONS---------------------
function confirmSave(){
	var myString= document.getElementById("nombre-completo").innerHTML;
    if(confirm("\n" + myString + " no existe, guardar?")){
        alert(myString + " Guardado");
    	closeWin();
    }
    else
        alert(myString + " no Guardado");
}
function saveAlert() {
	alert("Archivo Guardado!");
	window.location.href = 'index.php';
}
//-----------END SAVE FUNCTIONS---------------------

function loadContent() {
	var contenido=document.getElementById('default-content').innerHTML;
	document.getElementById('content-display').innerHTML='asdfasdf';
}
var element;
function assignId(element2) {
	element = document.getElementsByName("LOAD");
	element.id=element2;
	alert("buscando " + element.id + "...");
	document.getElementById("full-name").value=element.id;//assignId, then write to innerHTML of an invisible submit button
	document.forms["OPEN"].submit();//after submiting, use get to extract the info INSIDE the input field -> php
									//which was put there by document.getElementById("full-name").value
									//use that as file name and display
}
