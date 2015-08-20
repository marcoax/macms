<?php

 $objPage->showDate = 1;
 $objItemPerPages   = LIST_ITEM_NEWS;
 $objPage->templateListPages;
 $objPage->showDocList = 1;
 include_once(DIR_FS_BLOCKS."news_list_home.inc.php");
 if($pageTopId == $curArticle || $curArticle==EVENTS_ID || $_GET['searchword']!=''){
 	$domain = 'eventi';
    include_once(DIR_FS_BLOCKS."news_list.inc.php");
 } 
 else {
 	$objPage->Template ='news';
 	include_once(DIR_FS_BLOCKS."news_single.inc.php");
 }

