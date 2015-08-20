<?php
$objItemsList= new eventi();
$objItemsList->_ma_getList('eventi');
$objItemsList->setOrder('at.DateStart asc ');
if(NEWS_USE_LANGUAGE==1)$objItemsList->wObj->setEq('Lang',$lang);
$objItemsList->wObj->setEq('at.Pub',1);
$objItemsList->wObj->setMagg('DateStart',date('Y-m-d'));

$objItemsList->setLimit(0,NEWS_NEXT_EVENTS);
$objItemsList->debug=0;
$objItemsList->getData();
$objHPnews=new articoli();
$objHPnews->ma_getTopParent('eventi');
$objHPnewsId=$objHPnews->Data->Id;
$htlmPage='';
//  estraggo anche l'id  della pagina  delle  news 
if($objItemsList->Data){
 
    $i=1;
	

	foreach($objItemsList->Data as $news){
	    //$news=articoli::lang_text_helper($news->Dominio,$news,$lang);
	   	$dataStart=invDate::initInvDate($news->DateStart);
		//$dataStart=ma_format_date($news->DateStart,'D-m-Y');
		
	    $arr = explode("-",$news->DateStart);
	    $curYearStart=$arr[0];
	    $curMonthStart=(int)$arr[1];
	    $curDayStart=(int)$arr[2];
		
	    $dataStop=invDate::initInvDate($news->DateStop);
    	$arrStop = explode("-",$news->DateStop);
	    $curYearStop=$arrStop[0];
	    $curMonthStop=(int)$arrStop[1];
	    $curDayStop=(int)$arrStop[2];		
	    $dateTitle=$dataStart;
		
		if($dataStop) {
	       $dateTitle.=" - ". $dataStop;
		}
		$news->t='lista';
		$itemUrl=pathHndler($news);
		$htlmPageImg=ma_make_image_tt($news->Img,'',$news->Name,'img-responsive',$tt='&w=50&h=50&zc=1');;
		$htlmPage.="<dl class=\"dl-horizontal\">\n";
			$htlmPage.="<dt><a href=\"".$itemUrl."\">".$htlmPageImg."</a></dt>\n";
			$htlmPage.="<dd >\n";
				$htlmPage.="<p><a href=\"".$itemUrl."\"><b>".$dateTitle."</b><br>".String::string_limiter(stripslashes($news->Descrizione),NEWS_MAX_WORD_HOME,'...')."</a></p>\n"; 
			$htlmPage.="</dd>\n";
		$htlmPage.="</dl>\n";
	}
}
else { $htlmPage.="<h3>Nessun Evento</h3>";}
$htmlListNewsLast= $htlmPage;

?>

<div class="posts margin-bottom-20">
    <div class="headline headline-md"><h2><?php echo CL_NEXT_EVENTS?></h2></div>
    <?php echo  $htmlListNewsLast?>
</div>
