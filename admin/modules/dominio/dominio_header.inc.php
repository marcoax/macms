<?php
$objSez= new dominio();if($mode!='up'){	    $objSez->_ma_pre_getData($Id);    	    $objSez->getData(2);}$mainTab=$objSez->tablename;$titoloSez=$objSez->getTitoloSez($Id_sub);$titoloItem=ma_get_pageTitle($objSez->Data->Label,'',$titoloSez);

$objPage->bc_titoloItem=$titoloItem;$objForm= new cmsForm();$IdOwner=$objSez->Data->CreatedBy;?>



