function validazione(){
  var msgErr2="";
      // Titolo
      isVuoto(mainTab+'.Title')
      if(fill=='')msgErr2+='Oggetto<br/>'
	  
	   if(document.edit.elements[mainTab+".Data"]) {
          if(document.edit.elements[mainTab+".Data"].value!="") {
          ceckDate(mainTab+".Data")
		  if(dateExists==false)msgErr2+="Data Sbagliata \n"
          }
		  else msgErr2+="Data Inizio  \n"
      }
	  isVuoto(mainTab+'.Descrizione')
      if(fill=='')msgErr2+='Testo<br/>'
	  //creo messaggio di errore
      if(msgErr2!=""){notifyMsg(msgErr+msgErr2)}
      // se  vuoto  faccio il subnmit
      if (msgErr2==""){document.forms[0].submit()}
      else {return false}
}


