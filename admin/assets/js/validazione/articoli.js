function validazione(){
   var msgErr2="";
   // UserName
      isVuoto(mainTab+'.Code')
      if(fill=='')msgErr2+='Page Code<br>\n'
      // UserName
      isVuoto(mainTab+'.Name')
      if(fill=='')msgErr2+='Page Title<br>\n'
	  // data articolo
    
	  //creo messaggio di errore
      if(msgErr2!=""){notifyMsg(msgErr+msgErr2)}
     // se  vuoto  faccio il subnmit
     if (msgErr2==""){document.forms[0].submit()}
     else {return false}
}