function validazione(){
     var msgErr2="";
     // User
     isVuoto(mainTab+'.Username')
     if(fill=='')msgErr2+='Username<br/>'
	 // Pwd
	 isVuoto(mainTab+'.pwd')
     if(fill=='')msgErr2+='Password<br/>'
     //create error  message
     if(msgErr2!=""){notifyMsg(msgErr+msgErr2)}
     // se  vuoto  faccio il subnmit
     if (msgErr2==""){document.forms[0].submit()}
     else {return false}
}