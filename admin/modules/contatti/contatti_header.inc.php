<?php
  $hideFeItem=0;  $hideExtraItem=1;  $objSez= new $Id_sez();  if($mode!='up'){   	$objSez->_ma_pre_getData($Id);      	$objSez->getData(2);	  }
  
  $mainTab=$objSez->tablename;  $titoloItem=$objSez->Data->Firstname.' '.$objSez->Data->Surname;  $objPage->bc_titoloItem=ma_get_pageTitle($titoloItem,$objSez->sezTitle,'');   $titoloItemFe=$objSez->feTitle.' / '.$objSez->Data->Firstname.' '.$objSez->Data->Surname;  $objForm= new cmsForm();  $IdOwner=$Id;  ?>