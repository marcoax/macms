<?php 
$objFSSliderHtml = new ma_bootstrap_slider();
$objFSSliderHtml->carouselId    = "pageCarousel_small".$carCode;
$objFSSliderHtml->showControl   = 1;

$objFSSliderHtml->showContainer = 0;
$objFSSliderHtml->setImageTypeFilter( IMG_PAGE_SLIDER_ID );
$objFSSliderHtml->setData( $objItemsList->Data )->setArrowBack(DIR_WS_IMAGES."arrow_back.png")->setArrowNext(DIR_WS_IMAGES."arrow_next.png");
$objFSSliderHtml->createSlider();