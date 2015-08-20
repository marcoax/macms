function validazione(){
   var msgErr2="";
      // UserName
      isVuoto(mainTab+'.Label')
      if(fill=='')msgErr2+='Language<br>'
	  
       // UserName
      isVuoto(mainTab+'.Code')
      if(fill=='')msgErr2+='Language Code<br>'
    
    
     //creo messaggio di errore
      if(msgErr2!=""){notifyMsg(msgErr+msgErr2)}
     // se  vuoto  faccio il subnmit
     if (msgErr2==""){document.forms[0].submit()}
     else {return false}
}


