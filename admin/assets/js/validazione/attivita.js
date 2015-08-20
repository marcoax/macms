function validazione(){
	var msgErr2="";

	if(document.edit.elements[mainTab+".DateStart"]) {
		if(document.edit.elements[mainTab+".DateStart"].value!="") {
			ceckDate(mainTab+".DateStart")
			if(dateExists==false)msgErr2+="Wrong Date <br>"
		}
		else msgErr2+="Data  Scadenza<br>"
	}
	// Titolo
	isVuoto(mainTab+'.Name')
	if(fill=='')msgErr2+='Titolo<br/>'
		//creo messaggio di errore
		if(msgErr2!=""){notifyMsg(msgErr+msgErr2)}
	// se  vuoto  faccio il subnmit
	if (msgErr2==""){document.forms[0].submit()}
	else {return false}
}
