<?php

$objBoot   = new ma_bootstrap_helper;
$objBHTML  = new boostrapHtml();
//$objMobile     	= new Mobile_Detect;
//estraggo i dati per  creare il menu principale
$objMenu = new articoli();
$objMenu->debug          = 0;
$objMenu->TopOnly        = 0;// show only the top category;
$objMenu->Order          = ' FlagMenuTop DESC, Sort,Id Desc,Label';
$objMenu->disableArticle = 1;
$objMenu->hideDomain     = 1 ;
//$objMenu->excludeDomain  = "documenti";
if( $webApp->config->isMultiLang )$objMenu->getPageTree($lang,'',0);
else $objMenu->_ma_combo_parent($curArticle,'','Sort');//  senza  lingua
$objMenuMainData=$objMenu->Data;
if($curPage=='home' && !String::ma_not_null($curArticle)){
    $objHP = new articoli();
	$objHP->ma_getTopParent($curPage);
    $curArticle = $objHP->Data->Id;
}
elseif(!String::ma_not_null($curArticle)) {
    $objHP = new articoli();
	$objHP->debug=0;
    $objHP->ma_getTopParent($curPage);
    $curArticle = $objHP->Data->Id;
}

// prendo il top  parent della  pagina
$objPageData = new articoli();
$objPageData->ma_getTopParentByPage($curArticle);
$pageTopId   = $objPageData->Data->Id;
$pageTopData = articoli::lang_text_helper($objPageData->Data->Dominio,$objPageData->Data,$lang);;
$objPageData->getPageData($curArticle);
$objPageData->debug=0;
$objPage     = $objPageData->getData(2);
$objPage->Template=$objPage->Code;
$curPage=$objPage->Template;

// popolo  il menu  di sezione **************************************************************************/
$objMenuTree=new treeHTML();
if( $webApp->config->isMultiLang == true ){
   $objMenuTree->setData($objPageData->tablename,'',$lang,'d.Sort','cd.Label');
   $objMenuTree->setTipo('Name');   
}
else {
   $objMenuTree->setData($objPageData->tablename,'','','d.Sort','d.Name');
}
$objMenuTree->_ma_combo_parent($curArticle,'',0,' and d.Id="'.$pageTopId.'"');


// verifico se  visualizzare     anche  la  top  page  o  solo le  sub page
if($objPageData->Data->hasSub==1 && $curArticle==$pageTopId){ 
    if($objMenuTree->arrayDataTree[1]->hasSub==1)$curArticle=$objPageData->get_first_child($objMenuTree->arrayDataTree[1]->a,$objMenuTree->arrayDataTree);
	else $curArticle=$objMenuTree->arrayDataTree[1]->a; 
   	$objPageData->getPageData($curArticle);
	$objPageData->debug=0;
	$objPage=$objPageData->getData(2);
	$objPage->Template=$objPage->Code;
}

//langualist se ho +  di una  lingua
if( $webApp->config->isMultiLang ) {
   $objPage = articoli::lang_text_helper($objPage->Dominio,$objPage,$lang);
}
//  sanitize  some  var
else  {
	$objPage->Name       = stripslashes($objPage->Name);  // titolo pagina
	$objPage->ImgBanner  = stripslashes($objPage->ImgBanner); // banner pagina
	$objPage->Descrizione= stripslashes($objPage->Descrizione); // descrizione pagina
} 
     
if(SEO_ENABLED==1){

   $objPageData->getPageData($curArticle,$lang,'SEO_META_TITLE');
   $objPageData->getData(2);
   $objPage->Meta_Title=stripslashes($objPageData->Data->b);

   $objPageData->getPageData($curArticle,$lang,'SEO_META_DESCRIPTION');
   $objPageData->getData(2);
   $objPage->Meta_Description=stripslashes($objPageData->Data->b);
 
   $objPageData->getPageData($curArticle,$lang,'SEO_META_KEYWORD');
   $objPageData->getData(2);
   $objPage->Meta_Keywords=stripslashes($objPageData->Data->b);
   
   $objPageData->getPageData($curArticle,$lang,'SEO_META_ROBOTS');
   $objPageData->getData(2);
   $objPage->Meta_Robots=stripslashes($objPageData->Data->b);

   $objPageData->getPageData($curArticle,$lang,'SEO_META_TITLE_ATTRIBUTE');
   $objPageData->getData(2);
   $objPage->Meta_Title_Attribute=stripslashes($objPageData->Data->b);
   
   $objPageData->getPageData($curArticle,$lang,'SEO_META_TITLE_MENU');
   $objPageData->getData(2);
   $objPage->Meta_Title_Menu=stripslashes($objPageData->Data->b);
} 
/* seo  */
$objPage->pageTitle 	   = ( $objPage->Meta_Title )  		? $objPage->Meta_Title:WEBSITE_TITLE;//' - '.$objPage->Namesss;  // titolo pagina usato  nel  tag tigle  tigle 
$objPage->imgTitle  	   = ( $objPage->Meta_Title )  		? $objPage->Meta_Title:$objPage->Name;
$objPage->Meta_Description = ( $objPage->Meta_Description)  ? $objPage->Meta_Description:$objPage->Description;


$objPage->pageTopId    	= $pageTopId;
$objPage->MenuMainData 	= $objMenu->comboTreeArray;  //ora  ho estratto  i   dati della   pagina
$objPage->Template		= ( $objPage->Template) ? $objPage->Template:$curPage;
$objPage->topData		= $pageTopData;
$objPage->imgBck		=( String::ma_not_null($objPage->ImgThumb) )?$objPage->ImgThumb:$pageTopData->ImgThumb;

// face book   handlaer
$objPage->curPageURL    = Tool::ma_curPageURL();
$objPage->imgFacebook   = WEBSITE_SITE.'/images/thumb.jpg';
$objPage->urlFacebook   = FB_SHARER_URL.$objPage->curPageURL; // indirizzo   completo della  pagina



$objPage->Liv0Dec 		= SITE_SEPA_HEADER.' ';
$objPage->Liv1Dec 		= SITE_SEPA_MENU_SX.' ';
$objPage->showLiv1Link 	= 1;
$objPage->templateListPages = 'pages';

 /**********************personalizzazione  x  tipologia  di pagina *******************************/


//*******************************************creo il menu principale
$objHtmlMenu              = new ma_mega_menu();
$objHtmlMenu->data        = $objPage->MenuMainData;
$objHtmlMenu->cssSelected = 'active';
$objHtmlMenu->pageData    = $objPage;
$objHtmlMenu->curParent   = $objPage->pageTopId;
$objHtmlMenu->curPage     = $objPage->a;
$objHtmlMenu->showSubMenu = 1;
$objHtmlMenu->sep 		  = SITE_SEPA_MENU;
$objHtmlMenu->createBootStrapMenu();
$objHtmlMenu->setData($objPage->MenuMainData)->getChilds($objHtmlMenu->curPage);



//*******************************************************creo il menu  di  secondo  livello della pagina
$objHtmlMenuSx             = new ma_accordion_menu();
$objHtmlMenuSx->pageData   = $objPage;
$objHtmlMenuSx->lang       = $lang;
$curCategory = (String::ma_not_null($IdCategory)) ? $IdCategory : $objMenuTree->arrayDataTree[1]->a;
$objHtmlMenuSx->data        = $objMenuTree->arrayDataTree;
$objHtmlMenuSx->cssSelected = 'active';
$objHtmlMenuSx->curArticle  = ( $curPage=='pageshort' ) ? $objPage->IdParent:$curArticle;
$objHtmlMenuSx->showCurCat  = '';
$objHtmlMenuSx->showCat     = $objPage->showCat;
$objHtmlMenuSx->sepaMenu    = SITE_SEPA_MENU_SX;
$objHtmlMenuSx->showLiv1Link= $objPage->showLiv1Link;
$objHtmlMenuSx->showAllLink =  $objPage->showAllLink;
$objHtmlMenuSx->showSubMenu = 0;
$objHtmlMenuSx->showTree    = 1 ;
if($IdCategory)$objHtmlMenuSx->IdParent=$IdCategory;
$objHtmlMenuSx->Liv1Dec     = $objPage->Liv1Dec;
$objHtmlMenuSx->Liv0Dec     = $objPage->Liv0Dec;
$objHtmlMenuSx->sezClass    = $objPage->menuSezClass;
$objHtmlMenuSx->curParent   = $IdCategory;
$curItemId=( $curPage=='pageshort' ) ? $objPage->IdParent : $curArticle;
$objHtmlMenuSx->createMenu($curItemId,$objPage->IdParent);



/* ********************************************* creo footer ********************/
$objHtmlMenuFooter=new ma_footer_menu();
$objHtmlMenuFooter->pageData=$objPage;
$objHtmlMenuFooter->data=$objPage->MenuMainData;
$objHtmlMenuFooter->sep=SITE_SEPA_MENU;
$objHtmlMenuFooter->cssSep='azzurro';
$objHtmlMenuFooter->cssItem='azzurro';
$objHtmlMenuFooter->createMenu();

/**************************  NAVIGAZIONE DI PAGINA ***********************/
$objHtmlMenuP=new ma_page_menu();
$objHtmlMenuP->pageData=$objPage;
$objHtmlMenuP->data=$objMenuTree->arrayDataTree;
$objHtmlMenuP->createMenu($curItemId,$objPage->IdParent);
$objHtmlMenuP->getNavArrows();


// ************************************************estraggo i  dati dell'albero e creo il bc;
$objTree= new articoli;
if( $webApp->config->isMultiLang ) {
	$objTree->lang=$lang;
	$objTree->IdTipo='Name';
}
$objTree->debug =0;
$objTree->getAll=1;
$objTree->getTreeFromChild($objPage->Id);

$objHtml_bC=new ma_bc_menu();
$objHtml_bC->class="item_bc";
$objHtml_bC->add_item( DIR_WS_HOMEPAGE."","<b class=\"nero\">".strtoupper(CL_HOME)."</b>");
$objHtml_bC->add_Tree($objTree->arrayRevBreadCrumbs);
$objHtml_bC->sep="";
$objHtml_bC->create_BC();


// **********************estraggo la  lista dei  documenti allegati alla pagina//
$objItemsDocList= new gallery();
$IdDocPage=($curItem)?$curItem:$objPage->Id;
$docDomain=($curPage=='newseeee')?'documentieventi':'documenti'; // non piu  usato
if( $webApp->config->isMultiLang)$objItemsDocList->makeGallery($docDomain,$IdDocPage,$lang);
else $objItemsDocList->makeGallery('documenti',$IdDocPage);
$objItemsDocList->debug = 0 ;
$objItemsDocList->SetOrder('IdDocumento DESC');
$objItemsDocList->getData();

$objDocHtml= new simple_list();
$objDocHtml->setAttributes( array("class" => "list-unstyled docList"))->setData($objItemsDocList->Data)->createDocList($curArticle,'','','opa');
$objPageDocHtml=$objDocHtml->html;


//galleria immagini pagina
$objItemsList= new gallery();
$objItemsList->makeGallery('immagini'.$objPage->docSuffix,$curArticle);
$objItemsList->debug = 0 ;
$objItemsList->getData();


// estraggo  i   social
$objSocial     = articoli::getLinks('social');
$objSocialHtml = new simple_list();
$objSocialHtml->setAttributes( array("id" => "socialList", "class" => "unstyled"))->setData($objSocial->Data)->createList($curArticle,'','','opa');
