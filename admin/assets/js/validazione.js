var curform=document.forms["loginform"];
// validate  the  email in t he  forfot pwd
function validaEmail(){

curform=document.forms["forgot"];

var msgErr="Please fill these fileds:\n"
	var msgErr2="";
	  //validate  email 
	  isVuoto('forgotEmail')
	  if(fill=='')msgErr2+='E Mail\n'
	  //creo messaggio di errore 
	  if(msgErr2!=""){
			alert(msgErr+msgErr2)
	 }
	    
     // se  vuoto  faccio il subnmit		 
	 if (msgErr2=="" && prima!=1){
	        prima=1;
		   curform.submit();
		   return true
	 }
	 else {return false}

}


// validate  the  email in t he  forfot pwd
function validaLogin(){
curform=document.forms["loginform"];
var msgErr="Please fill these fileds:\n"
	var msgErr2="";
	  //validate  email 
	  isVuoto('email')
	  if(fill=='')msgErr2+='E Mail\n'
	  isVuoto('password')
	  if(fill=='')msgErr2+='Password\n'
      //creo messaggio di errore 
	  if(msgErr2!=""){alert(msgErr+msgErr2)}
	  // se  vuoto  faccio il subnmit		 
	  if (msgErr2=="" && prima!=1){
	        prima=1;
		   curform.submit();
		   return true
	 }
	 else {return false}

}



// validate  the  email in t he  forfot pwd
function validaRicerca(){
curform=document.forms["ricerca"];
var msgErr="Please fill one of this fields:\n"
var msgErr2="";
	 IdTypeVal='';
	 IdArea='';
    
	 if(curform.elements["IdType"]){
				checkCombo("IdType")
				if(valore=="")msgErr2+="Select Seminar Type \n"
	  }
	 
	  if(curform.elements["IdSubType"]){
				checkCombo("IdSubType")
				if(valore=="")msgErr2+="Select Seminar Category \n"
	  }
	    if(curform.elements['cmscustomer.Zipcode']){
	     validateUSZip('cmscustomer.Zipcode')
	     if(fill=='')msgErr2+='Enter  a  valid ZIP code\n'
	  }
	 //creo messaggio di errore 
	 if(msgErr2!=""){
			alert(msgErr+msgErr2)
	 }
	 // se  vuoto  faccio il subnmit		 
	  if (msgErr2=="" && prima!=1){
	        prima=1;
		   curform.submit();
		   return true
	 }
	 else {return false}
}


function validaZip(){
curform=document.forms["ricerca"];
var msgErr="\n"
var msgErr2="";
	 IdTypeVal='';
	 IdArea='';
	 
	 if(curform.elements['Zipcode']){
	   validateUSZip('Zipcode')
	     if(fill=='')msgErr2+='Please provide a  valid ZIP code\n'
	  }
    
	 //creo messaggio di errore 
	 if(msgErr2!=""){
			alert(msgErr+msgErr2)
	 }
	 // se  vuoto  faccio il subnmit		 
	  if (msgErr2=="" && prima!=1){
	        prima=1;
		   curform.submit();
		   return true
	 }
	 else {return false}
}



function validaZipPop(){
curform=document.forms["ricerca"];
var msgErr="\n"
var msgErr2="";
	 IdTypeVal='';
	 IdArea='';
	 
	 if(curform.elements['Zipcode']){
	   validateUSZip('Zipcode')
	     if(fill=='')msgErr2+='Please provide a  valid ZIP code\n'
	  }
    
	 //creo messaggio di errore 
	 if(msgErr2!=""){
			alert(msgErr+msgErr2)
	 }
	 // se  vuoto  faccio il subnmit		 
	  if (msgErr2=="" && prima!=1){
	        prima=1;
		  // curform.submit();
		   window.opener.document.location.href="searchSeminar.php?Zipcode="+curform.elements['Zipcode'].value+"&IdSubType="+curform.elements['IdSubType'].value
		   window.close()
		   return true
	 }
	 else {return false}
	 }



// avoid  user   multiple  sub
prima=0
function validaPwd(){
 curform=document.forms["register"];
 var msgErr="Please fill these fileds:\n"
 var msgErr2="";
 isVuoto('cmscustomer.NewPwd')
 newPwd=fill;
 if(fill=='')msgErr2+='Password\n'
 isVuoto('cmscustomer.cNewPwd')
 cPwd=fill
 if(fill=='')msgErr2+='Confirm Password\n'
 if(newPwd!=cPwd)msgErr2+='Confirm Password and  password  must  be  the  same\n'
  //creo messaggio di errore 
	 if(msgErr2!=""){
			alert(msgErr+msgErr2)
	 }
    // se  vuoto  faccio il subnmit		 
    if (msgErr2=="" && prima!=1){
	    prima=1;
	    curform.submit();
		return true
	 }
	 else {return false}
}




// validate  the  email in t he  forfot pwd
function validaRegister(){

curform=document.forms["register"];
var msgErr="Please fill these fileds:\n"
var msgErr2="";
fill='.'
mainTab='cmscustomer'

      if(curform.elements["cmscustomer.Email"]){
	     checkEmail('cmscustomer.Email')
	     if(fill=='')msgErr2+=' Please Enter a  valid E-Mail\n'
	  }
	
	  isVuoto('cmscustomer.Pwd')
	  if(fill=='')msgErr2+='Password\n'
	  isVuoto('cmscustomer.cPwd')
	  if(fill=='')msgErr2+='Confirm Password\n'
	  if(curform.elements["cmscustomer.IdCountry"]){
	     checkCombo("cmscustomer.IdCountry")
		 if(valore=="")msgErr2+="Country \n"
	  }
		  
      // Nome
      isVuoto(mainTab+'.Firstname')
      if(fill=='')msgErr2+='Firstname\n'
      // Nome
      isVuoto(mainTab+'.Surname')
      if(fill=='')msgErr2+='Surname\n'
      
	  isVuoto(mainTab+'.Address')
      if(fill=='')msgErr2+='Address\n'
	  
	  isVuoto(mainTab+'.Zipcode')
      if(fill=='')msgErr2+='Zip code\n'
	  isVuoto(mainTab+'.City')
      if(fill=='')msgErr2+='City\n'
	  
	  isVuoto(mainTab+'.State')
      if(fill=='')msgErr2+='State\n'
	  
	  if(curform.elements[mainTab+'.WorkPhone']){
	    validatePhoneNumber(mainTab+'.WorkPhone')
	    if(fill=='')msgErr2+='Work Phone\n'
	  }
	  
	   if(curform.elements[mainTab+'.Phone']){
	    validatePhoneNumber(mainTab+'.Phone')
	    if(fill=='')msgErr2+='Home Phone\n'
	  }
      if(curform.elements["cmscustomerinfo.IdEvent"]){
				checkCombo("cmscustomerinfo.IdEvent")
				if(valore=="")msgErr2+="Select Seminar \n"
	  }
	  
	  
	  isVuoto('cmscustomerinfo.How')
      if(fill=='')msgErr2+='How did you hear about this seminar \n'
	  isVuoto('cmscustomerinfo.Note')
      if(fill=='')msgErr2+='Best Time to Call and Other Comments \n'
  
   //creo messaggio di errore 
   if(msgErr2!=""){alert(msgErr+msgErr2)}
	    
   // se  vuoto  faccio il subnmit		 
   if (msgErr2=="" && prima!=1){
	   prima=1;
	   curform.submit();
	   return true
   }
   else {return false}
}




// validate  the  email in t he  forfot pwd
function validaRegisterCall(){

curform=document.forms["register"];
var msgErr="Please fill these fileds:\n"
var msgErr2="";
fill='.'
mainTab='cmscustomer'
 
         if(curform.elements['cmscustomer.Email'].value!=''){
	     checkEmail('cmscustomer.Email')
	     if(fill=='')msgErr2+=' Please Enter a  valid E-Mail\n'
	
	 
	 
	  isVuoto('cmscustomer.Pwd')
	  if(fill=='')msgErr2+='Password\n'
	  isVuoto('cmscustomer.cPwd')
	  if(fill=='')msgErr2+='Confirm Password\n'
	  }
	  
	  if(curform.elements["cmscustomer.IdCountry"]){
	     checkCombo("cmscustomer.IdCountry")
		 if(valore=="")msgErr2+="Country \n"
	  }
		  
      // Nome
      isVuoto(mainTab+'.Firstname')
      if(fill=='')msgErr2+='Firstname\n'
      // Nome
      isVuoto(mainTab+'.Surname')
      if(fill=='')msgErr2+='Surname\n'
      
	  isVuoto(mainTab+'.Address')
      if(fill=='')msgErr2+='Address\n'
	  
	  isVuoto(mainTab+'.Zipcode')
      if(fill=='')msgErr2+='Zip code\n'
	  isVuoto(mainTab+'.City')
      if(fill=='')msgErr2+='City\n'
	  
	  isVuoto(mainTab+'.State')
      if(fill=='')msgErr2+='State\n'
	  
	  if(curform.elements[mainTab+'.WorkPhone']){
	    validatePhoneNumber(mainTab+'.WorkPhone')
	    if(fill=='')msgErr2+='Work Phone\n'
	  }
	  
      if(curform.elements["cmscustomerinfo.IdEvent"]){
				checkCombo("cmscustomerinfo.IdEvent")
				if(valore=="")msgErr2+="Select Seminar \n"
	  }
	  
	  
	  isVuoto('cmscustomerinfo.How')
      if(fill=='')msgErr2+='How did you hear about this seminar \n'
	  isVuoto('cmscustomerinfo.Note')
      if(fill=='')msgErr2+='Best Time to Call and Other Comments \n'

   //creo messaggio di errore 
   if(msgErr2!=""){alert(msgErr+msgErr2)}
	    
   // se  vuoto  faccio il subnmit		 
   if (msgErr2=="" && prima!=1){
	   prima=1;
	   curform.submit();
	   return true
   }
   else {return false}
}

//  validazione  resche
function validaRe(){

curform=document.forms["register"];
var msgErr="Please fill these fileds:\n"
var msgErr2="";

	mainTab='cmsuser'
    if(curform.elements["cmscustomerinfo.IdEvent"]){
		checkCombo("cmscustomerinfo.IdEvent")
		if(valore=="")msgErr2+="Select Seminar \n"
    }

    isVuoto('cmscustomerinfo.How')
    if(fill=='')msgErr2+='How did you hear about this seminar \n'
	  
	isVuoto('cmscustomerinfo.Note')
    if(fill=='')msgErr2+='Best Time to Call and Other Comments \n'
    
	 //creo messaggio di errore 
	 if(msgErr2!=""){
			alert(msgErr+msgErr2)
	 }
	    
    // se  vuoto  faccio il subnmit		 
	  if (msgErr2=="" && prima!=1){
	        prima=1;
		   curform.submit();
		   return true
	 }
	 else {return false}
}



//  validazione  amico
function validaPwd(){

curform=document.forms["amico"];
var msgErr="Please fill these fileds:\n"
var msgErr2="";

	
    isVuoto('user')
    if(fill=='')msgErr2+='Username \n'
	
	isVuoto('pwd')
    if(fill=='')msgErr2+='Password \n'
	else {
	checkEmail('pwd')
	     if(fill=='')msgErr2+=' Please Enter a  valid E-Mail\n'
	} 
	
    
	 //creo messaggio di errore 
	 if(msgErr2!=""){
			alert(msgErr+msgErr2)
	 }
	    
    // se  vuoto  faccio il subnmit		 
	  if (msgErr2=="" && prima!=1){
	        prima=1;
		   curform.submit();
		   return true
	 }
	 else {return false}
}

//  validazione  spedizione codice video
function validaVideo(){

curform=document.forms["amico"];
var msgErr="Please fill these fileds:\n"
var msgErr2="";
    if(curform.spedito.value!=1){
	 isVuoto('Code')
	if(fill=='')msgErr2+='Access Code \n'
    }
	else {
	if(curform.elements['Code'])curform.Code.value=''
	}
	isVuoto('Email')
    if(fill=='')msgErr2+='Email \n'
	else {
	checkEmail('Email')
	     if(fill=='')msgErr2+=' Please Enter a  valid E-Mail\n'
	}
	
	  
	
    
	 //creo messaggio di errore 
	 if(msgErr2!=""){
			alert(msgErr+msgErr2)
	 }
	    
    // se  vuoto  faccio il subnmit		 
	  if (msgErr2=="" && prima!=1){
	        prima=1;
			curform.submit();
		   return true;
	 }
	 else {return false}
}






/***************************
validazione  instructor new  enroll



*****************************/
// validate  the  email in t he  forfot pwd
function validaIn(){

curform=document.forms["register"];
var msgErr="Please fill these fileds:\n"
var msgErr2="";
fill='.'
mainTab='cmsenrollinstructor'
 if(curform.elements["privacy"].checked==true){
      if(curform.elements[mainTab+".Email"]){
	     checkEmail(mainTab+'.Email')
	     if(fill=='')msgErr2+=' Please Enter a  valid E-Mail\n'
	  }
	
			  
      // Nome
      isVuoto(mainTab+'.Firstname')
      if(fill=='')msgErr2+='Firstname\n'
      // Nome
      isVuoto(mainTab+'.Surname')
      if(fill=='')msgErr2+='Surname\n'
      
	  isVuoto(mainTab+'.Address')
      if(fill=='')msgErr2+='Address\n'
	  
	  isVuoto(mainTab+'.Zipcode')
      if(fill=='')msgErr2+='Zip code\n'
	  isVuoto(mainTab+'.City')
      if(fill=='')msgErr2+='City\n'
	  
	  isVuoto(mainTab+'.State')
      if(fill=='')msgErr2+='State\n'
	  
	  if(curform.elements[mainTab+'.WorkPhone']){
	    validatePhoneNumber(mainTab+'.WorkPhone')
	    if(fill=='')msgErr2+='Work Phone\n'
	  }
	  
      
     }
   else { msgErr2+="You have to give your consent to use the data you provided us with\n"}
   //creo messaggio di errore 
   if(msgErr2!=""){alert(msgErr+msgErr2)}
	    
   // se  vuoto  faccio il subnmit		 
   if (msgErr2=="" && prima!=1){
	   prima=1;
	   curform.submit();
	   return true
   }
   else {return false}
}


// validate  la  registrazione  per  la  notifica
function validaOnlineCall(){

curform=document.forms["register"];
var msgErr="Please fill these fileds:\n"
var msgErr2="";
fill='.'

mainTab='cmscustomernotify'
 
      if(curform.elements[mainTab+".Email"]){
	     checkEmail(mainTab+'.Email')
	     if(fill=='')msgErr2+=' Please Enter a  valid E-Mail\n'
	  }
	
			  
      // Nome
      isVuoto(mainTab+'.Firstname')
      if(fill=='')msgErr2+='Firstname\n'
      // Nome
      isVuoto(mainTab+'.Surname')
      if(fill=='')msgErr2+='Surname\n'
      
	  isVuoto(mainTab+'.Address')
      if(fill=='')msgErr2+='Address\n'
	  
	  isVuoto(mainTab+'.Zipcode')
	  if(fill=='')msgErr2+='Zipcode\n'
    
    

   //creo messaggio di errore 
   if(msgErr2!=""){alert(msgErr+msgErr2)}
	    
   // se  vuoto  faccio il subnmit		 
   if (msgErr2=="" && prima!=1){
	   prima=1;
	   curform.submit();
	   return true
   }
   else {return false}
}

//   validazione   notifica on line call

/*****************************************
Inizio  funzioni  di  validazione
******************************************/


//  e-mail validation
function checkEmail(obj) {
  fill=''
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(curform.elements[obj].value)){
    return fill=true
  }
  return fill
}


// valida Data
function validaData(obj){
 ceckDate(obj)
 if(dateExists==false){
  alert("Data Sbagliata")
 }
}



//verifico  se l'oggetto esiste e  se  � vuoto
function isVuoto(obj){
 fill=''
 // se l'oggetto  esiste
 if(curform.elements[obj]){
	  // se � vuto
	  if(curform.elements[obj].value!='')fill=curform.elements[obj].value
 }
 else fill=true
 return fill
}

//verifico  se l'oggetto esiste e  se  � vuoto
function isLungo(obj,lung){

 fill=''
 // se l'oggetto  esiste
 if(curform.elements[obj]){
	  // se � vuto
	  if(curform.elements[obj].value!='' && curform.elements[obj].value.length==lung)fill=curform.elements[obj].value
 }
 else fill=true
 return fill
}


//verifico  se il valore dell'oggetto e un numero
function isNumber(obj){
 fill=''
    // se l'oggetto  esiste
 if(curform.elements[obj]){
  // se � vuto
  fill=curform.elements[obj].value;
  if(isNaN(fill)&& fill!=''){fill=''}
  else fill=true
 }
 else fill=true
 return fill
}



// se la data  �  valida
function ceckDate(obj){
dateExists=true
var monthLength = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
curData=curform.elements[obj].value
arrData=curData.split('-');
day=arrData[0];
month=arrData[1];
year=arrData[2]
maxYear=2100;
minYear=1900;
 
  if(arrData.length!=3)dateExists = false;
  if (year/4 == parseInt(year/4))monthLength[1] = 29;
  if (day > monthLength[month-1])dateExists = false;
  if (month >12 || month<1)dateExists = false;
  if (year >maxYear || year<minYear)dateExists = false;
  return dateExists;
}


//  checco se  una  cambo  � stata settata
function checkCombo(obj){
      valore=""; 
	 
	  if(curform.elements[obj].selectedIndex!=-1){
        index=curform.elements[obj].selectedIndex
	    valore=curform.elements[obj].options[index].value
	  }
	  return valore

}


//   checco un  radio button
function checkRadio(obj){
    radio_choice = false;
    butVal=''
    for (counter = 0; counter < curform.elements[obj].length; counter++){
        if (curform.elements[obj][counter].checked){
		     radio_choice = true; 
			 butVal=counter
	    }
    }
    return radio_choice;butVal;
} 
 

function  validatePhoneNumber(obj){

  fill=true
  var stripped = curform.elements[obj].value.replace(/[\(\)\.\-\ ]/g, '');
  //strip out acceptable non-numeric characters
  if (isNaN(stripped) || stripped=='') {
	   
	   return fill=''
  } 
  return fill
}


function validateUSZip( obj ) {
/************************************************
DESCRIPTION: Validates that a string a United
  States zip code in 5 digit format or zip+4
  format. 99999 or 99999-9999
    
PARAMETERS:
   strValue - String to be tested for validity
   
RETURNS:
   True if valid, otherwise false.

*************************************************/
fill=true
 strValue = curform.elements[obj].value
var objRegExp  = /(^\d{5}$)|(^\d{5}-\d{4}$)/;
 
 if(!objRegExp.test(strValue)){ fill=''}
 
  //check for valid US Zipcode
  return fill;
}











