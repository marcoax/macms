function validazione(){
		var msgErr2="";
		// Nome
		isVuoto(mainTab+'.Firstname')
		if(fill=='')msgErr2+='Name<br>'
			// Surname
			isVuoto(mainTab+'.Surname')
			if(fill=='')msgErr2+='Surname<br>'
		
		// Email
		 var emailVal = $('#'+mainTab+'.Email').val() ;	
		fill=checkEmail(mainTab+'.Email')
		
		//isVuoto(mainTab+'.Email')
		if(fill==false)msgErr2+='Invalid Email <br>'
		
		
		
		if(document.forms[0].elements[mainTab+'.PwdCambia']){
		if(verifyPwdChangeValue(mainTab+'.PwdCambia',mainTab+'.PwdConferma')){
		if(ma_getValue(mainTab+'.PwdCambia')!='')setValue(mainTab+'.Pwd',ma_getValue(mainTab+'.PwdCambia'))
		}
		else msgErr2+='Password e conferma Password sono diverse<br>'
		}
		
		//creo messaggio di errore
		if(msgErr2!=""){notifyMsg(msgErr+msgErr2)}
		
		// se  vuoto  faccio il subnmit
		if (msgErr2==""){document.forms[0].submit()}
     else {return false}
}

