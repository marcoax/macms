<?php 

$parola  =($_GET['searchword']!='')?$_GET['searchword']:'';
$objItemsPageList  = new eventi();
$objItemsPageList->_ma_getList($domain);
$objItemsPageList->setOrder('at.DateStart desc,at.Id desc ');
if(NEWS_USE_LANGUAGE==1)$objItemsPageList->wObj->setEq('Lang',$lang);

//$objItemsPageList->wObj->setEq('at.IdParent',$objPage->a);
$objItemsPageList->wObj->setEq('at.Pub',1);
if($parola)$objItemsPageList->wObj->setOr("at.Name like '%".$parola."%' or at.Descrizione like '%".$parola."%'");



$objItemPerPages=($objItemPerPages)?$objItemPerPages:LIST_ITEM_PAGE;
$objItemsPageList->setLimit(0,$objItemPerPages);
$objItemsPageList->sep="  ";
$objItemsPageList->initPager($objItemPerPages,"",$stringaPercorso);
$count=$objItemsPageList->getCount();
$objPage->subMenu=$objItemsPageList->pagelist;
$objItemsPageList->debug=0;
$objItemsPageList->getData();


$objHPnews=new articoli();
$objHPnews->ma_getTopParent('news');
$objHPnewsId=$objHPnews->Data->Id;

$nItems=count($objItemsPageList->Data);
//  estraggo anche l'id  della pagina  delle  news 

if($objItemsPageList->Data){

    $i=1;
	$htmlList='';

	foreach($objItemsPageList->Data as $news){
	    $news=articoli::lang_text_helper($news->Dominio,$news,$lang);
     	$dataStart=invDate::initInvDate($news->DateStart);
		$dataStart=ma_format_date($news->DateStart,'D-M-Y');
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
	       $dateTitle.=" - ".ma_format_date($news->DateStop,'D-M-Y');
		}

		$news->t='lista';
		$itemUrl=Tool::seoPathHandler( $news );
		
		    $objItemsPageList= new gallery();
			$objItemsPageList->makeGallery('immagini'.$objPage->docSuffix,$news->a);
			$objItemsPageList->debug=0;
			$objItemsPageList->getData();
            $htlmPageSpan ='';
		    $htlmPage     =$objBHTML->getPageTitle($news,'h2','');
			//$htlmPage     .="<h5 class=\"color-blue mb25\"><i class=\"fa fa-calendar\"></i>".$dateTitle."</h5>";
			
			//$htlmPage.="<p class=\"text-justify\">".String::string_limiter(stripslashes($news->Descrizione),LIST_MAX_WORD_SHORT,'...')."</p>\n";
			$htlmPage.="<div class=\"text-justify mt20\">".stripslashes($news->Descrizione)."</div>\n";
			//$htlmPage.="<p class=\"botton-btn mf0\"><a href=\"".$itemUrl."\" class=\"btn-u btn-u-small  btn-sm-full\"><i class=\"fa fa-location-arrow\"></i> ".CL_CONTINUA."</a></p>\n";
			
			$htlmPageImg =ma_make_image_tt($news->Img,'',$news->Name,'img-responsive',$tt='&w=662&h=424&zc=1');
			if($news->Img)$htlmPageSpan.=$objBoot->getSpan($htlmPageImg,' col-sm-12 col-md-6 col-md-push-6 mb15-max-sm')->render();
			if($news->Img)$htlmPageSpan.=$objBoot->getSpan($htlmPage,'col-xs-12 col-md-6 relative txt-box col-md-pull-6')->render();
			else $htlmPageSpan.=$objBoot->getSpan($htlmPage,'col-xs-12 col-md-12')->render();
			
			//$htlmPageSpan.=$objBoot->getSpan($htlmPageCarousel,4)->render();
			
			$htmlList.="<!--Blog Post-->\n";
			$htmlList.="<div class=\"row \">\n";
					$htmlList.=$htlmPageSpan;
			$htmlList.=" </div><!--End Blog Post-->    \n";
			if( $nItems > $i)$htmlList.=" <hr class=\"mv25\">   \n";
			else $htmlList.=" <hr class=\"mt25 mb5\"><div class=\"clearfix\"></div>\n";

				
				
		
	$i++;

	}

}

else {$htmlList.="<h3>".MSG_NO_ATTIVITA."</h3>";}

$htlmPageData = $htmlList;
$htlmPageData.= $objPage->subMenu;
$htmlList='';
