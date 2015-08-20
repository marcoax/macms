function validazione(){
   var msgErr2="";
      // Titolo
      isVuoto(mainTab+'.Name')
      if(fill=='')msgErr2+='Titolo<br/>'
	  
	  if(document.edit.elements[mainTab+'.IdParent']){
         checkCombo(mainTab+'.IdParent')
          if(valore=="")msgErr2+="Categoria <br/>"
	  }
	  //creo messaggio di errore
      if(msgErr2!=""){notifyMsg(msgErr+msgErr2)}
     // se  vuoto  faccio il subnmit
     if (msgErr2==""){document.forms[0].submit()}
     else {return false}
}






