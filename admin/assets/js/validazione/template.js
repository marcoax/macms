function validazione(){
   var msgErr2="";
   // UserName
      isVuoto(mainTab+'.Label')
      if(fill=='')msgErr2+='Title<br/>'
	  isVuoto(mainTab+'.Valore')
      if(fill=='')msgErr2+='Code<br/>'
	  //creo messaggio di errore
     if(msgErr2!=""){notifyMsg(msgErr+msgErr2)}

     // se  vuoto  faccio il subnmit
     if (msgErr2==""){document.forms[0].submit()}
     else {return false}
}


