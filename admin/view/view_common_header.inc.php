<?
  $objSez= new $Id_sez();
  if($mode!='up'){
  	$objSez->_ma_pre_getData($Id);
    $objSez->getData(2);
  }
  $objTitolo=$objSez->titoloItem;
  $mainTab=$objSez->tablename;
  $titoloItem=ma_get_pageTitle($objSez->Data->$objTitolo,$objSez->sezTitle);
  $objForm= new cmsView();
?>



