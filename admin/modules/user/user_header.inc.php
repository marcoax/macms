<?php 
   $objSez= new $Id_sez();
   
   if( $mode!='up' ){
   	   $objSez->_ma_pre_getData($Id);    
   	   $objSez->getData(2);
	   if( !String::ma_not_null( $objSez->Data->activationCode ) )$objSez->Data->activationCode=$objSez->setActivetionCode( $Id );
   }
   $mainTab=$objSez->tablename;
   $titoloItem=$objSez->Data->Username;
   $objPage->bc_titoloItem=ma_get_pageTitle($titoloItem,$objSez->sezTitle);
   $objForm= new cmsForm();
   $IdOwner=$Id;
  