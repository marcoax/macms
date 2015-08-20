<?php 
$objPage->hideSocial=1;


$htlmPage.="";
$itemUrl=ma_get_full_url('news.php');
		//$htlmPage.=ma_create_pageTitle($objPage->Name,'2','');
$dateTitle=invDate::initInvDate($objPage->DateStart);
$dataStop=invDate::initInvDate($objPage->DateStop);
if($dataStop) {
		   $dateTitle.=" - ".$dataStop;
}
//$htlmPage.="<h3 class=\"subtitle viola\">".invDate::initInvDate($objPage->DateStart)."</h3>";
$htlmPage.="<div class=\"blog-post-tagswww\">\n";
    $htlmPage.="<ul class=\"list-unstyled list-inline blog-info rrssb-buttons clearfix\">\n";
        $htlmPage.="<li><i class=\"fa fa-calendar\"></i> ".$dateTitle."</li>\n";
   $htlmPage.="</ul>\n";
$htlmPage.="</div>\n";

$htlmPage.="<div class=\"blog-img\">\n";

$htlmPage.=ma_make_image_tt($objPage->Img,'',$objPage->Name,'img-responsive margin-bottom-30',$tt='&w=900&zc=1');
$htlmPage.="</div>\n";
$htlmPage.="<div class=\"tag-box tag-box-v2\"><p>".$objPage->Descrizione."</p></div>";
$htlmPage.=$objPageDocHtml;


//$htlmPage.="<a href=\"".$itemUrl."\" class=\"btn btn-primary\">".CL_TORNA_ALLE_NEWS."</a>\n";
$htlmPageData="<!--Blog Post--> ".$objBoot->getSpan($htlmPage,'blog margin-bottom-40')->render()." <!--End Blog Post-->  ";
