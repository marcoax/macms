<?php


//ma sanitize get_post  var
// anti intrusion 
function  ma_sanitize_var($var){
   if(ereg("http*", $var)){ 
         die("Try hacking somebody else's site.");
    } else {
	    return $var;
   } 
}

function  ma_sanitize_oracle_var($var){
    return  $var=str_replace("'","''",$var);
}

function ma_saniteze_all_var($dbType=''){
  if(String::ma_not_null($_GET)){
      while(list($lvar,$lvalue)=each($_GET))
      if($dbType=='oracle')ma_sanitize_oracle_var($lvalue);
      elseif($dbType=='mysql')ma_db_input($lvalue);
      $lvalue=ma_sanitize_var($lvalue);
      $_GET[$lvar]=ma_security_var($lvalue);
  }
  if(String::ma_not_null($_POST)){
      while(list($lvar,$lvalue)=each($_POST))
      if($dbType=='oracle')ma_sanitize_oracle_var($lvalue);
      elseif($dbType=='mysql')ma_db_input($lvalue);
      $_POST[$lvar]=ma_security_var($lvalue);
  }
}



function ma_security_var($var){
       //$var=ma_sanitize_var($var);
      return $var=htmlspecialchars($var, ENT_QUOTES);
}


function ma_sanitize_seo_page_title($string) {

	$string = normalizeChar($string);

	//echo $string=filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS,FILTER_FLAG_STRIP_HIGH);
	$string = str_replace("'", "-", str_replace("/", "-", $string));
	$string = str_replace(" ", "_", str_replace("/", "-", $string));
	$stringa = preg_replace("/  /", " ", $stringa);
	$stringa = preg_replace("/  /", " ", $stringa);
	$stringa = preg_replace("/  /", " ", $stringa);
	$stringa = preg_replace("/  /", " ", $stringa);
	$stringa = str_replace(" ", "-", $stringa);

	return strtolower($string);
}


 //  ritorna l'ip dell''utente'
 function ma_get_ip() {
   if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        }
        elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        }
        elseif (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        }
        elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');
        }
        elseif (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
        }
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
   return $ip;
}



function sanitize_title($string){
	$string = str_replace(",", " -", $string);
 	//$string=preg_replace(" - ", " | ",$string);
  	return trim($string);
}



function ma_seo_title($str){
	// html decode, in case it is coming encoded (AJAX request)
	$seo_title = rawurldecode($str);
	// some characters that might create trouble
	$switch_chars = '(,),\,/';
	$sc = explode(',', $switch_chars);
	foreach ($sc as $c) $seo_title = str_replace($c, '-', $seo_title);
	// leave only alphanumeric characters and replace spaces with hyphens
	$seo_title = strtolower(str_replace('--', '-', preg_replace('/[\s]/', '-', preg_replace('/[^[:alnum:]\s-]+/', '', $str))));
	$len = strlen($seo_title);
	if ($seo_title[$len - 1] == '-') $seo_title = substr($seo_title, 0, -1);
	if ($seo_title[0] == '-') $seo_title = substr($seo_title, 1, $len);
	return $seo_title;
}


function convertTitle($title){
	global $replacing;
	//$title=strtr($title, $replacing);
	$title=preg_replace("/--*/i", "-", $title);
	$l = strlen($title);
	if($title[$l-1] == "-") $title=substr($title, 0, $l-1);
	return ucfirst($title);
}

//replece  the   char  with  accent
function normalizeChar( $string )
{

    $string=iconv('utf-8', 'iso-8859-1',$string);
	$string=utf8_encode($string); 
    $string = preg_replace("`\[.*\]`U","",$string);
	$string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$string);
	$string = htmlentities($string, ENT_NOQUOTES, 'utf-8');
	$string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $string );
	$string = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "-", $string);
	
	return strtolower(trim($string, '-'));

}






function to_deletepathHndlers($data,$pathSuffix=''){
	$pathStart=CONF_PATH_START;
	global $lang;
	global $isMobile;
	if($data->t!='')$data->pageCode=$data->t;
	if($data->t!='')$pathString=strtolower($data->t).".php".$pathStart."".$lang."/".sanitize_title($data->pageCode)."/".$data->a;
	else $pathString=strtolower($data->Code).".php".$pathStart."".$lang."/".sanitize_title($data->pageCode)."/".$data->a;
	$pathString=ma_get_full_url($pathSuffix.$pathString);
	return $pathString;
}

function to_delete_pathHndlerd($data){
	global $lang;
	if($data->t=='')$data->t=$data->Code;
	$pathString=strtolower($data->t).".php/".$lang."/".sanitize_title($data->pageCode)."/".$data->a;
	$pathString=ma_get_full_url($pathString);
	return $pathString;
}

function to_delet_previewHandler($data,$lang='it'){
	
	 $data->t=$data->Code;
	 $data->a=$data->Id;
	 if($data->t=='home')$pathString=DIR_WS_SITE.'index.php';
	 else $pathString=DIR_WS_SITE.strtolower($data->t).".php/".$lang."/".sanitize_title($data->pageCode)."/".$data->a;
	 if(GOOGLE_ENABLE_TRANSLATE==1)$pathString.='?translate=1';
	 //$pathString=ma_get_full_url($pathString);
	return $pathString;
}

/*****************************poco  seo*****************************/

 //replece  the   char  with  accent
function ma_trim( $string )
{
  $trimmed = trim($string);
  $trimmed=str_replace("\r\n", "", $trimmed);
  $trimmed=str_replace("\r\n", "", $trimmed);
  return $trimmed;  
}

/**************************************gestione   della  lingua ****************************/
function to_delete_comefrom($defaultLang){
   $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE']; 
   if (substr($lang, 0, 2) == 'en'){
      $lang='en';
   } 
   else if (substr($lang, 0, 2) == 'it'){
      $lang='it';
   }
   /*
   else if (substr($lang, 0, 2) == 'fr'){
      $lang='fr';
   }
   else if (substr($lang, 0, 2) == 'es'){
      $lang='es';
   }
   else if (substr($lang, 0, 2) == 'ru'){
      $lang='ru';
   }
   else if (substr($lang, 0, 2) == 'zh'){
      $lang='zh';
   }
   else if (substr($lang, 0, 2) == 'pt'){
      $lang='pt';
   }*/
   else $lang=$defaultLang;
   return $lang;
  
}

function to_delete_browserLang()
{
	if (preg_match('/zh-tw/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
		return "zh-TW";
	} else {
		return substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	}
}


