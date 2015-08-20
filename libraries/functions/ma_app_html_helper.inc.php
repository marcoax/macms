<?php
    /*********************  doc **********************/
	function ma_get_doc_from_repsitory($doc){
		return DIR_WS_REPOSITORY_DOC.$doc; 
	}
	/********      image    *****************/
	function ma_get_image_from_repsitory($img){
		return DIR_WS_REPOSITORY.$img; 
	}
	
	function ma_get_image($img,$lang='') {
		if(String::ma_not_null($lang))return DIR_WS_IMAGES.$lang.'/'.$img;
		else return DIR_WS_IMAGES.$img;
	}
	
	
	function ma_make_image_lb_free($Img,$Imgthumb="small",$title='',$class) {
		$title=stripslashes($title);
		$thumb=($thumb=='none')?'':$thumb.'_';
		if(String::ma_not_null($Img) or ma_not_null($Imgthumb)){
		if(String::ma_not_null($Img)) $imgHtml.="<a href=\"".ma_get_image_from_repsitory($Img)."\" class=\"lightbox\" rel=\"lista\" title=\"".$title."\">\n";
			$imgHtml.="<img src=\"".ma_get_image($Imgthumb)."\" alt=\"".$title."\" border=\"0\" class=\"".$class."\">\n";
			if(String::ma_not_null($Img) )$imgHtml.="</a>\n";
		}
		return $imgHtml;
	}
	
	
	
	function ma_make_image_fancybox_tt($Img,$thumb="small",$title='',$class,$tt='&w=200&h=200&zc=2&q=100') {
		$title=stripslashes($title);
		$thumb=($thumb=='none')?'':$thumb.'_';
		   
		if(String::ma_not_null($Img)){
			$imgHtml.="<a href=\"".ma_get_image_from_repsitory($Img)."\" class=\"fancybox-button zoomer\" data-rel=\"fancybox-button\" title=\"".$title."\">\n";
			$imgHtml.="<span class=\"overlay-zoom\"><img src=\"".DIR_WS_CLASS."timthumb.php?src=".ma_get_image_from_repsitory($Img).$tt."\" alt=\"".$title."\" border=\"0\" class=\"".$class."\">\n";
			$imgHtml.="<span class=\"zoom-icon\"><i class=\"fa fa-search-plus fa-4x color-6 fa-rotate-90\"></i></span>\n";
			$imgHtml.="</span>\n";
			$imgHtml.="</a>\n";
		}
		return $imgHtml;
	}
	
	
	function ma_make_image($Img,$thumb="small",$title='',$class) {
		$title=stripslashes($title);
		if(String::ma_not_null($Img)){
			$imgHtml.="<img src=\"".ma_get_image_from_repsitory($thumb.'_'.$Img)."\" alt=\"".$title."\" border=\"0\" class=\"".$class."\">\n"; 
		}
		return $imgHtml;
	}

	function ma_make_image_lib($Img,$thumb="small_",$title='',$class='') {
		$title=stripslashes($title);
		if(String::ma_not_null($Img)){
			$imgHtml.="<img src=\"".ma_get_image($thumb.$Img)."\" alt=\"".$title."\" border=\"0\" class=\"".$class."\">\n";
		}
		return $imgHtml;
	}
	
	function ma_make_image_tt($Img,$thumb="small",$title='',$class,$tt='&w=200&h=200&zc=2') {
		$title=stripslashes($title);
		$thumb=($thumb=='none')?'':$thumb.'_';
		if($Img)$imgHtml.="<img src=\"".DIR_WS_CLASS."timthumb.php?src=".ma_get_image_from_repsitory($Img).$tt."\" alt=\"".$title."\" border=\"0\" class=\"".$class."\">\n";
		return $imgHtml;
	}




	function to_delete_ma_make_preloadList($data,$thumb="big",$sep=','){
		if($data){    
			foreach($data as $d){
				if(String::ma_not_null($htmlList))$htmlList.=$sep;
				if($d->Doc)$htmlList.="\"".DIR_WS_REPOSITORY."img/".$thumb."_".$d->Doc."\"";
				elseif($d->Img)$htmlList.="\"".DIR_WS_REPOSITORY."img/".$thumb."_".$d->Img."\"";
			}
		}
		return $htmlList;
	}


















function to_delete_ma_create_sub_menu_footer($data,$curPage,$prefix='',$itemExclude=''){

  if($data){
    $menuSubDx="<ul>\n";
	$i=1;
	$data[0]->t=$data[0]->Code;
	$itemUrl=pathHndler($data[0]);

	if(count($data)>3)$menuSubDx.="<li >".$prefix."<a href=\"".$itemUrl."\" ".$pageActive.">".CL_TORNA_ALLE_NEWS."</a></li>\n";
	else  {
		foreach($data as $d){
			$d->t=$d->Code;
			$itemUrl=pathHndler($d);
		    if($d->a!=$itemExclude) {
				$pageActive='';
				if($curPage==$d->a){
			        
				}
				else $menuSubDx.="<li >".$prefix."<a href=\"".$itemUrl."\" ".$pageActive.">".$d->b."</a></li>\n";
				$i++;
				}
			}
		}
	}
	$menuSubDx.="</ul>\n";
    return $menuSubDx;
}



 


function to_deletema_create_simple_list($data,$curPage,$prefix='',$itemExclude=''){

  if($data){
    $menuSubDx="<ul>\n";
	$i=0;
	foreach($data as $d){
	    if($d->a!=$itemExclude) {
			$pageActive='';
			if($curPage==$d->a){
		      $pageActive='class="current"';
			}
			$page=($d->Code)?$d->Code:$curPage;
			$menuSubDx.="<li class=>".$prefix."<a href=\"".$page.".php?article=".$d->a."\" ".$pageActive.">".$d->b."</a></li>\n";
			$i++;
			}
		}
	}
	$menuSubDx.="</ul>\n";
    return $menuSubDx;
}









function to_deletema_create_simple_link($data,$curPage,$prefix='',$itemExclude='',$class=''){

	if($data){
		$menuSubDx="<ul>\n";
		$i=0;
		foreach($data as $d){
			if($d->a!=$itemExclude) {
				$pageActive='';
				if($curPage==$d->a){
					$pageActive='class="current"';
				}
				if($d->Site) {
					$imgHtml="<img src=\"".ma_get_image_from_repsitory($d->Img)."\" alt=\"".$d->b."\" border=\"0\" class=\"".$class."\">\n";
					if($d->Img)$menuSubDx.="<li >".$prefix."<a href=\"".$d->Site."\" ".$pageActive." target=\"_news\">".$imgHtml."</a></li>\n";
				    else $menuSubDx.="<li >".$prefix."<a href=\"".$d->Site."\" ".$pageActive." target=\"_news\">".$d->b."</a></li>\n";
				}
				$i++;
			}
		}
	}
	$menuSubDx.="</ul>\n";
	return $menuSubDx;
}
function to_deletema_create_simple_thumb($data,$curPage,$thumb='thumb',$itemExclude='',$id='galleria'){
    global $lang;
	if($data){
		$menuSubDx="<div id=\"".$id."\" class=\"op\">\n";
		$i=0;
		foreach($data as $d){
			if($d->a!=$itemExclude) {
				$pageActive='';
				if($curPage==$d->a){
					$pageActive='class="current"';
				}
				
				$d=articoli::lang_text_helper($d->Dominio,$d,$lang,$d->Dominio);
				if($d->Img) {
				    $dida='_'.$d->Name.' '.$d->Descrizione;
					$menuSubDx.=ma_make_image_lb($d->Img,$thumb,$dida,$class)."\n";
				   
				}
				$i++;
			}
		}
	}
	$menuSubDx.="</div>\n";
	return $menuSubDx;
}

  
  
 
  /***************date*********************/
  function ma_get_date_events($dateStart,$dateStop='',$sep=" - "){
       $dataHtml='';
       $dataStart=invDate::initInvDate($dateStart);
       $dataStop=invDate::initInvDate($dateStop);
       if($dataStart!=$dataStop && $dataStop!='00-00-0000'){
          $dataHtml=$dataStart.$sep.$dataStop;
       }
       else {
         $dataHtml=$dataStart;
       }
       
      return $dataHtml;
}
 
function ma_format_date($date,$format,$sep=' '){
       global $lang;
	   global $it_Months;
       $dataHtml='';
	   $date=invDate::initInvDate($date);
	   $dataFormat=explode('-',$format);
	   $dataArray=explode('-',$date);
	   if(in_array('D',$dataFormat))$dataHtml.=$dataArray[0].''.$sep;
	    if(in_array('m',$dataFormat))$dataHtml.=$dataArray[1].''.$sep;
       if(in_array('M',$dataFormat))$dataHtml.=$it_Months[(int)$dataArray[1]-1].''.$sep;
	    if(in_array('y',$dataFormat))$dataHtml.=date($dataArray[2],'y').''.$sep;
	   if(in_array('Y',$dataFormat))$dataHtml.=$dataArray[2].'';
	   $dataHtml;
       return $dataHtml;
}
  

/************************ random****************/
function ma_getRandom($arr){
  $value=rand(0,count($arr)-1);

  return $arr[$value];

}




//url  della  pagina
function to_delete_ma_curPageURL() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}
 
 /******************* html **********************/
  
  
   function ma_helper_urlssss($url,$title='',$target='',$class=''){
    
    $classStyle=($class)?"class=\"".$class."\"":"";
	$targetStyle=($target)?"target=\"".$target."\"":"";
	$title=($title)?$title:$url;
	$url=ma_prep_url($url);
    return "<a href=\"".$url."\" ".$classStyle."  ".$targetStyle."   >".$title."</a>\n";
  }
  
 



function ma_add_bc________________to_delete($url='',$label,$sep='',$class=''){
	
	$bcString='';
	if(String::ma_not_null($string))$bcString=$string;
	if($url!='')$bcString.="<a href=\"".$url."\" class=\"".$class."\"  title=\"".$label."\">";
	$bcString.=$label;
	if($url!='')$bcString.="</a>";
	$bcString.=$sep;
	return $bcString;
}



function ma_get_label_lang($string,$label,$lang){
	
	if($lang=='en')$stringLang=$string.' '.$label;
	else $stringLang=$label.' '.$string;
	return stripslashes($stringLang);
}

function to_delete_ma_parse_url_lang($url,$lang) {
  
  if($lang=='en')$url=str_replace('/it/','/en/',$url);
  else $url=str_replace('/en/','/it/',$url);
  return $url;
} 
function to_delete_ma_get_full_url($urlString) {
  	 return DIR_WS_CATALOG.$urlString;
} //  simple  function to create  the main menu $data= $pageTopiId=  Id  della  sezione  corrente, $selectedClass= classe dellogetto corrente $sep=eventuale  sseparatore tra i vari item del menu 

function  to_delete_ma_create_main_menu($data,$pageTopId,$selectedClass='current',$sep=''){
	if($data){
	$i=1;
    $nItem=count($data);
	$nItem=0;
	foreach($data as $tp){
	  if($tp->flagMenuTop==1){
	    $nItem++;
	  }
	}
    foreach($data as $d){
    $classActive='';
		if($pageTopId==$d->Id){
			$curPageLabel=stripslashes($d->b);
			$classActive='class="'.$selectedClass.'"';
		}
		 if($d->flagMenuTop==1){
		    //if($i==1)$menuMainDx.='<li>'.$sep.'</li>'; 
	        $menuMainDx.="<li ".$classActive." ><a href=\"".$d->Code.".php?article=".$d->Id."\"  rel=\"\">".stripslashes($d->b)."</a>";
            if($sep!='' && $nItem>$i)$menuMainDx.=$sep; 
            $menuMainDx.="</li>\n"; 
            $i++;
		}
       
      }
     
	}
	return $menuMainDx;
}

function  to_deletema_create_main_menu_img($data,$pageTopId,$selectedClass='current',$sep=''){
	if($data){
	$i=1;
    $nItem=count($data);
    foreach($data as $d){
    $titolo=htmlentities(utf8_decode(stripslashes($d->b)));
    $classActive='';
		if($pageTopId==$d->Id){
			$curPageLabel=stripslashes($d->b);
			$classActive='class="'.$selectedClass.'"';
		}
		if($d->flagMenuTop==1){
		    $img=ma_get_image_from_repsitory(stripslashes("small_".$d->Img));
            $menuMainDx.=" <li><a href=\"".$d->Code.".php?article=".$d->Id."\"  rel=\"\" ><img src=\"".$img."\" ".$classActive."></a><br>".$titolo."";
            if($sep!='' && $nItem>$i)$menuMainDx.=$sep; 
            $menuMainDx.="</li>\n"; 
           
		}
        $i++;
      }
     
	}
	return $menuMainDx;
}

function to_delete_ma_create_sub_menu($data,$curPage,$prefix='',$itemExclude=''){

  if($data){
    $menuSubDx="<ul>\n";
	$i=1;
	foreach($data as $d){
	    if($d->a!=$itemExclude) {
			$pageActive='';
			if($curPage==$d->a){
		        $pageActive='class="selected"';
			}
			$menuSubDx.="<li class=\"sepasotto\">".$prefix."<a href=\"".$d->Code.".php?article=".$d->a."\" ".$pageActive.">".$d->b."</a></li>\n";
			$i++;
			}
		}
	}
	$menuSubDx.="</ul>\n";
    return $menuSubDx;
}

/***** string***************/
    function to_delet_string_limiter($string,$max_char,$appString='',$showappString=1){
    $string=strip_tags($string);
	$stringL=mb_strlen($string); 
  	$string=substr($string,0,$max_char);
     if($showappString==0) {
	   if($stringL>$max_char)$string.=$appString;
	 }
     else if($appString)$string.=$appString;
     return $string;
  }
  function to_deletema_string_concat($stringa='',$stringb='',$sep=''){
      if($stringa)$string=$stringa.$sep.$stringb;
      else $string.=$stringb;
     return $string;
  }
  function to_deletema_lang_handler($data,$lang,$sep=' | ',$useDiv=0){
    if($data){
        $nLingue= count($data );
        $i = 1;
        foreach($data as $d){
            $pageActive='';
            
            if($i>1 && $useDiv==1) $menuLang.="</li><li class=\"divider\"></li>\n";
			if($lang == $d->a){
                $pageActive='class="active"';
				$menuLang.="<li ".$pageActive.">";
				$menuLang.="<a >".$d->b." <i class=\"fa fa-check\"></i></a>";
				
            }
			else {
					$menuLang.="<li>";
					$menuLang.="<a href=\"".stripLang($d->a)."\" >".$d->b."</a>";
			}
            if($nLingue>$i && $useDiv!=1)$menuLang.=$sep;
            $menuLang.="</li>\n";
            $i++;
        }
		
    }
    return $menuLang;
 }


 
 
 function to_deltema_lang_handler_img($data,$lang,$sep=' | '){
    if($data){
        $nLingue=count($data);
        $i=1;
        foreach($data as $d){
            $pageActive='';
            
            $imgLingua="<img src=\"".ma_get_image(strtolower($d->b.".png"))."\" alt=\"".$d->c."\" border=\"0\">";
			if($lang==$d->a){
                $pageActive='class="sel"';
				$menuLang.="<li >";
				$menuLang.="".$imgLingua."";
				
            }
			else {
					$menuLang.="<li class='oparev'>";
					$menuLang.="<a href=\"".Tool::stripLang($d->a)."\" >".$imgLingua."</a>";
			}
            if($nLingue>$i)$menuLang.=$sep;
            $menuLang.="</li>\n";
            $i++;
        }
		
    }
    return $menuLang;
 }
 
 
 function to_delete_stripLang($newLang){ 
    // if url contains lang para
    global $lang;
    $Url=$_SERVER['PHP_SELF'];
	$Query=$_SERVER['QUERY_STRING'];
	$Uri=$_SERVER['REQUEST_URI'];
	$Host=$_SERVER['SERVER_NAME'];
    
	$curUrl=$Uri;
	//if($Query)$curUrl=$Uri.'?'.$Query;
    if($_GET['lang']) {
		$addr=str_replace('lang='.$lang,'lang='.$newLang,$curUrl);
	}
	else if(strstr($curUrl,'?')) {
	  //echo 2;
	  $addr=str_replace('/'.$lang.'/','/'.$newLang.'/',$curUrl);
	}
	else {
	//echo 3;
	   $addr=str_replace('/'.$lang.'/','/'.$newLang.'/',$curUrl);
	}
    return $addr;
  }
  

  /************************** lista  di  helper   comuni ***********************************/
