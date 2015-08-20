<?php
class forma{
   // constructor 
  function  forma(){
  }
  
  //aggiungo l'elemto  desiderato
  function addElement($formElement){
  
  
  // setto  gli attributi 
  function setAttributes($attributes){
		 foreach($attributes as $attribute=>$value){
   
   function  getHTML(){
   
   
   function setRequired($req) {
     $this->requiredField=$req;
   }
   

  
  function dataFormatter($data,$type){
    if($type=='date' && $data!=''){
	    if($data!='0000-00-00')$data=invDate::formatData('d-m-Y',$data);
		else $data='';
	}
	
  
   return $data;
  }
  
 // gestione  dei  messaggi in base  al template pagina  scelto
 function extraMsgHandler(){
 	$curItem= $this->valore['extraMsgEnabled'];
   		$curValore=constant('TEMPLATE_' . strtoupper($this->eleForm->Data->$curItem.'_'.$this->formElement).'_EXTRAMSG');
	if($curValore!=''){
		 $this->extraMsg=$curValore;
	}
	else return $this->extraMsg;
 }
 
 // gestione  dei  campi in base  al template pagina  scelto 1= mostra 0 uguale nasconde  e  ritorna inverso
 function fieldHandler(){



class input extends forma {
   
   
   function getHTML(){
}


class textarea extends forma {
   
   function  textarea($attributes=array(),$data){
             $this->setAttributes($attributes);
             $this->data=$data;
   }

   function getHTML(){
	}
}



// crea  un  ceck box
 class ceck_Box  extends forma {
  
    function  ceck_Box($attributes=array(),$data){
             $this->setAttributes($attributes);
   }
   
   function getHTML(){
     $this->_ce=(!empty($this->data))?'checked':'';
   	 //$html.="<input value=\"1\" type=\"checkbox\" ".$this->attributes." ".$this->_ce."/>\n";
	 return $html;
   }
}


 
 
  class simpleImage  extends forma {
  
    function  simpleImage($attributes=array(),$data){
             $this->setAttributes($attributes);
             $this->data=$data;
   }
   
   function getHTML(){
     
   	 if($this->data)$html.="<img src=\"".$this->data."\" ".$this->attributes." >\n";
	 return $html;
   }
}
 
 
 
 class mediaFile  extends forma  {

	function  mediaFile($attributes=array(),$data,$mediaType,$valore){
		$this->setAttributes($attributes);
		$this->campo	 = $attributes['id'];
	}
   
   function getHTML(){
   	 global  $Id;
   }
 }
 

 
// default  style  for   cms Form   and  view 
 class  cmsForm extends  forma {
 
   function  cmsForm (){
       global $mode;
	    $this->mode=$mode;
	   $this->forma;
   }

	//default  value  forrowForm  
	// caratteristiche form  cms  
  function setOptPara($classRow='rowForm',$class='txtsmall',$align='right',$colspan=1){
	 $this->stileRow=$classRow;
	 $this->stile=$class;
	 $this->bgcolor=$bgcolor;
	 $this->align=$align;
	 $this->colspan=$colspan;
   }
  
  
  
  function container($label,$formElement,$cssclass,$linehandler,$tr=1,$formElementHidden=''){
     $html='';
     		$html.='<label for="'.$this->formElement.'">'.$label."</label>\n";
			if($this->requiredField)$html.=$this->requiredField." ";
	 
	 return $html;
  }
  
  
  
 // ciclo i dati  della  form e  li assegno 
  function createForm($eleForm,$mainTab){
  
      $this->setOptPara();
      $this->eleForm=$eleForm;
	  $this->eleForm->Data;
	  while (list($chiave, $valore) = each($eleForm->fieldspec)) {
	       	  $formElement=$chiave;
		      //$size=$valore['size'];
    		  $linehandler=$valore['linehandler']?$valore['linehandler']:'both';

              if($this->valore['fieldTemplateEnabled']!='')$hidden=($this->fieldHandler()==1)?0:1;
			  if(is_array($eleForm->userHiddenField)){
			  	 if(in_array($this->formElement,$eleForm->userHiddenField) && !ma_getParameter('isAdmin')){
			  	    $combo='';
			  	    $hidden=1;
			  	 }
			  }
    		  if($this->type=='integer' || $this->type=='string' || $this->type=='date' ){
			     $type=($hidden)?'hidden':'text';
			     if( $this->valore['disabled']==1)$formElement= new input(array('type'=>$type, 'name'=>$campo, 'id'=>$campoId, 'class'=>$cssclass, 'style'=>"width:".$size."px",'maxlength'=>$max,'disabled'=>1),$this->data,$this->mediaType);
				 else $formElement= new input(array('type'=>$type, 'name'=>$campo, 'id'=>$campoId, 'class'=>$cssclass, 'style'=>"width:".$size."px",'maxlength'=>$max),$this->data,$this->mediaType);
			  }
			  else if($hidden) {
			     $formElement= new input(array('type'=>$type, 'name'=>$campo, 'id'=>$campoId, 'class'=>$cssclass, 'style'=>"display:none",'maxlength'=>$max),$this->data,$this->mediaType);
		
			  }
			  else if($this->type=='text'){
			        if($hidden==1)$formElement= new textarea(array('type'=>$type,'name'=>$campo, 'id'=>$campoId, 'class'=>'campoNoeditor', 'style'=>"display:none"),$this->data);
			        else $formElement= new textarea(array('type'=>$type,'name'=>$campo, 'id'=>$campoId, 'class'=>$cssclass, 'style'=>"width:".$size."px;height:".$h."px"),$this->data);
			  }
			  else if($this->type=='media'){
			     $formElement= new mediaFile(array('type'=>$type,'readonly'=>$this->readonly,'name'=>$campo, 'id'=>$campoId, 'class'=>'campo','style'=>"width:".$size),$this->data,$this->mediaType,$this->valore);
			  }
			  else if($this->type=='boolean'){
			     		 $formElement= new ceck_Box(array('name'=>$campo, 'id'=>$campoId, 'class'=>'ck'),$this->data);
			  }
			  else if($this->type=='timestamp'){
			  		$formElement= new input(array('type'=>$type, 'name'=>$campo, 'id'=>$campoId, 'class'=>'campo', 'style'=>"width:".$size,'maxlength'=>$max),$this->data,$this->mediaType);
    		  }
			 
			  if($combo && $hidden!=1){
                 //echo DIR_FS_CMS_BLOCKS.'campi_'.$combo.'.inc.php';
                 global $objSez;
			     $objSez->Data->$chiave=$data;
			     if(file_exists(DIR_FS_CMS_BLOCKS.'campi_'.$combo.'.inc.php'))include(DIR_FS_CMS_BLOCKS.'campi_'.$combo.'.inc.php');
                 else echo "error ".DIR_FS_CMS_BLOCKS.'campi_'.$combo.'.inc.php';
			  }
			  else if($this->display){
			       if($hidden)echo $formElement->getHTML();
			       else echo $this->container($label,$formElement,$cssclass,$linehandler);
			 }
	   }
   }

   
   
     // ciclo i dati  della  form e  li assegno 
  function createFormObAttribute($objClassAttribute,$objAttribute){
  	 $this->setOptPara(); 
   	 if($objClassAttribute){
     $objAttribute->dataBox=$objAttribute->createDataBox($objAttribute->Data);
     
    
     
     foreach($objClassAttribute as $ca){
            $size='300';
           	$IdAttribute=$objAttribute->dataBox[$ca->id]['id'];
            $valore=$objAttribute->dataBox[$ca->id]['value'];
            //$objAttribute->ma_getObjectAttributeValueByData($objAttribute->Data,$ca->identifier);
            $campo='attribute['.$ca->id.']['.$ca->identifier.']';
            $campoHidden='attribute['.$ca->id.'][id]';
            //  genero campo  hidden per  gli attribuiti
            $formHiddenElement= new input(array('type'=>'hidden', 'name'=>$campoHidden, 'id'=>$campoIdHidden, 'class'=>'', 'maxlength'=>5),$IdAttribute);
            
            
              if($this->type=='integer' || $this->type=='string' || $this->type=='date'  ){
			  			     $type=($hidden)?'hidden':'text';
			     $formElement= new input(array('type'=>$type, 'name'=>$campo, 'id'=>$campoId, 'class'=>$cssclass, 'style'=>"width:".$size."px",'maxlength'=>$max),$this->data,$this->mediaType);
			  }
			  else if($hidden) {
			      $formElement= new input(array('type'=>$type, 'name'=>$campo, 'id'=>$campoId, 'class'=>$cssclass, 'style'=>"width:".$size."px",'maxlength'=>$max),$this->data,$this->mediaType);
		
			  }
			  else if($this->type=='text'){
			      			     $formElement= new textarea(array('type'=>$type,'name'=>$campo, 'id'=>$campoId, 'class'=>$cssclass, 'style'=>"width:".$size."px;height:".$h."px"),$this->data);
			  
			  }
			  else if($this->type=='media'){
			     $formElement= new mediaFile(array('type'=>$type,'readonly'=>$this->readonly,'name'=>$campo, 'id'=>$campoIdId, 'class'=>'campo','style'=>"width:".$size),$this->data,$this->mediaType);
			  }
			  else if($this->type=='boolean'){
			     		 $formElement= new ceck_Box(array('name'=>$campo, 'id'=>$campoId, 'class'=>'ck'),$this->data);
			  }
			  else if($this->type=='timestamp'){
			  		$formElement= new input(array('type'=>$type, 'name'=>$campo, 'id'=>$campoId, 'class'=>'campo', 'style'=>"width:".$size,'maxlength'=>$max),$this->data,$this->mediaType);
    		  }
			 
			  if($combo && $hidden!=1){
                 //echo DIR_FS_CMS_BLOCKS.'campi_'.$combo.'.inc.php';
			     $objSez->Data->$chiave=$data;
			     if(file_exists(DIR_FS_CMS_BLOCKS.'campi_'.$combo.'.inc.php'))include(DIR_FS_CMS_BLOCKS.'campi_'.$combo.'.inc.php');
                 else echo "error ".DIR_FS_CMS_BLOCKS.'campi_'.$combo.'.inc.php';
			  }
			  else if($this->display){
			       if($hidden)echo $formElement->getHTML();
			       else echo $this->container($label,$formElement,$cssclass,$linehandler);
			 }
	        }
	    }
   }
    // ciclo i dati  della  form e  li assegno 
   function  getOutput(){
       return $this->cmsOutput;
   }
    
 }
 
 // default  style  for   cms Form   and  view 
 class  cmsView extends  forma {
 
   function  cmsForm (){
       global $mode;
	    $this->mode=$mode;
	   $this->forma;
   }

	//default  value  forrowForm  
	// caratteristiche form  cms  
  function setOptPara($classRow='rowForm',$class='txtsmall',$bgcolor='#DDDDDD',$align='right',$colspan=1){
	 $this->stileRow=$classRow;
	 $this->stile=$class;
	 $this->bgcolor=$bgcolor;
	 $this->align=$align;
	 $this->colspan=$colspan;
   }

  
  function containerView($label,$data,$tr=1){
     $html='';
     $html.="<div class=\"mid\">\n";
     $html.='<b>'.$label.":</b>\n";
   
     $html.=stripslashes($data);
	 //if($this->extraMsg)$html.=" ".$this->extraMsg." "; 
     $html.="</div>\n";
     return $html;
  }
  
  
  
  

   
   
   
   // ciclo i dati  della  form e  li assegno 
  function createView($eleForm,$mainTab){
      $this->setOptPara();
	  while (list($chiave, $valore) = each($eleForm->fieldspec)) {
	           
	    	  $formElement=$chiave;
			  $campo=$mainTab.".".$chiave;
			  $label=$valore['label'];
		      $size=$valore['size'];
			  $cssclass=($valore['cssclass'])?$valore['cssclass']:'campo';
			  $h=$valore['h'];
			  $max==$valore['max'];
		      $this->type=$valore['type'];
			  $hidden=$valore['hidden'];
			  $hiddenValue=$valore['hiddenValue'];
			  $required=$valore['required'];
			  $this->extraMsg=$valore['extraMsg'];
			  $this->display=$valore['display'];
			  $this->view=$valore['view'];
			  $this->default_value=$valore['default_value'];
			  
			  $combo=$valore['combo'];
			  $data=$eleForm->Data->$chiave;
			  $this->data=$this->dataFormatter($data,$this->type);
			  if($this->mode=='up')$this->data=$this->default_value;
			  $this->mediaType=$valore['mediaType'];
			
			  
			  if($this->type=='integer' || $this->type=='string' || $this->type=='date' ){
			     
				 
			     $type=($hidden)?'hidden':'text';
			     $formElement= new input(array('type'=>$type, 'name'=>$campo, 'id'=>$campoId, 'class'=>$cssclass, 'style'=>"width:".$size."px",'maxlength'=>$max),$this->data,$this->mediaType);
			  }
			  else if($this->type=='text'){
			      			     $formElement= new textarea(array('type'=>$type,'name'=>$campo, 'id'=>$campoId, 'class'=>$cssclass, 'style'=>"width:".$size."px;height:".$h."px"),$this->data);
			  
			  }
			  else if($this->type=='media'){
			     $formElement= new mediaFile(array('type'=>$type,'readonly'=>$this->readonly,'name'=>$campo, 'id'=>$campoId, 'class'=>'campo','style'=>"width:".$size),$this->data,$this->mediaType);
			  }
			  else if($this->type=='boolean'){
			     		 $formElement= new ceck_Box(array('name'=>$campo, 'id'=>$campoId, 'class'=>'ck'),$this->data,$campoId);
			  }
			  else if($this->type=='timestamp'){
			  		$formElement= new input(array('type'=>$type, 'name'=>$campo, 'id'=>$campoId, 'class'=>'campo', 'style'=>"width:".$size,'maxlength'=>$max),$this->data,$this->mediaType);
    		  }
			 
			  if($this->view==1){
			       echo $this->containerView($label,$this->data);
			 }
	   }
   }
   
   function createAttributeView($objClassAttribute,$objAttribute){
   	 if($objClassAttribute){
	 	foreach($objClassAttribute as $ca){
	  		$valore=$objAttribute->ma_getObjectAttributeValueByData($objAttribute->Data,$ca->identifier);
			if($ca->datatype=='checkbox')$valore=($valore==1)?'Si':'No';
			if($ca->datatype=='image'){
				$valore=$objAttribute->ma_get_avatar($valore,$objAttribute->Data->Id);
				$valore="<img src=\"".$valore."\" class=\"imageView\">";
			}			
	  		echo $this->containerView($ca->label,$valore);
	    }
	 }
   }
  
    
 }
 ?>