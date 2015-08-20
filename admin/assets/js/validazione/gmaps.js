function validazione(){
   var msgErr2="";
      // Titolo
      isVuoto(mainTab+'.Name')
      if(fill=='')msgErr2+='Titolo<br/>'
	  
	  isVuoto(mainTab+'.City')
      if(fill=='')msgErr2+='Citta<br/>'
	  
      isVuoto(mainTab+'.Latitude')
      if(fill=='')msgErr2+='Latitudine<br/>'
      
      isVuoto(mainTab+'.Longitude')
      if(fill=='')msgErr2+='Longitudine<br/>'
	  //creo messaggio di errore
      if(msgErr2!=""){notifyMsg(msgErr+msgErr2)}
     // se  vuoto  faccio il subnmit
     if (msgErr2==""){document.forms[0].submit()}
     else {return false}
}


