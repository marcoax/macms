function validazione(){
     var msgErr2="";
	  // Nome
      isVuoto(mainTab+'.Firstname')
      if(fill=='')msgErr2+='Nome<br>'
        // Nome
      isVuoto(mainTab+'.Surname')
      if(fill=='')msgErr2+='Cognome<br>'
     // UserName
      isVuoto(mainTab+'.Username')
      if(fill=='')msgErr2+='Username<br>'
	  // Email
      checkEmail(mainTab+'.Email')
      if(fill=='')msgErr2+='Formato Email non corretto <br>'
	  
	  // Email
      //checkEmail(mainTab+'.Email2')
      //if(fill=='')msgErr2+='Formato Email 2 non corretto <br>'
	  // Pwd
     
	  if(document.forms[0].elements[mainTab+'.PwdCambia']){
	     if(verifyPwdChangeValue(mainTab+'.PwdCambia',mainTab+'.PwdConferma')){
		  if(ma_getValue(mainTab+'.PwdCambia')!='')setValue(mainTab+'.Pwd',ma_getValue(mainTab+'.PwdCambia'))
		 }
		 else msgErr2+='Password e  conferma Password sono diverse<br>'
	  }
	   /*
	  isVuoto(mainTab+'.Pwd')
      if(fill=='')msgErr2+='Password<br>'
	  */
     //creo messaggio di errore
     if(msgErr2!=""){notifyMsg(msgErr+msgErr2)}

   // se  vuoto  faccio il subnmit
     if (msgErr2==""){document.forms[0].submit()}
     else {return false}
}

