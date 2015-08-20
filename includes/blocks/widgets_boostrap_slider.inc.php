<?php 
$objFSSliderHtml = new ma_bootstrap_slider();
$objFSSliderHtml->carouselId = "pageCarousel";
//$objFSSliderHtml->setCaptionTitle($objPage->captionSliderTitle);
$objFSSliderHtml->captionCss =' full-screen';
$objFSSliderHtml->showContainer = 0;
//$objFSSliderHtml->setImageSize( 1150,450 	);
$objFSSliderHtml->setImageTypeFilter( IMG_TOP_SLIDER_ID );
$objFSSliderHtml->setData($objItemsList->Data)->setArrowBack(DIR_WS_IMAGES."arrow_back.png")->setArrowNext(DIR_WS_IMAGES."arrow_next.png");
$objFSSliderHtml->createSlider();