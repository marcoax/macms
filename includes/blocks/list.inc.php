<?php 
$objItemsPageList= new articoli();
$objItemsPageList->_ma_getList();
$objItemsPageList->setOrder('at.Sort');
$objItemsPageList->debug = 0;
$objItemsPageList->wObj->setEq('at.IdParent',$objPage->a);
$objItemsPageList->wObj->setEq('at.Pub',1);
$objItemsPageList->getData();
$objDownloadList = new boostrapThumb();
$objDownloadList->setData( $objItemsPageList->Data )->createPageThumb('docList','col-sm-6 col-md-3');
