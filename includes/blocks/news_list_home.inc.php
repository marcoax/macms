<?php
$objItemsListNewsHome = new eventi();
$objHPnews = new articoli();
if($objItemsListNewsHome->Data){
    $i=1;
	foreach($objItemsListNewsHome->Data as $news){
	    $curDayStart   = (int)$arr[2];
	    $curYearStop   = $arrStop[0];
		$itemUrl       = Tool::seoPathHandler($news);
}
else { $htlmPage.="<h3>".MSG_NO_ATTIVITA."</h3>";}