function validazione(){
   var msgErr2="";
      // UserName
      isVuoto(mainTab+'.Title')
      if(fill=='')msgErr2+='Title<br/>'
	  // data articolo
      if(document.edit.elements[mainTab+".Date"]) {
          if(document.edit.elements[mainTab+".Date"].value!="") {
          ceckDate(mainTab+".Date")
		  if(dateExists==false)msgErr2+="Wrong  Date \n"
          }
		  else msgErr2+="Wrong  Date \n"
      }
	  //creo messaggio di errore
      if(msgErr2!=""){notifyMsg(msgErr+msgErr2)}
     // se  vuoto  faccio il subnmit
     if (msgErr2==""){document.forms[0].submit()}
     else {return false}
}


