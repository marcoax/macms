var  curItem;
var urlAjaxHandlerCms=serverPath+'cms/view/ajax/index.php/';; // percorso  del contenuto del  dialog
$(document).ready(function() {
    //  gestione  check  box  liste
	$('input.checkbox').click(function() {		var itemSel = countItemclick();		if (itemSel > 0) {			$('#toolbar_cerca').hide();
						if(itemSel==1) {                curItem=$("input.checkbox:checked").val()				$('#editButtonHandler').show();			}			else $('#editButtonHandler').hide();			$('#list-action-bar').fadeIn('1000');
		} else {			$('#list-action-bar').hide();			$('#toolbar_cerca').fadeIn('1000');
		}	 });
	
	//gestione  finestre  modali
  
    $('[data-toggle="modal"]').click(function(e) {
       e.preventDefault();
       var href = $(this).attr('href');
       if (href.indexOf('#') == 0) {
           $(href).modal('open');
       } else {
    	   
    	   alert(  href)
           $.get(href, function(data) {
               $('<div class="modal" >' + data + '</div>').modal();
           }).success(function() { $('input:text:visible:first').focus(); });
       }
     });

});



function countItemclick() {
	var n = $("input.checkbox:checked").length;
	return n;
}

function actionHandler(actionTypeVal) {
	
	var callback = function() {
		curForm=document.forms[0];
        curForm.actionType.value=actionTypeVal;
        curForm.submit()
    }; 
    confirm(t("Warning"), t(actionTypeVal+'Item'), t("No"), t("Yes"), callback);
}


function actionHandlerEdit(actionTypeVal) {
	if(document.forms[0].elements['Dominio['+curItem+']'])curSez=document.forms[0].elements['Dominio['+curItem+']'].value;
	else curSez=Id_sez;
	if(document.forms[0].elements['Id_sub'])curIdSub=document.forms[0].elements['Id_sub'].value;
	else curIdSub='';
	
	location.href=serverPath+'edit.php?Id_sez='+curSez+'&Id_sub='+curIdSub+'&Id='+curItem+'&mode=edit'
}



/****************************************relation  **********************/
function addRelation(type,IdObjectA){
	

   	var IdObjectBVal=$('#'+type).val();
    targetObj=type+'List';
    var IdObjectB=$('#'+type).val()
   
	 $.ajax({
         url: urlAjaxHandlerCms+'relation/insert/'+type, 
         data: {actionType:'addRelationItem',
 			   Id:IdObjectA,
 			   IdObjectB:IdObjectB,
 			   value:IdObjectBVal, 
               Dominio:type
 		   },
         get: "POST",
     
         cache: false,
         success: function(code){
        	
        		 $('#'+targetObj).html(code);
             
         },
         error:function (xhr, ajaxOptions, thrownError){
             alert('Something went Wrong please<br><br>'+xhr.responseText+thrownError);
         }
       }
     );
}


function addTaskRelation(type,IdObjectA){
	

   	var IdObjectBVal=$('#'+type).val();
    targetObj=type+'List';
    var IdObjectB=0;//  uso la  relation ma non ho   nessun id  asegno  solo del  contenuto  ad una  to doslist
   
	 $.ajax({
         url: urlAjaxHandlerCms+'relation/insert/'+type, 
         data: {actionType:'addRelationItem',
 			   Id:IdObjectA,
 			   IdObjectB:IdObjectB,
 			   value:IdObjectBVal, 
               Dominio:type
 		   },
         get: "POST",
     
         cache: false,
         success: function(code){
        	
        		 $('#'+targetObj).html(code);
             
         },
         error:function (xhr, ajaxOptions, thrownError){
             alert('Something went Wrong please<br><br>'+xhr.responseText+thrownError);
         }
       }
     );
}



function   validateShareRelation (type,IdObjectA){
	var IdObjectBVal=$('#'+type).val();
	$('#errorBoxShare').hide();
	if(checkEmailVal(IdObjectBVal)==false)notifyMsg(t('registerEmail'),'errorBoxShare');
	else{
		 $.ajax({
	         url: urlAjaxHandlerCms+'/validate/ckUserRelation', 
	         data: {mailpre:IdObjectBVal,
	        	    Dominio:type,
	        	    Id:IdObjectA},
	         dataType: 'json',
	         cache: false,
	         success: function(code){
	        	 if(code.status=='OK') {
	        		 addRelation(type,IdObjectA);
	             }
	        	 else if(code.status=='KO') {
	        			 notifyMsg(code.msg,'errorBoxShare')
	             }
	        	 else notifyMsg(t('EmailNotFound'),'errorBoxShare');
	         },
	         error:function (xhr, ajaxOptions, thrownError){
	             alert('Something went Wrong please<br><br>'+xhr.responseText+thrownError);
	         }
	       }
	     );
		
		
		
		}
	}
/************************************funzioni delete handler***************************/
//cancella  gli item cancella un  oggetto
function deleteObj(obj){
curObjToDel=obj

var callback = function() {
    cancellaObj();
};
confirm(t("Warning"), t("DeleteObj"), t("No"), t("Yes"), callback)
};




function cancellaObj() {

dataItem=curObjToDel.id.split('_');
curId=dataItem[2];
curTableItem=dataItem[1];
//curItem='#item_'+curTableItem+'_'+curId;
curItem=$('#item_'+curTableItem+'_'+curId)
 
$.ajax({
    url:  urlAjaxHandlerCms+'delete/deleteItem/'+curId, 
    data:{mainTab:curTableItem},
    type: "GET",
    dataType: 'json',
    cache: false,
    success: function(code){
        if(code.status=='OK') {
            notifyMsg(code.msg);
            if($(curItem))$(curItem).hide();
            ;
        }
    },
    error:function (xhr, ajaxOptions, thrownError){
        alert('Something went Wrong please<br> contact SMI<br>'+xhr.responseText+thrownError);
    }
  })
} 


