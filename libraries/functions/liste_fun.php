<?php


//   set  di  funzioni  per  la  gestione  dei cambi editabile  nelle liste
function gestischiTipoColonna($valore,$nomeColonna,$Id=''){
 if(!is_object($ndb)){
   global $db;
   global $ndb;
   $ndb= $db;
 }
 $valore=stripslashes($valore);
 switch ($nomeColonna) {
   case 'Email':
        return '<a href="mailto:'.$valore.'" >'.$valore.'</a>';
        break;
   default:
     return $valore;
  }
}


function editaColonna($valore,$nomeColonna,$Id='',$tipo,$campo='text',$class=''){
  $w="100%";
  $jsV='';
  
  $valore=stripslashes($valore);
  if($tipo=='date'){
     $valore=invDate::initInvDate($valore);
     $al="dx";
     $w="70px";
     $jsV='onchange="veriDateLista(this.value,this)"';
  }
  else  if($tipo=='int'){$al="dx";}
  else  if($tipo=='real'){
        $al="dx";
        if($short==true)$w="40px";
        else $w="90px";
        $jsV='onchange="veriNumeroLista(\''.$nomeColonna.'['.$Id.']\')"';
  }
  if($nomeColonna=='lastUser')$valore=$_SESSION['uid'];
 
  //inverto  se il campo e di tipo data
  //echo $campo;
  //echo $nomeColonna;
  //echo $class;
  //echo $class;
  if($tipo!='blob'){
     if($class=='col-sm-1')$inputClass='input-mini';
     if($valore=='0')$valore='';
     return '<input  name="'.$nomeColonna.'['.$Id.']" type="text" class="'.$inputClass.'" value="'.$valore.'" '.$style.'  '.$jsV.'>';
  }
  else {
     return '<textarea name="'.$nomeColonna.'['.$Id.']"  class="txtareaLista">'.$valore.'</textarea>';
  }
 }

 
 
 
 
function mediaColonna($valore,$nomeColonna,$Id='',$tipo,$campo='img',$extraPath=''){
   if($valore!=''){
   	global $Id_sez; 
   	global $tabelleConf;
	$Id_sez;
   	$pathSuffix=$tabelleConf[$Id_sez]['pathSuffix'];
	
     if(String::ma_not_null($pathSuffix)) $pathMedia=DIR_WS_REPOSITORY.$pathSuffix.'/thumb_'.$valore;
	 else $pathMedia=DIR_WS_REPOSITORY.DIR_WS_THUMB.$valore;
     return  '<img src="'.$pathMedia.'" alt="'.$valore.'" border="0" class="img-responsive" width="80px">';
     }
}

function docColonna($valore,$nomeColonna,$Id='',$tipo,$tipo='doc',$title=''){
   if($valore!=''){
     $pathMedia=DIR_WS_REPOSITORY.$tipo.'/'.$valore;
	 $label=($title)?$title:$valore;
     return  '<a href="'.$pathMedia.'" target="_new" class="red">'.stripslashes($label).'</a>';
     }
}

function editaCombo($valore,$nomeColonna,$Id=''){
  global $db;
  $newdb=$db;
  $campoVuoto='';
  $jsOpt='';
  global $disObj;
  global $StatoObj;
  global $mainTab;
  switch ($nomeColonna) {
       
		//  stato utenti  news  letter
		case 'IdStatus':
        if(!is_object($StatoObj)){
            $StatoObj= new combo;
            $StatoObj->setInv();
            $StatoObj->setMode(4);
        }
        $datiCombo=$StatoObj->makeSimpleCombo('Attesa conferma#0,Iscritto#1,Rimosso#2',$valore,'stringa');
        break;
		case 'IdCategory':
        if(!is_object($dObjCategoriaEventi)){
            $dObjCategoriaEventi= new domini();
        }
        $datiCombo=$dObjCategoriaEventi->_ma_combo_d($valore,'visite','no','dv.Label');;
        break;
		case 'IdMarchi':
         if($valore)$datiCombo=articoli::getStringList($valore);
		 else $datiCombo='';
		 $datiCombo.='<input class="input-mini" id="'.$nomeColonna.'_'.$Id.'" name="'.$nomeColonna.'['.$Id.']" type="hidden" value="'.$valore.'"  >';
   
		 
		 $hideSel=1;
        break;
		case 'IdSubCategory':
        if(!is_object($dObjSubCategory)){
            if(!class_exists('subeventi'))require_once (DIR_FS_CLASSES."subeventi.class.php");
			$dObjSubCategory= new subeventi();
        }
        $datiCombo=$dObjSubCategory->_ma_combo_d($valore);
        break;
		case 'giornoInvio':
        $hideSel=1;
			global $Days;
		    if($valore!='') {
					$dataList=explode(',',$valore);
				     foreach ($dataList as $valore) {
						$datiCombo[]=$Days[$_SESSION['langSite']][$valore-1]; 
					 } 
				     $datiCombo=implode(',',$datiCombo);
       
			}          
        break;
        default:
        $hideSel=1;
        $datiCombo='<div class="btn-group" data-toggle="buttons-radio">';
		$activeNo=($valore!='1')?' active':'';
		$activeYes=($valore=='1')?' active':'';
		$datiCombo.='<button type="button" class="btn btn-default btn-sm '.$activeNo.'" onclick="$(\'#'.$nomeColonna.'_'.$Id.'\').val(0);updateItemFromList(\''.$mainTab.'_'.$nomeColonna.'_'.$Id.'\')">&nbsp;'.CL_NO.'&nbsp;</button>';
        $datiCombo.='<button type="button" class="btn btn-default btn-sm '.$activeYes.'" onclick="$(\'#'.$nomeColonna.'_'.$Id.'\').val(1);updateItemFromList(\''.$mainTab.'_'.$nomeColonna.'_'.$Id.'\')">&nbsp;'.CL_YES.'&nbsp;</button>';
        $datiCombo.='</div>';
        $datiCombo.='<input class="input-mini" id="'.$nomeColonna.'_'.$Id.'" name="'.$nomeColonna.'['.$Id.']" type="hidden" value="'.$valore.'"  >';
   
 
        
   }

   $combo.="\n";
   if($hideSel!=1)$combo='<select name="'.$nomeColonna.'['.$Id.']"  class="input-mini" '.$jsOpt.'>';
   if($campoVuoto==1)$combo.="<option value=''>Select</option>";
   $combo.=$datiCombo;
   if($hideSel!=1)$combo.='</select>';
   $combo.="\n";
   
    return $combo;
}

function editaCk($valore,$nomeColonna,$Id=''){
     $checked=($valore==1)?"checked":"";
     $ck='';
     $ck.='<input name="'.$nomeColonna.'['.$Id.']" type="checkbox" value="1" '.$checked.' >';
     return $ck;
}

function listaCampi($lista){
     global $campiList;
     if(!empty($campiList) && !empty($lista))$campiList=$campiList.",".$lista;
     else  $campiList=$lista;
     return   $campiList;
}




?>