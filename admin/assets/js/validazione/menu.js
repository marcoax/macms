function validazione(){


   var msgErr="Please fill these fileds:\n"
   var msgErr2="";
   // UserName
      isVuoto(mainTab+'.Titolo')
      if(fill=='')msgErr2+='Titolo<br/>'
   	  
	  if(document.edit.elements[mainTab+".Data"]) {
         ceckDate(mainTab+".Data")
		 if(dateExists==false)msgErr2+="Data\n"
      }
	  
     //creo messaggio di errore
     if(msgErr2!=""){notifyMsg(msgErr+msgErr2)}

   // se  vuoto  faccio il subnmit
     if (msgErr2==""){document.forms[0].submit()}
     else {return false}
}