<?php
// funziona  che  crea  l'html  generico   di  aiuto per  creare  tutte  le  parti  di un  sito
class ma_bootstrap_helper{
    public $html;
	public $lang;
	
	public function __construct()
	{
    	global $lang;
		$this->lang = $lang;
	}

	// setto  gli attributi
	public function setAttributes($attributes){
		if(!is_array($attributes)){
			trigger_error('Invalid type for (X)HTML attributes',E_USER_ERROR);
		}

		foreach($attributes as $attribute=>$value){
			$this->attributes.=$attribute.'="'.$value.'" ';
		}
		return $this;
	}
	
	// setto i dati
	public function setData($data){
		$this->data=$data;
		return $this;
	}
	
	// render  html
	public function render(){
		
		return $this->html;
	}
    
	public function getContainer($html){
		$this->html="<div class=\"container\">\n";
			$this->html.="<div class=\"row\">\n";
				$this->html.=$html;
			$this->html.="</div><!-- /rowr -->\n";
        $this->html.="</div><!-- /container -->\n";
		return $this;
	}
	   
    public function getRow($html){
		$this->html="<div class=\"row\">\n";
		$this->html.=$html;
        $this->html.="</div>\n";
		return $this;
	}
	
	public function getSpan($html,$span="",$style=''){
		
		$this->html="<div class=\"".$span."\">\n";
		$this->html.=$html;
        $this->html.="</div>\n";
		return $this;
	}
	public function getSepa($class=" border-line"){
		$this->html="<div class=\"col-xs-12  ".$class."\"></div>\n";
		//$this->getRow($this->html);
		return $this;
	}
}


class boostrapHtml extends ma_bootstrap_helper {
	
	public $showIntro = false;
	public $showSubTitle = false;
	public $hideTitle = false;
	
	// factory method (chainable)
	public static function factory()
	{

		return new self();
	}
	
	public function __construct()
	{

		 parent::__construct();
	}
	
	
	
	public function setShowIntro(){
		$this->showIntro=true;
		return $this;
	}
	public function setHideTitle(){
		$this->hideTitle=true;
	    return $this;
	}
	public function setShowSubTitle(){
		$this->showSubTitle=true;
	    return $this;
	}
	
	public function getSimpleRow($obj,$spanDx,$spanSx,$useSlider=false,$ancor=false,$headerTag='h2'){
		
        $htlmPageDx = "";
		if( $ancor == true )            $htlmPageDx  .= "<a name=\"ser\"></a>\n";
		if ( $this->hideTitle    == false) $htlmPageDx  .= $this->getPageTitle($obj,$headerTag);
		if ( $this->showSubTitle == true ) $htlmPageDx  .= $this->getPageSubTitle($obj,'h2');
		if ( $this->showIntro    == true ) $htlmPageDx  .= "<p class=\"light text-justify\">".stripslashes($obj->Intro)."</p>\n";
		$htlmPageDx 	               .= "<p>".stripslashes( $obj->Descrizione)."</p>\n";
		$htlmPageSpan                  = $this -> getSpan($htlmPageDx,$spanDx)->render();
		if( $obj->Doc )  $htlmPageSx = boostrapHtml::embedYouTube($obj->Doc,'16');
		else if($obj->Img && $useSlider==false) {
			$htlmPageSx	= "<img class=\"img-responsive-100\" src=\"". ma_get_image_from_repsitory($obj->Img)."\" 
						alt=\"".stripslashes($obj->Name)."\" border=\"0\">\n";
		}
		else {
			$htlmPageSx = $this->getPageGallery($obj);
		}
		if($spanSx) $htlmPageSpan 	.= $this -> getSpan($htlmPageSx,$spanSx)->render();  
		$htlmPageRow	            =  $this -> getRow( $htlmPageSpan) -> render();
		
		return $this;
	}
	
	public function getSimpleRowFull( $obj, $spanFull, $intro = true,$headerTag='h2'){
		
		$htlmPageDx 		= $this->getPageTitle( $obj,$headerTag 	);
		if($intro == true) $htlmPageDx 	.= "<p class=\"text-justify\"><b>".stripslashes($obj->Intro)."</b></p>\n";
		else $htlmPageDx 	.= "<p>".stripslashes( $obj->Descrizione)."</p>\n";
		
		$htlmPageSpan 	 	= $this -> getSpan($htlmPageDx,$spanFull)->render();
		$htlmPageDx  		= "<img class=\"img-responsive-100\" src=\"". ma_get_image_from_repsitory($obj->Img)."\"	  					 		alt=\"".stripslashes($obj->Name)."\" border=\"0\">\n";
		//$htlmPageSpan 	.= $this -> getSpan($htlmPageDx,$spanSx)->render();
		$htlmPageRow		=  $this -> getRow( $htlmPageSpan) -> render();
		
		return $this;
	}
	
	
	function getPageGallery($obj){
		$objFSSliderHtml = new ma_bootstrap_slider();
		$objFSSliderHtml->carouselId="pageCarousel_".$obj->Id;
		$objFSSliderHtml->carouselCss="carousel midPage";
		$objFSSliderHtml->setImageSize(1150,500);
		//$objFSSliderHtml->setImageTypeFilter(182);
		$objFSSliderHtml->setData($obj->Media)->setArrowBack(DIR_WS_IMAGES."arrow_back.png")->setArrowNext(DIR_WS_IMAGES."arrow_next.png");
		$objFSSliderHtml->createSlider($this->lang);
		return $objFSSliderHtml->html;
		
	}
	
	function getPageTitle( $obj, $headerTag ,$css=''){
		
	    $title			 = $obj->Name;
		$title			 = ( WEBSITE_SEPA ) ? WEBSITE_SEPA.' '.$title:$title;
		$this->pageTitle = "<".$headerTag." class=\"".$css."\">".stripslashes($title)."</".$headerTag.">\n";
		return  $this->pageTitle;
	}
	function getPageSubTitle( $obj, $headerTag ,$css=''){
		
	    $title			 = $obj->SubTitle;
		$title			 = ( WEBSITE_SEPA ) ? WEBSITE_SEPA.' '.$title:$title;
		$this->pageTitle = "<".$headerTag." class=\"".$css."\">".stripslashes($title)."</".$headerTag.">\n";
		return  $this->pageTitle;
	}
	
	function getPageMedia( $objPage, $type='immagini' ) {
        $objItemsPageList= new gallery();
		$objItemsPageList->makeGallery( $type.$objPage->docSuffix, $objPage->Id );
		$objItemsPageList->debug =0;
		$objItemsPageList->getData();
		return $objItemsPageList->Data;
	
	}
	
	public static function embedYouTube($doc,$format=4){
		$_videoClass = ($format==4) ?'embed-responsive-4by3':'embed-responsive-16by9';
		$htlmPage   .= "<div class=\"embed-responsive ".$_videoClass."\">\n";
	    $htlmPage   .= "<iframe class=\"embed-responsive-item\" src=\"//www.youtube.com/embed/".$doc."\" allowfullscreen=\"\"></iframe>\n";
	   	$htlmPage   .= "</div>";
		return $htlmPage;
	}
	
	public static  function createFaButton($string){
        $html="<i class=\"fa ".$string."\"></i>"; 
        return $html;
    }
}


class boostrapThumb extends ma_bootstrap_helper {
	
	public $isDoc     = false;
	public $imageType ;
	
	
	// factory method (chainable)
	public static function factory()
	{

		return new self();
	}
	
	public function __construct()
	{

		 parent::__construct();
	}
	
	public function setIsDoc($value){
		$this->isDoc = $value;
		return $this;
	}
	public function setImageType($value){
		$this->imageType = $value;
		return $this;
	}
	
	public function createPageThumb($class,$classCol)
	{

	    if($this->data){
	   		$i = 0;
			foreach($this->data as $d){
				if( $this->lang!='' ) $d = articoli::lang_text_helper($d->Dominio,$d,$this->lang);
				$itemImg = $this->imageHandler($d->Img);
				$d->t = $d->Code;
	    		if( $this->isDoc) $itemUrl = ma_get_doc_from_repsitory($d->Doc);
				else  $itemUrl = Tool::seoPathHandler( $d);
				$this->html.="<div class=\"".$classCol."\">\n";
    				$this->html.="<div class=\"thumbnail ".$class."\">\n";
					    $this->html .= "<div class=\"box-image\">\n";
							$this->html .= "<a href=\"".$itemUrl."\" title=\"".$d->Name."\" >\n";
								$this->html .= "<img src=\"".$itemImg."\" alt=\"".$d->Name."\" class=\"img-responsive-100\">\n";
							$this->html .= "</a>\n";
							$this->html .= "<a href=\"".$itemUrl."\" title=\"".$d->Name."\">\n";
							$this->html .="<div class=\"caption-image\">\n";
								$this->html .= boostrapHtml::createFaButton('fa-search-plus fa-4x color-6 fa-rotate-90');
							$this->html.="</div>\n";
							$this->html .= "</a>\n";
						$this->html.="</div>\n";
						$this->html .= "<div class=\"caption bck-color-2\">\n";
							$this->html .= "<h3 class=\"color-main\">".$d->Name."</h3>\n";
						$this->html.="</div>\n";
						//$this->html .= String::string_limiter(stripslashes($d->Descrizione),LIST_MAX_WORD,' ...',0)."\n";
						//$this->html .= stripslashes($d->Intro)."\n";
						
					$this->html.="</div>\n";
				$this->html.="</div>\n";
				$i++;
			}
	
	    }
	    return $this;
   }

   
   
   public function createMediaThumb($class,$classCol)
	{

	    if($this->data){
	   		$i = 0;
			foreach($this->data as $d){
				if( $this->lang!='' ) $d = articoli::lang_text_helper($d->Dominio,$d,$this->lang);
				$itemImg = $this->imageHandler($d->Img);
				$d->t = $d->Code;
	    		if( $this->isDoc) $itemUrl = ma_get_doc_from_repsitory($d->Doc);
				else  $itemUrl = Tool::seoPathHandler( $d );
				$this->html.="<div class=\"".$classCol."\">\n";
    				$this->html.="<div class=\"media ".$class."\">\n";
						$this->html .= "<div class=\"media-left relative\">\n";
							$this->html .= "<a href=\"".$itemUrl."\" title=\"".$d->Name."\">\n";
								$this->html .= "<img  style=\"width: 164px; height: 164px;\" src=\"".$itemImg."\" alt=\"".$d->Name."\" class=\" media-object  img-circle\">\n";
							$this->html .= "</a>\n";
							$this->html .= "<a href=\"".$itemUrl."\" title=\"".$d->Name."\">\n";
							$this->html .="<div class=\"zoom-image\">\n";
								$this->html .= boostrapHtml::createFaButton('fa-search-plus fa-4x color-6 fa-rotate-90');
							$this->html.="</div>\n";
							$this->html .= "</a>\n";
						$this->html.="</div>\n";
						
						$this->html .= "<div class=\"media-body media-middle\">\n";
							$this->html .= "<a href=\"".$itemUrl."\" title=\"".$d->Name."\">\n";
							$this->html .= "<h2 class=\"media-heading\">".$d->Name."</h2>\n";
							$this->html .= "</a>\n";
						$this->html.="</div>\n";
						;
					$this->html.="</div>\n";	
				
				$this->html.="</div>\n";
				$i++;
			}
	
	    }
	    return $this;
	}
   
  
   
   private function imageHandler($img,$tt='&w=300&h=300&zc=1') 	{
        
		
		switch ($this->imageType ) {
		    case "tt":
		        $itemImg = DIR_WS_CLASS."timthumb.php?src=".ma_get_image_from_repsitory($img).$tt;
		        break;
		   default:
				$itemImg = ma_get_image_from_repsitory($img);
		}
	    return $itemImg;
	}
}
	 