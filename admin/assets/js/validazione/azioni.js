function validazione(){
   var msgErr2="";
      // UserName
      isVuoto(mainTab+'.Title')
      if(fill=='')msgErr2+='Titolo<br>'
	  // data articolo
     //creo messaggio di errore
      if(msgErr2!=""){notifyMsg(msgErr+msgErr2)}
     // se  vuoto  faccio il subnmit
     if (msgErr2==""){document.forms[0].submit()}
     else {return false}
}


