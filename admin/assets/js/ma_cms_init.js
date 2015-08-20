var urlAjaxHandler		= serverPath+'view/ajax/index.php/';; // percorso  del contenuto del  dialog
var urlAjaxHandlerCms	= serverPath+'cms/view/ajax/index.php/';; // percorso  del contenuto del  dialog
var containerError 		= $('#errorBox'); // contenitore  dei messaggi  di errore
var containerMsgBox		= $('#msgBoxContainer'); //  contenitore msg  per feed back   form
var curImgToDel			 ='';//immagine  corrente da  cancellare
$(document).ready(function(){
 // Popover 
   $('#loginBox input').hover(function(){
   // $(this).popover('show');
    //hideErrorBox();
   });
   $("input.dp").datepicker({dateFormat: 'dd-mm-yy' });
	
   //gestione  check  box  liste
	$('input.checkbox').click(function() {
		var itemSel = countItemclick();
		
		if (itemSel > 0) {
			$('#toolbar_cerca').hide();
			if(itemSel==1) {
             curItem=$("input.checkbox:checked").val()
				$('#editButtonHandler').show();
			}
			else $('#editButtonHandler').hide();
			$('#toolbar_handler').fadeIn('1000');

		} else {
			$('#toolbar_handler').hide();
			$('#toolbar_cerca').fadeIn('1000');

		}
	 });
	
    //initSelDesAll() //init  seleziona deseleziona tutti
   initDelSel() //init  Cancella selezionati
   initMsgBox() //  gestione  box;
   
// gestione    sortable nelle  gallerie
   /****************************** gestioe  menu list | grid  |   icons ***********************/
  
   
   //gestione  finestre  modali
   
   $('[data-toggle="modal"]').click(function(e) {
      e.preventDefault();
      var href = $(this).attr('href');
      if (href.indexOf('#') == 0) {
          $(href).modal('open');
      } else {
    	
    	 
          $.get(href, function(data) {
              var confirmModal =
                  $('<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
                	  '<div class="modal-dialog modal-lg">'  +
                		  	'<div class="modal-content">' +     
                		  		'<div class="modal-header">' +
                		  			'<a class="close" data-dismiss="modal" >&times;</a>' +
                		  			'<h4>Modal Edit</h4>' +
                		  		'</div>' +

                		  		'<div class="modal-body">' +
                		  		'<p>' + data + '</p>' +
                		  		'</div>' +
            		  		'</div>' +
                      '</div>' +
                    '</div>');
              
              $(confirmModal).modal();
              
              $(confirmModal).on('hide', function () {
            	 
            	  //document.forms['modalEdit'].submit();
                // document.forms['edit'].submit();
              });
              
              $(confirmModal).on('hidden', function () {
            	    	 
                  document.forms['edit'].submit();
              });
              
              $('html, body').animate({scrollTop:0}, 'slow');
              
          }).success(function() { $('input:text:visible:first').focus(); });
      }
    });
    
   
   // tooltip demo
   // tooltip demo
   $('#toolbar_cerca').tooltip({
     selector: "*[rel=tooltip]"
   })
   $('.simpleDocList').tooltip({
     selector: "*[rel=tooltip]"
   })
   $('.btn-group').tooltip({
     selector: "*[rel=tooltip]"
   })
   
   $('#naviDx').affix()
   
   
   $('#ricerca').change(function() {
	  alert('ciao')
   });
   
   
 
   $("ul#simpleGallery").sortable({
       revert: true,
      update : function (ev, ui) {
       var order = $('ul#simpleGallery').sortable('serialize');
      
          $("#info").load(urlAjaxHandler+"update/sortList?"+order);
       }
   });
   $("ul#simpleGallery").disableSelection();
   
   /*
   $("ul#simpleDocList").sortable({
       revert: true,
       placeholder: '.ui-state-highlight',
       update : function (ev, ui) {
       var order = $('ul#simpleDocList').sortable('serialize');
      
          $("#info").load(urlAjaxHandler+"update/sortList?"+order);
       }
   });
   $("ul#simpleDocList").disableSelection();
  */

});


/*************************** gestione    sub menu***********************/
function countItemclick() {

	var n = $("input.checkbox:checked").length;

	return n;

}

/**************************************login/logout**************************/

function  logout(){
    $.post( urlAjaxHandler, 
         {actionType:'logout'}
         
         ,function(xml){
            if (xml.match('OK')) {
                location.href='index.php'
            }
            else erroreMessage('Error');
           //alert(xml);
         }
         
     );
}


function  login(){
    $.get( urlAjaxHandler+'validate/login', 
          {actionType:'login'}
         
         ,function(jsonData){
            if (xml.match('OK')) {
                location.href='index.php'
            }
            else erroreMessage('Error');
           //alert(xml);
         }
         
     );
}


function  recuperoPwdBoxhandler(){
    $("p#recuperomessage").hide();
    $("#recuperoLabel").show();
    $('#dimenticatoBox').toggle()
}

/****************************ajaxUpdater****************************/
//ajax updare 
function  ma_ajax_updater_simple(actionTypeUrl,updateItem){
  //showWait()
  //if(nome_form!='')para=$('#'+nome_form).serialize();
  $.ajax({
         url: urlAjaxHandler+'?'+actionTypeUrl, 
         //data:$('#'+nome_form).serialize(),
         cache: false,
            success: function(code){
                $("#"+updateItem).html(code);
                
                
                //closeDialog("#msgBox");
                if(updateItem='contentBodyResult') {
                    ma_set_tab_results();
                }
                
            }

         }
     );
} 





/**************************************** Reminder **********************/
function settaReminder(Id,obj){
	
	obj.value=(isNaN(obj.value))?0:obj.value;
	if(obj.value>3000)  {
     	var curValObj=$('#remValore_'+Id);
     	if(curValObj.val()>10)curValObj.val(1);
     	
    }
	

	 $.ajax({
         url: urlAjaxHandler+'reminder/update/'+Id, 
         data:$('#edit').serialize(),
         type: "POST",
         //dataType: 'json',
         cache: false,
         success: function(code){
        	 if(code.status=='OK') {
             	
             }
         },
         error:function (xhr, ajaxOptions, thrownError){
             console.log('Something went Wrong please<br><br>'+xhr.responseText+thrownError);
         }
       }
     );
}


function updateItemToSet(itemString,obj){
	var actionType=($(obj).hasClass('active')!==true)?'addItemToSet':'removeItemToSet';
	if($(obj).hasClass('active')!==true) {
		$tooltiptitle=$(obj).attr('data-unset-title');
		
		$(obj).attr('data-original-title',$tooltiptitle);
    }
	else {
		$tooltiptitle=$(obj).attr('data-set-title');
		$(obj).attr('data-original-title',$tooltiptitle);
    }
	var itemArray=itemString.split('_')
	var  valore=itemArray[3];
	$.ajax({
        url: urlAjaxHandler+'update/'+actionType+'/'+itemArray[2], 
        data:{mainTab:itemArray[0],
        	 field:itemArray[1],
        	 value:valore 
        	},
        type: "GET",
        dataType: 'json',
        cache: false,
        success: function(code){
        	console.log(code)
        },
        error:function (xhr, ajaxOptions, thrownError){
            //alert('Something went Wrong please<br><br>'+xhr.responseText+thrownError);
        }
      }
    );	

}


function addItemToUser(targetObj,Id){
	 var IdObjectB=$('#shareUserList').val();

	 $('#addButton').button('loading');
	 $.ajax({
		 
         url: urlAjaxHandler+'userList/add/'+Id, 
         type: "POST",
         data:{'IdObjectB':IdObjectB},
         //dataType: 'json',
         cache: false,
         success: function(code){
        	 $('#addButton').button('reset');
        	 $('#shareUser').val('');
             if(code) {
            	
                 $('.'+targetObj).html(code);
             }
         },
         error:function (xhr, ajaxOptions, thrownError){
        	 $('#addButton').button('reset');
             console.log('Something went Wrong please<br><br>'+xhr.responseText+thrownError);
         }
       }
     );
}


function addItemToAllUser(targetObj,Id){
	$('#addAllButton').button('loading');
	 $.ajax({
	    url: urlAjaxHandler+'userList/addAll/'+Id, 
        type: "POST",
        //dataType: 'json',
        cache: false,
        success: function(code){
        	$('#addAllButton').button('reset');
            if(code) {
                $('.'+targetObj).html(code);
            }
        },
        error:function (xhr, ajaxOptions, thrownError){
        	$('#addAllButton').button('reset');
            console.log('Something went Wrong please<br><br>'+xhr.responseText+thrownError);
        }
      }
    );
}


function addActionToUser(targetObj,Id,ItemType){
	 var IdObjectB=$('#shareUserList').val();

	 $('#addButton').button('loading');
	 $.ajax({
		 
        url: urlAjaxHandler+'userListAction/add/'+Id, 
        type: "POST",
        data:{'IdObjectB':IdObjectB,
        	   'ItemType':ItemType
             },
        //dataType: 'json',
        cache: false,
        success: function(code){
       	 $('#addButton').button('reset');
       	 $('#shareUser').val('');
            if(code) {
           	
                $('.'+targetObj).html(code);
            }
        },
        error:function (xhr, ajaxOptions, thrownError){
       	 $('#addButton').button('reset');
            console.log('Something went Wrong please<br><br>'+xhr.responseText+thrownError);
        }
      }
    );
}


function addActionToAllUser(targetObj,Id,ItemType){
	$('#addAllButton').button('loading');
	 $.ajax({
	    url: urlAjaxHandler+'userListAction/addItemAll/'+Id, 
        type: "POST",
        data:{'ItemType':ItemType},
        //dataType: 'json',
        cache: false,
        success: function(code){
        	$('#addAllButton').button('reset');
            if(code) {
                $('.'+targetObj).html(code);
            }
        },
        error:function (xhr, ajaxOptions, thrownError){
        	$('#addAllButton').button('reset');
            console.log('Something went Wrong please<br><br>'+xhr.responseText+thrownError);
        }
      }
    );
}



function deleteUserFromList(Id){
	
	IdUserActionType=$('#IdUserActionType').val();
	
	$.ajax({
        url: urlAjaxHandler+'delete/deleteUserItem/'+Id, 
        data:{mainTab:'user',
        	  IdUserActionType:IdUserActionType
             },
        type: "GET",
        dataType: 'json',
        cache: false,
        success: function(code){
        	if(code.status=='OK') {
            	$('#IdRow_'+Id).hide();
            }
        },
        error:function (xhr, ajaxOptions, thrownError){
            alert('Something went Wrong please<br><br>'+xhr.responseText+thrownError);
        }
      }
    );	

}

function updateItemFromList(itemString){
	
	var itemArray=itemString.split('_')
	var  valore=$('#'+itemArray[1]+'_'+itemArray[2]).val();
	$.ajax({
        url: urlAjaxHandler+'update/updateItemFromList/'+itemArray[2], 
        data:{mainTab:itemArray[0],
        	 field:itemArray[1],
        	 value:valore 
        	},
        type: "GET",
        dataType: 'json',
        cache: false,
        success: function(code){
        	
        },
        error:function (xhr, ajaxOptions, thrownError){
            //alert('Something went Wrong please<br><br>'+xhr.responseText+thrownError);
        }
      }
    );	

}


/****************************************relation  **********************/
function addRelation(type,IdObjectA){
	

   	var IdObjectBVal=$('#'+type).val();
    targetObj=type+'List';
    var IdObjectB=$('#'+type).val()
   
	 $.ajax({
         url: urlAjaxHandler+'relation/insert/'+type, 
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


function addTaskRelation(type,IdObjectA,isSortable){
	

   	var IdObjectBVal=$('#'+type).val();
    targetObj=type+'List';
    var IdObjectB=0;//  uso la  relation ma non ho   nessun id  asegno  solo del  contenuto  ad una  to doslist
   
    
   if(IdObjectBVal=='') {
    	
	    notifyMsg('The task  is  empty');
    	return;
    }
    
    
    
	 $.ajax({
         url: urlAjaxHandler+'relation/insert/'+type, 
         data: {actionType:'addRelationItem',
 			   Id:IdObjectA,
 			   IdObjectB:IdObjectB,
 			   value:IdObjectBVal, 
               Dominio:type
 		   },
         get: "POST",
     
         cache: false,
         success: function(code){
        	     $('#'+type).val("");
        		 if(isSortable==true)$('#'+targetObj).html(code);
        		 else $('#sortable').html(code);
             
         },
         error:function (xhr, ajaxOptions, thrownError){
             alert('Something went Wrong please<br><br>'+xhr.responseText+thrownError);
         }
       }
     );
}

/**************************utility*********************/
 function  hideErrorBox(){
     containerError.fadeOut('slow');
 }
 
 // per  finestre di  notifica
 function notifyMsg(msgContent){
     //ddopenWindow(msgContent)
     $('#myModal-body').html(msgContent);
     $('#myModal').modal('show');
 }
 
 
 function warnigMsg(msgContent){
     //ddopenWindow(msgContent)
      var callback = function() {
          cancellaOggetto()
      };
      confirm(t("Warning"), msgContent, t("Reset"), t("Delete"), callback)
 }
 
 
 function initMsgBox(){
	 var txt = containerMsgBox.text()
	 $.notify(txt,
			 {
	           autoHide: true,
	           autoHideDelay: 2000,
	           className: 'success',
			 }
	 );
   
 }
 
 /***************************liste **********************/

 function delItem(Id){
     var callback = function() {
         forma=document.forms[0]
         forma.mode.value="del";
         forma.Id.value=Id
         forma.submit();
     }; 
     confirm(t("Warning"), t("DeleteObj"), t("No"), t("Yes"), callback);
    
   }

   function addItem(Id){
     forma=document.forms[0]
     forma.mode.value="add";
     forma.Id.value=Id
     forma.submit();
   }


   function setLimit(limite){
     forma=document.forms[0]
     forma.mode.value="cerca";
     forma.limit.value=limite;
     forma.submit();
   }
  function vaiPage(curPage){
     forma=document.forms[0]
     forma.mode.value="cerca";
     forma.page.value=curPage;
     forma.submit();
   }
   
   function initDelSel(){
       if($('#actiontoolbar')){
        objDelAll=$('#actiontoolbar .objDelSel');
        objDelAll.click(function(){
            deleteAll()
         });
      }
   }
   function deleteAll(){
       
       var callback = function() {
           curForm=document.forms[0];
           curForm.actionType.value='deleteAll';
           curForm.submit()
       }; 
       confirm(t("Warning"), t("DeleteAllItem"), t("No"), t("Yes"), callback);
      
       
  }
 /************************************funzioni delete handler***************************/
   //  cancella  gli item cancella un  oggetto
   function deleteItem(obj){
      curObjToDel=obj
      var callback = function() {
           cancellaOggetto();
      };
      confirm(t("Warning"), t("DeleteObj"), t("No"), t("Yes"), callback)
      };
    
    
    function deleteImages (obj){
        curImgToDel=obj;
        var callback = function() {
            cancellaImages()
        };
        
        confirm(t("Warning"), t("DeleteObj"), t("No"), t("Yes"), callback)
        
    };
    
    
    function cancellaOggetto() {
       
       dataItem=curObjToDel.id.split('_');
       curId=dataItem[2];
       curTableItem=dataItem[1];
       //curItem='#item_'+curTableItem+'_'+curId;
       curItem=$('#item_'+curTableItem+'_'+curId)
        
       $.ajax({
           url:  urlAjaxHandler+'delete/deleteItem/'+curId, 
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
               alert('Something went Wrong please'+xhr.responseText+thrownError);
           }
         }
       );
   }

    function cancellaImages() {
           dataItem=curImgToDel.id.split('_');
           curTableItem=dataItem[1];
           curCampo=dataItem[2];
           curObj=dataItem[1]+'_'+dataItem[2];
           curId=dataItem[3];
           //curObj=jQuery.escapeSelector(curObj);   //sanitize
           curItemDelete=$('#delete_'+curObj+'_'+curId);
           curItemLink=$('#link_'+curObj+'_'+curId);
           curItemBox=$('#box_'+curObj+'_'+curId);
           curItem=$('#item_'+curTableItem+'_'+curId)
         
           
           $.ajax({
               url: urlAjaxHandler+'/delete/deleteImages/'+curId, 
               data:{mainTab:curTableItem,campo:curCampo},
               type: "GET",
               dataType: 'json',
               cache: false,
               success: function(code){
                   if(code.status=='OK') {
                	
                       notifyMsg(code.msg);
                      
                       if($(curItemDelete))$(curItemDelete).hide();
                       if($(curItemLink))$(curItemLink).hide()
                       if($(curItemBox))$(curItemBox).hide()
                       $('#'+curObj).val('');
                   }
               },
               error:function (xhr, ajaxOptions, thrownError){
                   alert('Something went Wrong please<br> contact SMI<br>'+xhr.responseText+thrownError);
               }
             }
           );
   }
 /**************************conta  caretteri *******************/
 
    function countChars(obj,targetObj,maxChar){
        curForm=document.forms['edit'];
        //alert(obj+'+'+curForm.elements[obj].value.length+'+'+curForm.elements[targetObj])
        curForm.elements[targetObj].value=curForm.elements[obj].value.length;
        if(maxChar<curForm.elements[obj].value.length)$(targetObj).addClassName('campoContaWarning')
        else $(targetObj).removeClassName('campoContaWarning')
    }
    /******************************************  validazione  Modal ************************/
    
    
    function validazioneModal(mainForm){
        //data=curForm=$(mainForm);
        //data=$('#'+curForm).serialize(true);
        $.ajax({
            url: urlAjaxHandler+'/update/modalEdit', 
            data:$('#'+mainForm).serialize(),
            type: "POST",
            dataType: 'json',
            cache: false,
            success: function(code){
                if(code.status=='OK') {
                    alert(code.msg)
                }
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert('Something went Wrong please<br> contact SMI<br>'+xhr.responseText+thrownError);
            }
          }
        );
        
        
        /*
    
        url=serverPath+'layout/ajaxHandler.php'
        $('msgErrorBoxModal').hide();
        curForm=$(mainForm);
        $(curForm).serialize(true);
        $('actionType').value='modalEdit';
        objRequest= new Ajax.Request(
          url, {
               method: 'post',
               parameters:$(curForm).serialize(),
               onFailure: notifyError,
               onSuccess:function(transport){
                   var response = transport.responseText || "KO";
                   $('msgErrorBoxModal').show();
                   $('msgErrorBoxModal').update(response);
                   fadeout.delay(1);

               }
       });
      */ 
     }
 /************************localized  function*****************/
 
 function t(str) {
     if (localized[str].length>0) {
         return localized[str];
     } else {
         return str;
     }
 }
 
 
 function simpleObjInspect(oObj, key, tabLvl)
 {
     key = key || "";
     tabLvl = tabLvl || 1;
     var tabs = "";
     for(var i = 1; i < tabLvl; i++){
         tabs += "\t";
     }
     var keyTypeStr = " (" + typeof key + ")";
     if (tabLvl == 1) {
         keyTypeStr = "(self)";
     }
     var s = tabs + key + keyTypeStr + " : ";
     if (typeof oObj == "object" && oObj !== null) {
         s += typeof oObj + "\n";
         for (var k in oObj) {
             if (oObj.hasOwnProperty(k)) {
                 s += simpleObjInspect(oObj[k], k, tabLvl + 1);
             }
         }
     } else {
         s += "" + oObj + " (" + typeof oObj + ") \n";
     }
     return s;
 }
 
//---------------------------------------------------------- Generic Confirm  



 function confirm(heading, question, cancelButtonTxt, okButtonTxt, callback) {
	 

  var confirmModal =
     $('<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
    	 '<div class="modal-dialog">'  +
	    	 '<div class="modal-content">' +
		         '<div class="modal-header">' +
		           '<a class="close" data-dismiss="modal" >&times;</a>' +
		           '<h3>' + heading +'</h3>' +
		         '</div>' +
		        '<div class="modal-body big">' +
		           '<p>' + question + '</p>' +
		         '</div>' +
		        '<div class="modal-footer">' +
		           '<a href="#" class="btn btn-danger" data-dismiss="modal">' +
		             cancelButtonTxt +
		           '</a>' +
		           '<a href="#" id="okButton" class="btn btn-primary">' +
		             okButtonTxt +
		           '</a>' +
		         '</div>' +
         '</div>' +
         '</div>' +
       '</div>');

         confirmModal.find('#okButton').click(function(event) {
         callback();
         confirmModal.modal('hide');
         });
   confirmModal.modal('show');    

 };
 
