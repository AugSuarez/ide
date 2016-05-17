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
function confirmSave(){
	if(window.location.search == ""){
		alert("archivo no tiene nombre aun, creelo antes de guardar")
		return false;
	}
	else{
		if(confirm('desea sobreescribir?')){
			return true;
		}
		else
			return false;
	}
}
function confirmDelete(){
	if (confirm('Borrar el archivo en uso?')) {
		var sn = prompt('Para confirmar ingrese "si"');
		if (sn.toLowerCase() == "si"){
			alert("borrado");
			return true;
		}
		else{
			alert("archivo conservado");
			return false;
		}
	}
}
function toggleSwitchView(){
	var s = document.getElementsByClassName('show-lang-class');
	for (var i = 0; i < s.length; i++) {
		if(s[i].getAttribute("checked")==null){
			s[i].setAttribute("checked", "true");
			console.log(s[i].getAttribute("checked"));
		}
		else if(s[i].checked==true)
			s[i].removeAttribute("checked");
	}
}