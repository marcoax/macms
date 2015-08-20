<?php 
    
	if(ma_getParameter('ac')!='')include_once(DIR_FS_INCLUDES."active_header.inc.php");
	//  get   news
	include_once(DIR_FS_BLOCKS."news_list_home.inc.php");
	//include(DIR_FS_BLOCKS."widgets_carousel_tag.inc.php");
	include(DIR_FS_BLOCKS."widgets_fullscreen_slider.inc.php");
	
	
	$infoPageObj  = articoli::ma_GetPageByCode('prodotti',$lang);
	$objItemsPageList= new articoli();
	$objItemsPageList->_ma_getList();
	$objItemsPageList->setOrder('at.Sort');
	$objItemsPageList->debug = 0;
	$objItemsPageList->wObj->setEq('at.IdParent',$infoPageObj->Id);
	$objItemsPageList->wObj->setEq('at.Pub',1);
	$objItemsPageList->getData();
	$objCategoryList = new boostrapThumb();
	$objCategoryList->setData( $objItemsPageList->Data )->setImageType( 'tt' )->createMediaThumb('product-gallery wow bounceInUp','col-sm-6 col-md-4 mb25');
