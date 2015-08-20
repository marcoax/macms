<?php
// funziona  che  crea  l'html  generico   di  aiuto per  creare  tutte  le  parti  di un  sito
abstract class ma_html_builder{
    public $pageChilds;
	
	public $imgPath;
	public $useAncor;
	public $nCol;
	public $imgType  ='Img';
	public $hideLink = 0;
	public $itemLink = null;
	public $paginationCarSuffix;
	public $itemList = array();
	public $nextItem = 0;
	public $prevItem = 0;
	
	public function __construct()
	{


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
    
	// setto l'immagine
	public function setImg($img){
		$this->imgType = $img;
		return $this;
	}
	
	// setto  path l'immagine
	public function setImgPath($imgPath){
		$this->imgPath = $imgPath;
		return $this;
	}
	
	function  setItemLink($Link){
   	  $this->itemLink = $Link;
	  return $this;
   	}
	// setto  uso ancore
	public function setAncor(){
		$this->useAncor = true;
		return $this;
	}
	
	// setto  uso ancore
	public function setHideLink($value){
		$this->hideLink=$value;
		return $this;
	}
	
	// setto  n  colonne pe r bbostrap
	public function setCol($col){
		$this->nCol=$col;
		return $this;
	}
	
   public  function getCssClass($curClass=''){
   	  return $classString=($curClass!='')?'class="'.$curClass.'"':'';
   }
   
   //funzion ache  regola  la   costruzione del menu
   public function validate_page_menu($d,$curPage){
   
	   if($d->a==$curPage && $d->FlagLeftMenu==1){
	   		
	   		return true;
	   	}
	   	else if($d->IdParent==$curPage && $d->FlagLeftMenu==1){
	   		return true;
	   	}
	    else if($d->IdParent==$curPage && $d->hasSub==1){
	    	echo  "sub";
	   		return true;
	   	}
	    else return  false;
    }
   
	//maneggio i link  del menu
	  
	public function getChilds($curPage,$liv=1){
		if($this->data[$this->curPagelevel+1]){
			foreach($this->data[$this->curPagelevel+1] as $d){
				if($d->IdParent==$curPage){
				$this->pageChilds[]=$d;
				}
			}
		}
		return this;
	}
	
	public function getNavArrows(){
		
		$this->prevItem = $this->curItem-1;
		$this->nextItem = $this->curItem+1;
		
		if($this->prevItem <0 ){
			$this->prevItem = $this->nItem-1;
		}
		if($this->nextItem>=$this->nItem){
			$this->nextItem = 0;
	    }
		$this->prevItemUrl = $this->itemList[$this->prevItem];
		$this->nextItemUrl =  $this->itemList[$this->nextItem]; 			//e
	    return this;
	}
	
    
   /****************************** LINK  E ALTRI HELPER ****************************************/
   
   public function linkHandler($d) {
		$curUrl= '';
		if($d->t=='home')  $curUrl=DIR_WS_CATALOG;
		elseif($d->t=='external-link' &&  String::ma_not_null($d->Site)) $curUrl = Tool::ma_prep_url($d->Site);
		else $curUrl=($d->hasSub==1 && WEBSITE_HAS_SUB_PAGE=='false')?'#':Tool::seoPathHandler( $d );
		return $curUrl;
	}
   
	
	public static function ma_helper_mailto($email = WEBSITE_EMAIL,$class = ''){
		$classStyle=($class)?"class=\"".$class."\"":"";
		return "<a href=\"mailto:".$email."\" ".$classStyle.">".$email."</a>\n";
	}
	
	public static function ma_helper_url($url,$title='',$target='',$class=''){
		$classStyle=($class)?"class=\"".$class."\"":"";
		$targetStyle=($target)?"target=\"".$target."\"":"";
		$title=($title)?$title:$url;
		$url=Tool::ma_prep_url($url);
		return "<a href=\"".$url."\" ".$classStyle."  ".$targetStyle."   >".$title."</a>\n";
	}
	
	
	
	/************************************** render the view template ****************************/
	public function render(){
		echo $this->html;
	}
}



class textarea extends ma_html_builder{
	 
	function  textarea($attributes=array(),$data){
		$this->setAttributes($attributes);
		$this->data=$data;
	}

	function getHTML(){
		$this->html="<textarea ".$this->attributes." >".stripslashes($this->data)."</textarea>\n";
		return $html;
	}
}

class input extends ma_html_builder {
	 
	function  input($attributes=array(),$data){
		$this->setAttributes($attributes);
		$this->data=$data;
	}
	 
	function getHTML(){
		$this->html="<input ".$this->attributes."  value=\"".stripslashes($this->data)."\" />\n";
		 
	}
}


class alink extends ma_html_builder{
	 
	function  textarea($attributes=array(),$data){
		$this->setAttributes($attributes);
		$this->data=$data;
	}

	function getHTML(){
		$this->html="<a href='' ".$this->attributes." >".stripslashes($this->data)."</a>\n";
		return $html;
	}
}



class simple_list extends ma_html_builder{
	
	// factory method (chainable)
	public static function factory()
	{

		return new self();
	}
	
	
	
	public function createList($curPage,$prefix='',$itemExclude='',$class='') {
	   	if($this->data){
	  
		$this->html="<ul ".$this->attributes.">\n";
		$i = 0;
		$this->html.="<li class=\"list-label\">/ ".CL_SEGUICI_SU."</li>\n";
		foreach($this->data as $d){
			if($d->a!=$itemExclude) {
				$pageActive='';
				if($curPage==$d->a){
					$pageActive='class="current"';
				}
				if($d->Site) {
					$imgHtml="<img src=\"".ma_get_image_from_repsitory($d->Img)."\" alt=\"".$d->b."\" border=\"0\" class=\"".$class."\">\n";
					if($d->Img)$this->html.="<li id=\"".$d->pageCode."\">".$prefix."<a href=\"".$d->Site."\" ".$pageActive." target=\"_news\">".$imgHtml."</a></li>\n";
				    else $this->html.="<li d=\"".$d->pageCode."\">".$prefix."<a href=\"".$d->Site."\" ".$pageActive." target=\"_news\">".$d->b."</a></li>\n";
				}
				else {
				if($d->Imgs)$this->html.="<li id=\"".$d->pageCode."\">".$prefix."".$imgHtml."</li>\n";
				else $this->html.="<li d=\"".$d->pageCode."\">".$prefix."".$d->b."</li>\n";

				}
				$i++;
			}
		}
	}
	$this->html.="</ul>\n";
	return $this;
   }
	
	
	public function createListTxt($curPage,$prefix='',$itemExclude='',$class='',$label) {
	   	if($this->data){
	  
		$this->html="<ul ".$this->attributes.">\n";
		$i = 0;
		if($label)$this->html.="<li class=\"list-label\">".$label."</li>\n";
		foreach($this->data as $d){
			if($d->a!=$itemExclude) {
				$d->t       = $d->Code;
				$pageActive = '';
				if($curPage==$d->a){
					$pageActive='class="current"';
				}
				if($this->itemLink!=null){
					 $curUrl = $this->itemLink."?item_id=".$d->a;
				     $this->html.="<li id=\"".$d->pageCode."\">".$prefix."<a href=\"".$curUrl."\" ".$pageActive." >".$d->b."</a></li>\n";
     			} 
				else if($d->Site) {
					$this->html.="<li id=\"".$d->pageCode."\">".$prefix."<a href=\"".$d->Site."\" ".$pageActive." target=\"_news\">".$d->b."</a></li>\n";
				}
				else {
					 $curUrl     = pathHndler($d);
				     $this->html.="<li d=\"".$d->pageCode."\">".$prefix."<a href=\"".$curUrl."\" ".$pageActive." >".$d->b."</a></li>\n";
     			}
				$i++;
			}
		}
	}
	$this->html.="</ul>\n";
	return $this;
   }
	

   
   public function createDocList($id='',$itemExclude='',$fa_icon='') {
	   	if($this->data){
	   		
		$this->html="<ul ".$this->attributes.">\n";
		$i=0;
		foreach($this->data as $d){
			if($d->IdDocumento!=$itemExclude) {
				
				
				$arrayDoc  = explode('.',$d->Doc);
			    $ext       = $arrayDoc[count($arrayDoc)-1];
		        $title     = stripslashes($d->Title);
			    $this->html.="<li class=\"".$arrayDoc[count($arrayDoc)-1]."\">\n";
               
                $this->html.="<a href=\"".DIR_WS_REPOSITORY.'doc/'.$d->Doc."\" target=\"_new\"   title=\"".$title."\">\n";
				if( $fa_icon !='') $this->html.="<i class=\"fa ".$fa_icon."\"></i> ";
                //$htmlList.="<img src=\"images/link_img.png\" width=\"28\" height=\"41\" alt=\"".$title."\"  border=\"0\">\n";
			    $this->html.=$title;
			    //$htmlList.="[ ".$ext." ]\n";
			    $this->html.="</a>";
			    $this->html.="</li>\n";
				$i++;
			}
		}
	}
	$this->html.="</ul>\n";
	return $this;
   }
}




class ma_mega_menu extends ma_html_builder {

	// factory method (chainable)
	public static function factory($data)
	{

		return new self();
	}

	public function createMenu(){
		if($this->data){
			$i=1;
			$this->countItem=1;
			foreach($this->data[0] as $d){
					
				if($d->flagMenuTop==1){
					 $this->countItem++;
				}
			}
			foreach($this->data[0] as $d){
				
			if($d->flagMenuTop==1){
				    $d->t=$d->Code;
				    if(	$this->sepBefore!='')$this->html.="<li class=\"sepa\"> ".$this->sep." </li>\n";
					if($d->t=='home')$curUrl=DIR_WS_CATALOG;
					
                    else $curUrl=($d->hasSub==1 && WEBSITE_HAS_SUB_PAGE=='false')?'#':pathHndler($d);
					$this->curClass=($d->a==$this->pageData->pageTopId)?'segnaposto-sec menutrigger':'menutrigger';
					$this->html.='<li '.$this->getCssClass($this->curClass).' id="'. $d->pageCode.'"><a href="'.$curUrl.'" '.$this->getCssClass($this->curClass).'>';
					$this->html.=stripslashes($d->b);
					$this->html.="</a>";
					if($this->showSubMenu==1 && $this->curParent==$d->a)$this->html.=$this->createSubMenu($d->a);
					if($this->showMenuMega==1)$this->html.=$this->createMegaMenu($d->a);
					if($this->showMenuMegaFull==1)$this->createMegaMenuFull($d->a);
					$this->html.="</li>\n";
					if($this->countItem>$i+1 && $this->sep!='')$this->html.="<li class=\"sepa\">".$this->sep."</li>\n";
					$i++;
				}
			}

		}
	}
	
    public function createMegaMenu($curId,$liv=1){
		if($this->data){
			foreach($this->data[$liv] as $d){
				
			   if($liv==2)$d->b." - ".$curId." - ".$d->IdParent."<br>";
			   if($d->IdParent==$curId){
			   	 
			   	  if($d->flagMenuTop==1) {
			   	  	  $d->t=$d->Code;
			   	  	  $curUrl=($d->hasSub=1 && WEBSITE_HAS_SUB_PAGE=='false')?'#':pathHndler($d);
			   	  	  $htmlChild.="\n";
			   	      $htmlChild.='<li class="liv_'.$liv.'">';
			   	 	      $htmlChild.='<a href="'.$curUrl.'" class="selected">'.stripslashes($d->b).'</a>';
			   	    	   //$htmlChild.='<ul>';
			   	    	   if($liv==1)$htmlChild.=$this->createMegaMenu($d->a,2);
				   	       foreach($this->data as $s){
				   	       	  if($d->a==$s->IdParent && $d->hasSub==1)$htmlChild.='<li class="liv_2"><a href="'.pathHndler($s).'">'.stripslashes($s->c).'</a></li>';	
				   	       }
				   	      //$htmlChild.='</ul>'; 
			   		   	  $htmlChild.='</li>';
			   		   	  $htmlChild.="\n";
			      }
			   	  //else $htmlChild.='<li class="liv_1"><a href="'.$curUrl.'">'.stripslashes($d->c).'</a></li>'; 
			   }
			}
			if($htmlChild!='') {
				//$html='<div>';
				   $html.="\n";
					$html.='<ul  class="megaLista">';
					$html.=$htmlChild;	
					$html.="</ul>\n";
					//$html.="</div>\n";
			}
		}
		return $html;
    }
	
	
	
	
	//old
	
	public function createMegaMenuFull($curId,$liv=0,$lang){
		if($this->data){
			foreach($this->data[$liv] as $d){
			 $d=articoli::lang_text_helper($d->Dominio,$d,$lang);
			   $this->fullMegaMenu.="<div id=\"menu-bar-".$d->pageCode."\" class=\"menu-bar hide\">\n";
               $this->fullMegaMenu.="<div class=\"container\">\n";
            	 $this->fullMegaMenu.="<div class=\"row\">\n";
            		$this->fullMegaMenu.="<div class=\"segnaposto\">".$d->TitleMenu."</div>\n";
                 $this->fullMegaMenu.="</div>\n";
                  $this->fullMegaMenu.="<div class=\"row\">\n";
                  $this->fullMegaMenu.=$this->createMegaMenuFullChild($d,1,$lang);
                  $this->fullMegaMenu.="</div>\n";
                      
            $this->fullMegaMenu.=" </div>\n";
        $this->fullMegaMenu.=" </div><!-- /menu-bar -->\n";
			
			}
		}
		return $this->fullMegaMenu;
    }
    
    
    public function createMegaMenuFullChild($curData,$liv=0,$lang){
    	
							
		if($this->data){
		    $parentArray=array();
			
			foreach($this->data[$liv] as $d){
			  //$this->data[2]=array_reverse($this->data[2], true);
			  if($d->IdParent==$curData->a){
				  $d=articoli::lang_text_helper($d->Dominio,$d,$lang);
				   
				   if($curData->pageCode=="news"){
				      return;    
	              } 
				  
				   else if($curData->pageCode=="profilo"){
				        $d->t="listagallery";
				        $d->a='450';
			   	  	    $curUrl=pathHndler($d,true);
				  		$fullMegaMenu.="<div class=\"contenitoreSub\">\n";
			      
	                           $fullMegaMenu.="<div class=\"headerBox\">".$d->b."</div>\n";
	                           $fullMegaMenu.="<div><a href=\"".$curUrl."\"> <img src=\"".ma_get_image_from_repsitory($d->ImgThumb)."\"></a></div>\n";
	                    $fullMegaMenu.=" </div><!-- /menu-bar -->\n";       
	              }             
	              elseif( $curData->pageCode!="network"){
	                   
	                    $d->t=$d->Code;
				       
			   	  	    $curUrl=pathHndler($d,true);
			   	  	    
	                    if(!in_array($curData->pageCode,$parentArray))$fullMegaMenu.=$this->createLastProject($curData,$lang,$curUrl);
	                    $fullMegaMenu.="<div class=\"contenitoreSub\">\n";
	                	    $fullMegaMenu.="<div class=\"headerBox\"><a href=\"".$curUrl."\">".$d->b."</a></div>\n";
	                	    $fullMegaMenu.="<div class=\"itemBox\">\n";
	                	    $i=0;
							if($this->isReversed!=1)$this->data[2]=array_reverse($this->data[2], true);
							$this->isReversed=1;
			            	foreach($this->data[2] as $s){
			            	   	if($s->IdParent==$d->a &&  $i<7) {
			            	   	    $s->t=$s->Code;
				       	   	  	    $curSubUrl=pathHndler($s,true);;
			            	   	    $fullMegaMenu.="<div><a href=\"". $curSubUrl."\">".$s->b."</a></div>\n";
			            	   	    $i++;
			            	   	}
	                         
			            	}
			            	$fullMegaMenu.="</div>\n";
			                if($i>6)$fullMegaMenu.="<div class=\"tutti\"><a href=\"".$curUrl."\">".CL_VEDI_TUTTI."</a></div>\n";
	                    $fullMegaMenu.=" </div><!-- /menu-bar -->\n";
	                    array_push($parentArray, $curData->pageCode);      
	              }              
	             
			  }
			}
		}
		return $fullMegaMenu;
    }
      
    
    
	
	public function createSubMenu($curId,$liv=1){
		//print_r($this->data);
		if($this->data[$liv]){
			foreach($this->data[$liv] as $d){
				
			   if($liv==2)$d->b." - ".$curId." - ".$d->IdParent."<br>";
			   if($this->curPage==$d->a) {
				   $this->curPagelevel=$liv;
			   }
			   if($d->IdParent==$curId && $d->flagMenuTop==1){
			   	 
			   	  	  $d->t=$d->Code;
				   
			   	  	  $curUrl=$this->linkHandler($d);
					  
					  $target=($d->t=='external-link')?"  target='_blank'":'';
			   	  	  $htmlChild.="\n";
			   	      $htmlChild.='<li class="liv_'.$liv.'">';
			   	 	     if($this->curPage==$d->a) {
			   	 	     	  $htmlChild.='<a href="'.$curUrl.'" class="selected"  '.$target.'>'.stripslashes($d->b).'</a>';
							  $this->curPagelevel=$liv;
						 }
			   	 	     else $htmlChild.='<a href="'.$curUrl.'" '.$target.'>'.stripslashes($d->b).'</a>';
			   	      $htmlChild.='</li>';
			   		  $htmlChild.="\n";
			     
			   }
			}
			if($htmlChild!='') {
				
				   $html.="\n";
					$html.='<ul  class="dropdown-menu">';
					$html.=$htmlChild;	
					$html.="</ul>\n";
					
			}
		}
		return $html;
    }
	 
    
    
    
    
    public function createBootStrapMenu(){
		if($this->data[0]){
			$i=1;
			$this->countItem    = 1;
			$this->curPagelevel = 0;
			foreach($this->data[0] as $d){
				if($d->flagMenuTop==1){
					 $this->countItem++;
				}
			}
			foreach($this->data[0] as $d){
				if($d->flagMenuTop==1){
					    $d->t = $d->Code;
					    $this->htmlSubmenu = '';
					    if(	$this->sepBefore != '')   $this->html.="<li class=\"sepa\"> ".$this->sep." </li>\n";
						
					    $curUrl=$this->linkHandler($d);
						
						if($this->showSubMenu==1)$this->htmlSubmenu=$this->createSubMenu($d->a);
						$this->curClass=($d->a==$this->pageData->pageTopId)?$this->cssSelected:'';
						if($this->htmlSubmenu) {
							$this->html.='<li '.$this->getCssClass($this->curClass.' dropdown').' id="'. $d->pageCode.'"><a href="'.$curUrl.'" '.$this->getCssClass($this->curClass.' dropdown-toggle ').' data-toggle="dropdown">';
						    $this->html.=stripslashes($d->b);
						    $this->html.="<b class=\"caret\"></b></a>";
							$this->html.=$this->htmlSubmenu;
						}
						else{
							$this->html.='<li '.$this->getCssClass($this->curClass).' id="'. $d->pageCode.'"><a href="'.$curUrl.'" '.$this->getCssClass($this->curClass).'>';
						    $this->html.=stripslashes($d->b);
						    $this->html.="</a>";
						}
						$this->html.="</li>\n";
						if( $this->countItem > $i+1 && $this->sep !='' )$this->html.="<li class=\"sepa hidden-xs\">".$this->sep."</li>\n";
						$i++;
					}
				}
			}
		}

}



class ma_page_menu extends ma_html_builder {

	// factory method (chainable)
	public static function factory()
	{

		return new self();
	}

	public function createMenu($curArticle,$pageTopId,$l=0){
	  $this->pageTopId=$pageTopId;
	  $this->nItem=0;
	  if($this->data){
			foreach($this->data as $d){
			    //if($l==1)echo "Parent ".$d->IdParent.'Id-'.$d->a."- P".$pageTopId." - ".$d->c."<br>_______<br>"; 
			    
				//if($this->validate_page_menu($d,$this->pageTopId)){
					$d->t=$d->Code;
			   		//if($l==1)echo $d->IdParent.'-'.$d->a."__<br>_______<br>".$pageTopId."<br>";
					$curUrl=Tool::seoPathHandler($d);
					$this->curClass=($d->a==$this->curArticle)?$this->cssSelected:'';
					$this->htmlItem='<li class="liv_'.$d->l.'" '.$this->getCssClass($this->curClass).'><a href="'.$curUrl.'" '.$this->getCssClass($this->curClass).'>';
					$this->htmlItem.=stripslashes($d->b);
					$this->htmlItem.="</a>";
					$this->htmlItem.="</li>\n";
					
					if($d->IdParent == $this->pageTopId){
						$this->itemList[] = $curUrl;
						if($d->Id ==$curArticle)$this->curItem.=$this->nItem;
						$this->nItem++;
					}
					//echo $d->l;
					//echo $l++;
					//echo $d->a.$d->c;
					//echo "<br>";
					//if($l<2)$this->createMenu($d->a,$d->a,$l+1);
			    }
			
		}
	}

	
}

/*********************************** footer ****************************/
class ma_footer_menu extends ma_html_builder {

	// factory method (chainable)
	public static function factory()
	{

		return new self();
	}

	public function createMenu(){
	  if($this->data){
			foreach($this->data as $d){
			   
			    //prima  mostro  quelli di livello uno
			 	if($d->flagMenuFooter==1){
			 	   
			   		$curUrl=pathHndler($d);
					$this->curClass=($d->a==$this->curArticle)?$this->cssSelected:$this->cssItem;
					$this->html.="\n";
				    $this->html.='<ul><li>';
				        if($d->Template=='pop') 
				        
				        {
				        	$curUrl.="?iframe=true&width=500&height=500";
				        	$this->html.='<a href="'.$curUrl.'" '.$this->getCssClass($this->curClass).' rel="prettyPhoto[mixed]">';
				        }
				        
				        
				        
				    	else $this->html.='<a href="'.$curUrl.'" '.$this->getCssClass($this->curClass).'>';
					$this->html.=stripslashes($d->b);
					$this->html.="</a>";
					$this->html.="</li>";
					
					if($this->showChild==1) {
					   if($d->a==4)$this->createChild(9,'prodotti');// escamotage per  prodotti
					   else $this->createChild($d->a,'footer');// escamotage per  prodotti
					   
					}
					$this->html.="</ul>\n";
					if($this->sep && $d->Id!='123'){
					    //$this->html.='<ul><li class="'.$this->cssSep.'">'.$this->sep.'</li></ul>';
						
					}
					
			    }
			}
		}
	}
	
	
public function createChild($Id,$da='no'){

		
	  if($this->dataChild=='')$this->dataChild=ma_get_item_TreeFooter($Id,'article',' and flagMenuFooter=1');
	  
	  //print_r($this->data);
	 // echo "qui".$da.'<br>';
	  if($this->dataChild){
	        $this->html.="\n";
	  	    $this->html.='<ul>';
			foreach($this->dataChild as $d){
			   	if($d->flagMenuFooter==1 && $d->IdParent==$Id){
				   $this->html.='<li>';
			 	    $d->t=$d->Code;
			   		$curUrl=pathHndler($d);
					$this->curClass=($d->a==$this->curArticle)?$this->cssSelected:$this->cssItem;
				        if($d->Code=='popup')     
				        {
				        	
							//$curUrl.="?iframe=true&width=500&height=500";
				        	$this->html.='<a href="'.$curUrl.'" '.$this->getCssClass($this->curClass).' id="'.$d->pageCode.'">';
				        }
				        
				        
				        
				    else $this->html.='<a href="'.$curUrl.'" '.$this->getCssClass($this->curClass).'>';
					$this->html.=strtolower(stripslashes($d->b));
					$this->html.="</a>";
					$this->html.="</li>\n";
					if($this->showChild==1)$this->createChild($d->a);
				
					if($this->sep){
					    //$this->html.='<li class="'.$this->cssSep.'">'.$this->sep.'</li>';
						
					}
					
			    }
				
				//if($this->showChild==1)$this->createChild($d->a);
			}
			$this->html.="</ul>\n";
		}
	}
	
}
/*********************************** briciole *********************************/


class ma_bc_menu extends ma_html_builder {

	// factory method (chainable)
	public static function factory()
	{
        $this->nItem=0;
		return new self();
	}
    
	
    public function add_item($url='',$label)
	{

		
		$this->bcPath[$this->nItem]['url']=$url;
		$this->bcPath[$this->nItem]['label']=stripslashes($label);;
	    $this->nItem++;
	}
	
	public function add_Tree($data){
	   $this->data=$data;
	   $this->countItem=count($this->data);
	   if($this->data){
			foreach($this->data as $d){
				    $d->pageCode=$d->c;
				    $curUrl = Tool::seoPathHandler( $d );
					if($d->b)$this->add_item($curUrl,$d->b);
			}
		}
	}
	
	
	
     public function create_BC()
	{

	    $this->countItem=count($this->bcPath[0]);
	    
	    $i=0;
	   
		foreach($this->bcPath as $d){
          	$this->showUrl=($i==$this->nItem-1)?false:true;
          
			$this->html.='<li class="'.$this->class.'" >';
			if($this->showUrl)$this->html.="<a href=\"".$d['url']."\"  title=\"".strip_tags($d['label'])."\">";
			$this->html.=stripslashes($d['label']);
			if($this->showUrl)$this->html.="</a>";
			if($this->showUrl)$this->html.=$this->sep;
			$this->html.='</li>';
			$i++;
		}
		
	
	}
	
}

/**********************************full width  slider **********************************/
class ma_fullpage_slider extends ma_html_builder {
	
	
	public $arrowBack="&lsaquo;";
	public $arrowNext="&rsaquo;";
	public $carouselCss="carousel";
	public $carouselId="myCarousel";

	// factory method (chainable)
	public static function factory()
	{

		return new self();
	}

	public function createSlider($lang){
	  
	  if($this->data){
	  	    $i=0;
	  	    $this->html="<!-- Carousel ================================================== -->
            <div id=\"".$this->carouselId."\" class=\"".$this->carouselCss." slide\" data-ride=\"carousel\">\n";
				$this->html.="<div class=\"carousel-inner\">\n";
		       	foreach($this->data as $d){
		       		$classItem = ( $i==0 ) ? "active":"";
		       		if( $lang )  $d = articoli::lang_text_helper($d->Dominio,$d,$lang);
		       		$this->html.=" <div class=\"item  ".$classItem."\">\n";
					     $this->html.="<img src=\"".ma_get_image_from_repsitory($d->Img)."\" alt=\"\">\n";
						 $this->html.=$this->createContainer($d);
						 
		       		$this->html.="</div>\n";
					$i++;
		       	}
				$this->html.="</div>\n";
				//$this->html.=$this->createControl();
				if( $i > 1) $this->html.=$this->createIndicator();
			$this->html.="</div><!-- /.carousel -->\n";
		}
		$this->html;
		
		
	}
	
	private  function createContainer($d) {
		 $htmlContainer.="<div class=\"container\">\n";
            $htmlContainer.="<div class=\"carousel-caption full-screen\">\n";
			  $htmlContainer.="<h2>".$d->Name."</h2>\n";
              if( $d->Descrizione !='') $htmlContainer.="<p class=\"lead\">".$d->Descrizione."</p>\n";
              //<a class="btn btn-large btn-primary" href="#">Sign up today</a>
            $htmlContainer.="</div>\n";
          $htmlContainer.="</div>\n";
          return $htmlContainer;
	}
	
	private  function createControl() {
		
		
		 $htmlContainer.="<a class=\"left carousel-control\" href=\"#".$this->carouselId."\" data-slide=\"prev\">". $this->getArrowBack()."</a>\n";
		 $htmlContainer.="<a class=\"right carousel-control\" href=\"#".$this->carouselId."\" data-slide=\"next\">". $this->getArrowNext()."<</a>\n";
         return $htmlContainer;
	}
	
	private  function createIndicator() {
		 $i=0;
	     if($this->data){
	        $htmlContainer.="<ol class=\"carousel-indicators\">\n";
	  	   	foreach($this->data as $d){
	  	   		  $classItem=($i==0)?"active":"";
	  	   		  $htmlContainer.="<li data-target=\"#".$this->carouselId."\" data-slide-to=\"".$i."\" class=\"".$classItem."\"></li>\n";
				  $i++;
	  	   	}
	        $htmlContainer.="</ol>\n";
	     }
         return $htmlContainer;
	}
	
	// setto i dati
	public function setArrowBack($data){
		$this->arrowBack=($data)?"<img src=\"".$data."\"/>":$this->arrowBack;
		return $this;
	}
    
	// setto l'immagine
	public function getArrowBack(){
		return $this->arrowBack;
		
	}
	
	// setto i dati
	public function setArrowNext($data){
		$this->arrowNext=($data)?"<img src=\"".$data."\"/>":$this->arrowNext;
		return $this;
	}
    
	// setto l'immagine
	public function getArrowNext(){
		return $this->arrowNext;
	}
	
}

/**********************************full width  slider **********************************/
class ma_bootstrap_slider extends ma_html_builder {
	
	
	public $arrowBack	 = "&lsaquo;";
	public $arrowNext	 = "&rsaquo;";
	public $carouselCss	 = "carousel";
	public $carouselId	 = "myCarousel";
	public $imgWidth	 = 780;
	public $imgHeight	 = 350;
	public $captionTitle = '';
	public $captionCss   = '';
	public $IdFilter	 = '';
	public $showContainer = 1;

	// factory method (chainable)
	public static function factory()
	{

		return new self();
	}

	public function createSlider(){
	 
	  if( $this->data ){
	  	    $i = 0;
	  	    $this->html="<!-- Carousel ================================================== -->
            <div id=\"".$this->carouselId."\" class=\"".$this->carouselCss." slide\" data-ride=\"carousel\">\n";
				$this->html.="<div class=\"carousel-inner\">\n";
				
		       	foreach($this->data as $d){
		       		$classItem=($i==0)?"active":"";
					if($this->IdFilter==$d->IdSubCategory or  $this->IdFilter==''){
			       		$d=articoli::lang_text_helper($d->Dominio,$d,$lang);
			       		$this->html .= " <div class=\"item  ".$classItem."\">\n";
							    $this->html .= ma_make_image_tt('img/'.$d->Doc,'',$d->Title,'img-responsive margin-bottom-30',$tt='&w=1170&zc=1');
							    if( $this-> showContainer == 1)$this->html .= $this->createContainer($d);
							 
			       		$this->html .= "</div>\n";
						$i++;
					}
		       	}
				$this->html.="</div>\n";
				if( $this->showControl == 1) $this->html.=$this->createControl();
				if( $this->hideIndicator != 1 && $i > 1) $this->html.=$this->createIndicator();
			$this->html.="</div><!-- /.carousel -->\n";
		}
		$this->html;
		
		
	}
	
	private  function createContainer($d) {
		 $caption = ($this->captionTitle)?$this->captionTitle:$d->Title;
		 $htmlContainer.="<div class=\"container\">\n";
            $htmlContainer.="<div class=\"carousel-caption ".$this->captionCss."\">\n";
              $htmlContainer.="<h2>".stripslashes($caption)."</h2>\n";
              $htmlContainer.="<p class=\"lead\">".$d->Descrizione."</p>\n";
              //<a class="btn btn-large btn-primary" href="#">Sign up today</a>
            $htmlContainer.="</div>\n";
          $htmlContainer.="</div>\n";
          return $htmlContainer;
	}
	
	private  function createControl() {
		 $htmlContainer.="<a class=\"left  carousel-control\" href=\"#".$this->carouselId."\" data-slide=\"prev\">". $this->getArrowBack()."</a>\n";
		 $htmlContainer.="<a class=\"right carousel-control\" href=\"#".$this->carouselId."\" data-slide=\"next\">". $this->getArrowNext()."</a>\n";
         return $htmlContainer;
	}
	
	private  function createIndicator() {
		 $i=0;
	     if($this->data){
	        $htmlContainer.="<ol class=\"carousel-indicators\">\n";
	  	   	foreach($this->data as $d){
	  	   		if($this->IdFilter==$d->IdSubCategory or  $this->IdFilter==''){
		  	   		  $classItem=($i==0)?"active":"";
		  	   		  $htmlContainer.="<li data-target=\"#".$this->carouselId."\" data-slide-to=\"".$i."\" class=\"".$classItem."\"></li>\n";
					  $i++;
				}
	  	   	}
	        $htmlContainer.="</ol>\n";
	     }
         return $htmlContainer;
	}
	
	// setto i dati
	public function setArrowBack($data){
		$this->arrowBack=($data)?"<img src=\"".$data."\"/>":$this->arrowBack;
		return $this;
	}
    
	// setto l'immagine
	public function getArrowBack(){
		return $this->arrowBack;
		
	}
	
	// setto i dati
	public function setArrowNext($data){
		$this->arrowNext=($data)?"<img src=\"".$data."\"/>":$this->arrowNext;
		return $this;
	}
    
	// setto l'immagine
	public function getArrowNext(){
		return $this->arrowNext;
	}
	
	public  function  setImageTypeFilter($Id){
		$this->IdFilter=$Id;
		return $this;
	}
	
	public  function  setImageSize($w,$h){
		$this->imgWidth = $w;
		$this->imgHeight= $h;
		return $this;
	}
	
	public  function  setCaptionTitle( $value ){
		$this->captionTitle = stripslashes($value);
		
		return $this;
	}
	
	
	private function getImage($d) { 
		
		return ma_get_image_from_repsitory($d);

	}
	
	private function getTtImage($d) {
		return ma_make_image_tt('img/'.$d->Doc,'',$d->Title,'img-responsive margin-bottom-30',$tt='&w='.$this->imgWidth.'&h='.$this->imgHeight.'&zc=1');
	}
							
	
}


/**********************************accordion **********************************/
class ma_accordion_menu extends ma_html_builder {

	// factory method (chainable)
	public static function factory()
	{

		return new self();
	}

	public function createMenu($curArticle,$pageTopId,$l=0){
	  if($this->data){
	        $arrayTitle=array();
	  	    $i=0;
		  if($this->addScroll!='')$this->html.='<div class="giustificaMenuLong flexcroll">';
			foreach($this->data as $d){
			
				 //if($l==1)echo "Parent ".$d->IdParent.'Id-'.$d->a."- P".$pageTopId." - ".$d->c."<br>_______<br>"; 
			    $d->t=$d->Code;
				if($this->validate_page_menu($d,$pageTopId) && ($d->a==$this->showCurCat or !String::ma_not_null($this->showCurCat)) && $d->FlagLeftMenu==1){
			   		//if($l==1)echo $d->IdParent.'-'.$d->a."__<br>_______<br>".$pageTopId."<br>";
					$d->t=$d->Code;
					$curUrl=$this->linkHandler($d);
					 $target=($d->t=='external-link')?"  target='_blank'":'';
					$this->curClass=($d->a==$this->curArticle or  $d->a==$this->curParent)?$this->cssSelected:$this->sectionClass;
					
					$this->curLivClass=($d->a==100000)?$this->cssSelected:'liv_'.$d->l;
					// se � il primo  non  metto la  spaziatura
					if($i>0 && $d->l==$this->livSep)$this->html.="<div class=\" list-group-item liv_".$d->l."_sepa\"></div>\n";
					
					if($d->l==1 && $this->showCat==1 && !in_array($d->IdOpzione,$arrayTitle)) {
					     array_push($arrayTitle,$d->IdOpzione);
		   		         $d->Category= articoli::ma_getFastDescrizione('materiali','Name',$d->IdOpzione,$this->lang);
					     if($this->pageData->IdOpzione!=$d->IdOpzione && $this->curClass!=$this->cssSelected)$this->html.="<div  class=\"liv_c\">/ ".$d->Category."</div>\n";
					     else $this->html.="<div  class=\"liv_s\">/ ".$d->Category."</div>\n";
					
                     }
					
					
					if($i==0) $this->html.='<div '.$this->getCssClass($this->curLivClass.' list-group-item '.$this->curClass).'>'.$this->livSepUno;
					else $this->html.='<div '.$this->getCssClass($this->curLivClass.' list-group-item  '.$d->Code.' '.$this->curClass).'>';
					if($this->showLiv1Link==1 && $d->l!=$this->hideLinkLiv)$this->html.='<a href="'.$curUrl.'" '.$this->getCssClass($this->curClass).' '.$target.' >';
                    if($d->l==0) $this->html.=$this->Liv0Dec;
                    if($d->l==1) $this->html.=$this->Liv1Dec;
					$this->html.=stripslashes($d->b);
				    if($this->showMenuSubTitle==1)		{
						$subTitle=articoli::getDescrizioneByLang($d->a,$this->lang,'TitleMenu','articoli');
						if($subTitle)$this->html.="<br><i>".stripslashes($subTitle)."</i><br><br>";
					}
					if($this->showLiv1Link==1 && $d->l!=$this->hideLinkLiv)$this->html.="</a>";
					
					//$d->l;
					
					
					$this->html.="</div>\n";
					$i++;
					//echo $d->a.$d->c;
					//echo "<br>";
					if($d->IdParent!=''  && $this->showTree==1)$this->createSubMenu($d->a,2);
					if($d->l==0 && $this->showAllLink==1){
					$this->curClassAll=($curArticle==$pageTopId)?'selected':'';
					    
					    $this->html.='<div class="liv_1">';
						$this->html.='<a href="'.$curUrl.'" '.$this->getCssClass($this->curClassAll).'  >';
						
						$this->html.=$this->Liv1Dec.''.CL_ALL;
						$this->html.="</a>";
						$this->html.="</div>\n";
					}
			    }
				else if($this->validate_page_menu($d,$pageTopId) && $d->a!=$this->showCurCat){
				    $this->get_first_child($d->a);
					 $this->dataChild->t=$this->dataChild->Code;
					$curUrl=pathHndler($this->dataChild);
					$this->htmlsub.='<div ><a href="'.$curUrl.'?IdCategory='.$d->a.'" >';
					$this->htmlsub.=stripslashes($d->b);
					$this->htmlsub.="</a>";
					$this->htmlsub.="</div>\n";
				
				}
			}

         if($this->addScroll!='')$this->html.='</div>';
		}
		$this->html;
		
		
	}
	
	
	public function createSubMenu($curArticle,$l){
		$this->hasSub=0;
		if($this->data){
			foreach($this->data as $d){
				if($curArticle==$d->a){
					$this->showCurCat;
					$this->html.='<div class="liv_'.$l.'">';
		
		 			foreach($this->data as $s){
						if($s->IdParent==$curArticle && $s->FlagLeftMenu==1){
							$this->hasSub=1;
						    $s->t=$s->Code;
							//if($l==1)echo $d->IdParent.'-'.$d->a."__<br>_______<br>".$pageTopId."<br>";
							$curUrl=pathHndler($s);
							$this->curClass=($s->a==$this->curArticle or $this->curParent==$s->a)?$this->cssSelected:'';
							$this->html.='<a href="'.$curUrl.'?IdCategory='.$s->IdParent.'" '.$this->getCssClass($this->curClass).'>'.$this->Liv2Dec;;
							$this->html.=stripslashes($s->b);
							$this->html.="</a>";
						}
					}
			
				$this->html.="</div>\n";
				}
			}
		}
	}
	
}



/**********************************accordion **********************************/
class ma_accordion_subpage extends ma_html_builder {

	// factory method (chainable)
	public static function factory()
	{

		return new self();
	}

	public function createMenu($curArticle,$pageTopId,$lang){
	  if($this->data){
	       
	  	    $i=0;
			foreach($this->data as $d){
			    //if($l==1)echo "Parent ".$d->IdParent.'Id-'.$d->a."- P".$pageTopId." - ".$d->c."<br>_______<br>"; 
			  
          
				if($d->IdParent==$pageTopId){
					$d=articoli::lang_text_helper('articoli',$d,$lang);
					
					$objItemsList= new gallery();
					$objItemsList->makeGallery('immagini'.$objPage->docSuffix,$d->a);
					$objItemsList->order="me.Sort,me.Id,me.Title";
					$objItemsList->debug=0;
					$objItemsList->getData();
					if($objItemsList->Data){
					  $this->htmlGallery=makeGalleryList($objItemsList->Data,'gs_2','galleria','thumb_',0);
				    
			   		$this->html.="<div class=\"startmain\"></div>
	                 <div class=\"main\">
		             <div class=\"inner_main second_block\">
			         <div class=\"container_alpha_nogradients portfolio acco\" id=\"".$d->id."\">\n";
					
					// se � il primo  non  metto la  spaziatura
						$this->html.="<h4><strong>".stripslashes($d->b)."</strong></h4>";
						$this->html.="<div id=\"".$d->id."_galleria\">\n";
						if(strlen($d->Descrizione)>10)$this->html.="<p>".stripslashes($d->Descrizione)."</p>";
						$this->html.=$this->htmlGallery;
						$this->html.="</div>";
					
					$this->html.="</div></div></div><div class=\"endmain\"></div>\n";
					}
					//echo $d->l;
					$i++;
					//echo $d->a.$d->c;
					//echo "<br>";
					//if($this->showCurCat)$this->createSubMenu($this->showCurCat,$d->a,2);
			    }
				
			}
		}
		$this->html;
		
		
	}
	
	
	public function createSubMenu($curArticle,$pageTopId,$l){
		if($this->data){
			foreach($this->data as $d){
			if($curArticle==$d->a){
			$this->showCurCat;
			$this->html.='<div class="liv_'.$l.'">';
		    
 			foreach($this->data as $s){
			
					
				if($s->IdParent==$curArticle){
				    $s->t=$s->Code;
					//if($l==1)echo $d->IdParent.'-'.$d->a."__<br>_______<br>".$pageTopId."<br>";
					$curUrl=pathHndler($s);
					$this->curClass=($s->a==$this->curArticle)?$this->cssSelected:'';
					$this->html.='<a href="'.$curUrl.'?IdCategory='.$s->IdParent.'" '.$this->getCssClass($this->curClass).'>';
					$this->html.=stripslashes($s->b);
					$this->html.="</a>";
				}
			}
			
			$this->html.="</div>\n";
				}
			}
		}
	}
	
}

/************************************  slide show **********************/
class ma_img_carousel extends ma_html_builder {

	// factory method (chainable)
	public static function factory()
	{

		return new self();
	}
	
	
	// setto  n  colonne pe r bbostrap
	public function setClassBottoneSlider($classBottoneSlider){
		$this->classBottoneSlider=$classBottoneSlider;
		return $this;
	}
	public function setPaginationCarSuffix($paginationCarSuffix){
		$this->paginationCarSuffix=$paginationCarSuffix;
		return $this;
	}
    
	public function createCarousel($curItem=1){
		
	  if($this->data){
	  	    $imgType=$this->imgType;
	  	    $i=0;
	  	    $this->classBottoneSlider=($this->classBottoneSlider)?$this->classBottoneSlider:"bottoneSlider";
			$this->html="<ul ".$this->attributes.">\n";
			foreach($this->data as $d){
			        
					$this->itemImg=$this->imgPath.$d->$imgType;
					
				    $this->htmlCaption=$this->htmlCaptionPrepend.stripslashes($d->b);
					$d->t=$d->Code;
					if($this->isTag)$this->curUrl=ma_get_full_url('progetti.php')."?tag=".$d->a;
					else if(String::ma_not_null($this->curPageUrl!=''))$this->curUrl=$this->curPageUrl;//'#'.$d->pageCode;
                    else $this->curUrl=pathHndler($d,$this->useAncor);
				    
					$this->html.="<li  style=\"background: url(".ma_get_image_from_repsitory($this->itemImg).") no-repeat\" class=\"span".$this->nCol."\">\n";
					if($this->hideLink!=1)$this->html.="<a href=\"".$this->curUrl."\"><div class=\"".$this->classBottoneSlider."\">".$this->htmlCaption."</div></a>\n";
					$this->html.="</li>\n";
			}
			
			$this->html.="</ul>";
			$this->html.="<div id=\"pagerCarosello_".$curItem."\" class=\"paginationCar".$this->paginationCarSuffix."\"></div>\n";
		}
		
		
	}
	
}
