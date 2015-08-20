function validazione(){
   var msgErr2="";
      // Titolo
      isVuoto(mainTab+'.Name')
      if(fill=='')msgErr2+='Titolo\n'
	  
	  isVuoto(mainTab+'.Intro')
      if(fill=='')msgErr2+='Descrizione\n'
	  // data articolo
      if(document.edit.elements[mainTab+".DateStart"]) {
          if(document.edit.elements[mainTab+".DateStart"].value!="") {
          ceckDate(mainTab+".DateStart")
		  if(dateExists==false)msgErr2+="Data Sbagliata \n"
          }
		  else msgErr2+="Data   \n"
      }
	  //creo messaggio di errore
      if(msgErr2!=""){alert(msgErr+msgErr2)}
     // se  vuoto  faccio il subnmit
     if (msgErr2==""){document.forms[0].submit()}
     else {return false}
}


