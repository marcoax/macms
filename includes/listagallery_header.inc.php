<?php 
   if($objHtmlMenu->pageChilds){
   	  
	  foreach($objHtmlMenu->pageChilds as $c) {
	  	    $c=articoli::lang_text_helper($c->Dominio,$c,$lang);
	        $objItemsList= new gallery();
			$objItemsList->makeGallery('immagini'.$objPage->docSuffix,$c->a);
			$objItemsList->debug=0;
			$objItemsList->getData();
			
			if($objItemsList->Data)	{ 		
				$objPageCarousel= new ma_img_carousel();
           	    $objPageCarousel->setAncor()->setCol(12)->setImgPath('img/')->setImg('Doc')->setHideLink(1);
                $objPageCarousel->setAttributes( array("id" => "pageCarosello_".$c->a, "class" => "carosello-full"))->setData($objItemsList->Data);
                $objPageCarousel->createCarousel($c->a);
	            $htlmPageCarousel=$objPageCarousel->html;
			
			
			   $htlmPageCarouselJs.='
				$("#pageCarosello_'.$c->a.'").carouFredSel({
					auto : {
				      			 duration    : "'.BCK_SLIDE_NEXT_DELAY.'",
				       			 timeoutDuration: "'.BCK_SLIDE_TIMER.'",
				                 pauseOnHover: true

    				},
    				
					width   : 960,
					pagination: "#pagerCarosello_'.$c->a.'",
					mousewheel: true,
					swipe: {
						onMouse: true,
						onTouch: true
					},
				    align : "right",
				    items : {
				        width : 960

    				}
				});
			 ';
	        
			$htlmPageSpan=$objBoot->getSpan($htlmPageCarousel,12)->render();
			$htlmPageData.=$objBoot->getContainer($htlmPageSpan)->render();
			$htlmPageData.=$objBoot->getSepa()->render();
			}
			
		
			
	        //$htlmPage=ma_create_pageTitle($c->Name,'2','');
            $htlmPage.="<p class=\"text-justify\">".$c->Descrizione."</p>\n";
        	$htlmPageSpan=$objBoot->getSpan($htlmPage,9)->render();
   
		    
			
			$objItemsDocList= new gallery();
			$objItemsDocList->makeGallery('documenti',$c->a);
            $objItemsDocList->debug=0;
            $objItemsDocList->SetOrder('IdDocumento DESC');
            $objItemsDocList->getData();
			
			if($objItemsDocList->Data) {
				 //$htlmPage=ma_create_pageTitle(MSG_DOWNLOAD_ATTACH,'2','');
				 $objDocHtml= new simple_list();
                 $objDocHtml->setAttributes( array("class" => "sideBarList"))->setData($objItemsDocList->Data)->createDocList($curArticle,'','','opa');
				 $htlmPage.=$objDocHtml->html;
				
				
                 $htlmPageSpan.=$objBoot->getSpan($htlmPage,3)->render();
   
			}	
        	$htlmPageData.=$objBoot->getContainer($htlmPageSpan)->render();
			$htlmPageData.=$objBoot->getSepa()->render();
	  }
   }
