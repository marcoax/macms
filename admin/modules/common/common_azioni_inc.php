<?php
require_once(DIR_FS_CLASSES.$Id_sez.'.class.php');
$preLabel=CL_AZIONI;
$objSez= new $Id_sez();
//************* estraggo  li' ID Top  di ogni attivita  cio� id   Accordo padrea 
$objTop = new azioni();
$objTop->setCurField('IdAccordo');
if(ma_getParameter(TABLE_AZIONI."_IdParent")>0){

   $objTop->getTopParent(ma_getParameter(TABLE_AZIONI."_IdParent"));
    $objTop->updateById($Id,$objTop->TopId);
}
if($mode!='up'){
   $objSez->_ma_pre_getData($Id);
   $objSez->getData(2);
   if($objSez->Data->IdAreaTematica){
     $preLabel=$objSez->getAreaTematica($objSez->Data->IdAreaTematica);
     $objSez->curIdAreaTematica=$objSez->Data->IdAreaTematica;
   }
   else { 
     $objSez->Data->IdAccordo;
     $preLabel=$objSez->getAreaTematica($objSez->Data->IdAreaTematica,$objSez->Data->IdAccordo);
     $objSez->curIdAreaTematica;
   }
   if($oc->ckActionPermission('dominio','edit',$IdOwner))$preLabel=ma_helper_view_link('dominio','areetematiche',$objSez->curIdAreaTematica,'nero',$preLabel);
   
}
$mainTab=$objSez->tablename;
$IdAzione=$objSez->Data->Id;

$objCrumber = new azioni();
$objCrumber->getTreeFromChild($objSez->Data->IdParent);
$titoloItem=ma_get_pageTitle($objSez->Data->Title,$preLabel,'',$objCrumber->arrayRevBreadCrumbs,1);
