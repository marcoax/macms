<?php
$objSez= new $Id_sez();if($mode!='up'){
	    $objSez->_ma_pre_getData($Id);    
	    $objSez->getData(2);
}
$mainTab=$objSez->tablename;
$objTitolo=$objSez->titoloItem;
$mainTab=$objSez->tablename;
$titoloItem=ma_get_pageTitle($objSez->Data->$objTitolo,$objSez->sezTitle);
$objForm= new cmsForm();
$IdOwner=$objSez->Data->CreatedBy;
if($objSez->Data->Valore!='')include(DIR_FS_CMS_BLOCKS."code_creazione_template.inc.php");

