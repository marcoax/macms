<?php
 if($pageTopId==$curArticle || $curArticle==EVENTS_ID){
 	include_once(DIR_FS_BLOCKS."list.inc.php");
} 
 else {
 	$objPage->Template="listacategorie";
	$objItemsPageList= new articoli();
	$objItemsPageList->_ma_getList();
	$objItemsPageList->setOrder('at.Sort');
	$objItemsPageList->debug = 0;
	$objItemsPageList->wObj->setEq('at.IdParent',$objPage->a);
	$objItemsPageList->wObj->setEq('at.Pub',1);
	$objItemsPageList->getData();
	$objCategoryList = new boostrapThumb();
	$objCategoryList->setData( $objItemsPageList->Data )->setImageType( 'tt' )->createMediaThumb('product-gallery','col-sm-6 col-md-4 mb25');
 }
