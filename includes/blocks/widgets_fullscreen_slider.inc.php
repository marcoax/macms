<?php 

$objFSSlider     = articoli::getLinks('slider','sort');
$objFSSliderHtml = new ma_fullpage_slider();
$objFSSliderHtml->setData($objFSSlider->Data)->setArrowBack(DIR_WS_IMAGES."arrow_back.png")->setArrowNext(DIR_WS_IMAGES."arrow_next.png");
if( $webApp->config->isMultiLang == true )$objFSSliderHtml->createSlider( $lang );
else $objFSSliderHtml->createSlider( '' );