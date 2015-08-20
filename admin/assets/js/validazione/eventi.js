function validazione(){
   var msgErr2="";
      // Titolo
      isVuoto(mainTab+'.Title')
      if(fill=='')msgErr2+='Luogo<br/>'
	  
	  isVuoto(mainTab+'.subTitle')
      if(fill=='')msgErr2+='Descrizione Breve<br/>'
	  // data articolo
      if(document.edit.elements[mainTab+".Date"]) {
          if(document.edit.elements[mainTab+".Date"].value!="") {
          ceckDate(mainTab+".Date")
		  if(dateExists==false)msgErr2+="Data Sbagliata \n"
          }
		  else msgErr2+="Data Sbagliata  \n"
      }
	  //creo messaggio di errore
      if(msgErr2!=""){notifyMsg(msgErr+msgErr2)}
     // se  vuoto  faccio il subnmit
     if (msgErr2==""){document.forms[0].submit()}
     else {return false}
}


