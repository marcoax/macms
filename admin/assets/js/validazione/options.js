function validazione(){
   var msgErr2="";
   // UserName
      isVuoto(mainTab+'.name')
      if(fill=='')msgErr2+='Nome<br/>'
	  isVuoto(mainTab+'.value')
      if(fill=='')msgErr2+='Valore<br/>'
	  //creo messaggio di errore
     if(msgErr2!=""){notifyMsg(msgErr+msgErr2)}

     // se  vuoto  faccio il subnmit
     if (msgErr2==""){document.forms[0].submit()}
     else {return false}
}


