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
	window.close();
}
var element;
function assignId(newId) {
	element = document.getElementsByName("LOAD");
	element.id=newId;
	document.getElementById("full-name").value=element.id;//assignId, then write to innerHTML of an invisible submit button
	//after submiting, use get to extract the info INSIDE the input field -> php
									//which was put there by document.getElementById("full-name").value
									//use that as file name and display
}
function confirmCreate(status){
	var newFileName = document.getElementById("nombre-completo").innerHTML;
}
function passElementId(passedId){
	document.getElementById("nombre-archivo2").value=passedId;//para conservar el valor del nombre introducido luego que hace sumbit la primera forma
}
function jscriptSaveFunction(){
	var code = editor.getValue();
	console.log(code);
	document.getElementById("contents-to-write").value=code;
	document.getElementById("current-file").value=document.getElementById("open-file-name").innerHTML;//assignId, then write to innerHTML of an invisible submit button
	console.log(document.getElementById("current-file").value);
}



 	/*var contents="";
	var nombreDocNuevo = document.getElementById("open-file-name").innerHTML;
	var ace_lines = document.getElementsByClassName("ace_line");
	for (var i = 0; i < ace_lines.length; i++) {
		var span_list = document.getElementsByTagName('SPAN');
		for (var x = 0; x < span_list.length; x++) {
			contents += span_list[x].innerHTML;
		}
		contents += "\n";
	}
	console.log(contents);
	alert("contents written");*/