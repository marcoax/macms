

// common value  and  variable
var msgErr  = "Prego compilare i seguenti campi:<br>"
var msgErr2 = "";


//verifico  se l'oggetto esiste e  se  � vuoto
function isVuoto(obj){
    this.obj=document.forms[0].elements[obj];
	
	fill=''
	// se l'oggetto  esiste
	if(this.obj){
	   // se � vuto
	   if(this.obj.value!='')fill=this.obj.value
    }
    else fill=true
    return fill
}

//verifico  se il valore dell'oggetto e un numero
function isNumber(obj){
   this.obj=document.forms[0].elements[obj];
  fill=''
   if(document.forms[0].elements[obj]){
     fill=document.forms[0].elements[obj].value;
	 if(isNaN(fill)&& fill!=''){fill=''}
	 else fill=true
   }
  else fill=true
  return fill
}

//cechk  e-mail
function checkEmail(obj) {
    
  
	objValue=document.forms[0].elements[obj].value;
  var  fill=false
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(objValue)){
      return fill=true
  }
  else return fill='';
}


//cechk  e-mail
function checkEmailVal(objValue) {
    
  

  var  fill=false
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(objValue)){
      return fill=true
  }
  else return false;
}

//  valida numero di telefono
function  validatePhoneNumber(obj){
  
  fill=true
  var stripped = curform.elements[obj].value.replace(/[\(\)\.\-\ ]/g, '');
  //strip out acceptable non-numeric characters
  if (isNaN(stripped) || stripped=='') {
	   return fill=''
  } 
  return fill
}


//  checco se  una  cambo  � stata settata
function checkCombo(obj){
     valore=""; 
	  if(document.forms[0].elements[obj].selectedIndex!=-1){
      index=document.forms[0].elements[obj].selectedIndex
	  valore=document.forms[0].elements[obj].options[index].value
	  }
	  return valore

}
//   checco un  radio button
function checkRadio(obj){
  radio_choice = false;
  butVal=''
  for (counter = 0; counter < document.forms[0].elements[obj].length; counter++){
       if (document.forms[0].elements[obj][counter].checked){
	      radio_choice = true; 
		  butVal=counter
	   }
  }
  return radio_choice;butVal;
} 
 
 
 //se e un numero
 function isNumero(obj){
   Numero='';
   if(document.forms[0].elements[obj]){
    // verifico  se  � un numero  con le  reg
    var x=document.forms[0].elements[obj].value
    var anum=/(^\d+$)|(^\d+\.\d+$)/
    if (anum.test(x)) Numero=true
  }
  else Numero=true
  return Numero;
}

// se la data  �  valida
function ceckDate(obj,forma){
 dateExists=true
 var monthLength = new Array(31,28,31,30,31,30,31,31,30,31,30,31);

 if(curData=document.forms[0].elements[obj]) curData=document.forms[0].elements[obj].value;
 else curData=$('#'+obj).val(); 

 arrData=curData.split('-');
 day=arrData[0];
 month=arrData[1];
 year=arrData[2]
 maxYear=2100;
 minYear=1900;

    if(arrData.length!=3)
	    dateExists = false;
    if (year/4 == parseInt(year/4))
		monthLength[1] = 29;
	if (day > monthLength[month-1])
		dateExists = false;
	if (month >12 || month<1)
		dateExists = false;
	if (year >maxYear || year<minYear)
	   dateExists = false;
	return dateExists;
}

function validateTime(obj) {
  var strval =document.forms[0].elements[obj].value;
  var pos1 = strval.indexOf(':');
  
  minVal=strval.substring(pos1+1,pos1 + 3)
  if (strval.indexOf(":") == -1) {
      return false;
  } 
  else if(minVal>59){
  return false;
  }
  else if(pos1>3){
  return false;
  }
  else {
      return true;
  }
}
 
function compareDates(date1,date2) {
	var d1=getDateFromFormat(date1);
	var d2=getDateFromFormat(date2);
	if (d1==0 || d2==0) {
		return -1;
		}
	else if (d1 > d2) {
		return 1;
		}
	return 0;
}

function getDateFromFormat(val) {
  
      arrData=val.split('-');
      day=arrData[0];
      month=arrData[1];
      year=arrData[2]
	  return  val=arrData[2]+arrData[1]+arrData[0]
   
}



function ma_getValue(obj){
	if (obj === undefined) return false;
	else return  document.forms[0].elements[obj].value;
}

function setValue(obj,value){
  return document.forms[0].elements[obj].value=value;
}

function setDefault(obj) {
  document.forms[0].elements[obj].selectedIndex=0
}

function setIndex(obj,Indice) {
   document.forms[0].elements[obj].selectedIndex=Indice
}


function getIndex(obj) {
   document.forms[0].elements[obj].selectedIndex
}

function ricarica(modo,id){
 if(modo=="del"){
    var conf=confirm("Are you sure you want to delete this record???")
	if (conf!=true) return
  }
  document.forms[0].mode.value=modo
  document.forms[0].curId.value=id
  loca=location.href.split('?')
  document.forms[0].action=loca[0]
  document.forms[0].submit()
}


function validaData(obj){
 ceckDate(obj)
 if(dateExists==false){
  alert("Data Sbagliata")
 }
}



function autoFill(obj,value){
   if(document.forms[0].elements[obj] && mode=='up')document.forms[0].elements[obj].value=value
}



function veriDateLista(value,obj){
  if(!veriDate(value,obj)){
      alert('Wrong data or Data format\nData must be  dd-mm-yyyy')
  }
}
function veriDate(valore,obj){
 dateExists=true
 var monthLength = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
 var re = new RegExp ('/', 'gi') ;
  
 curData = valore.replace(re, '-') ;
 if(obj)obj.value=curData;
 arrData=curData.split('-');
 day=arrData[0];
 month=arrData[1];
 year=arrData[2]
 maxYear=2100;
 minYear=1900;
 
    if(arrData.length!=3)
	    dateExists = false;
    if (year/4 == parseInt(year/4))
		monthLength[1] = 29;
	if (day > monthLength[month-1])
		dateExists = false;
	if (month >12 || month<1)
		dateExists = false;
	if (year >maxYear || year<minYear)
	   dateExists = false;
	return dateExists;
}

function veriNumeroLista(obj){
  if(!veriNumero(obj))alert('Must be a number\nPlease replace comma with dot')
}


function verifyPwdChangeValue(obj,objConferma){
  pwd=ma_getValue(obj)
  pwdConferma=ma_getValue(objConferma)
  if(pwdConferma!=pwd) return false;
  else return true;
}



