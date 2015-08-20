function validazione(){
   var msgErr2="";
   
   
      // Titolo
      isVuoto(mainTab+'.Title')
      if(fill=='')msgErr2+='Titolo<br/>'
		  //descrizione
	  isVuoto(mainTab+'.numeroGiorni')
      if(fill=='')msgErr2+='<br/>'
    
    	  
    	  
	  //creo messaggio di errore
      if(msgErr2!=""){notifyMsg(msgErr+msgErr2)}
     // se  vuoto  faccio il subnmit
     if (msgErr2==""){document.forms[0].submit()}
     else {return false}
}

/*
var d = new Date();
var timezone = d.getTimezoneOffset();

var rightNow = new Date();
alert(rightNow);

var rightNow = new Date();
alert(String(String(rightNow).split("(")[1]).split(")")[0]);
*/

