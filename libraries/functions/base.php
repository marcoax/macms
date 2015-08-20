<?php
  // definisco   alucne  variabili
   // some  defaul variable  
   
   $limit=(String::ma_not_null($_POST["limit"]))?$_POST["limit"]:$_GET["limit"];
   $limitStart=(CMS_ITEM_PER_PAGE>1)?CMS_ITEM_PER_PAGE:50;
   $limit =(String::ma_not_null($limit))?$limit:$limitStart;
   $lastObj=(String::ma_not_null($_POST["lastObj"]))?$_POST["lastObj"]:$_GET["lastObj"];
  
   $mode=(empty($_GET["mode"]))?$_POST["mode"]:$_GET["mode"];
   $Id_sez=(empty($_GET["Id_sez"]))?$_POST["Id_sez"]:$_GET["Id_sez"];
   $Id_sub=(empty($_GET["Id_sub"]))?$_POST["Id_sub"]:$_GET["Id_sub"];
   $Id=(empty($_GET["Id"]))?$_POST["Id"]:$_GET["Id"];
   $curPageN=($_GET['page'])?$_GET['page']:1;
   if(String::ma_not_null($_POST['page']))$curPageN=$_POST['page'];
   $IdDettaglio=(empty($_GET["IdDettaglio"]))?$_POST["IdDettaglio"]:$_GET["IdDettaglio"];
   if(empty($IdDettaglio))$IdDettaglio=$Id;
   $storeTab=(!empty($_POST["storeTab"]))?$_POST["storeTab"]:$_GET["storeTab"];
   if(!String::ma_not_null($storeTab))$storeTab=1;
   $parolaRicerca=(!empty($_POST["parola"]))?$_POST["parola"]:$_GET["parola"];
   $langCMS =(String::ma_not_null($_GET['langCMS']))?$_GET['langCMS']:$_POST['langCMS']; //itilizzato per  memorizzare il  codice  della lingua
   $lang    =(String::ma_not_null($_GET['lang']))?$_GET['lang']:$_POST['lang'];
   $orderBy=(!empty($_POST["orderby"]))?$_POST["orderby"]:$_GET["orderby"];
   $orderType=(!empty($_POST["ordertype"]))?$_POST["ordertype"]:$_GET["ordertype"];
   $tabMenu='';

 
 
 
 
 //  function ritorna il parametro
   function ma_getParameter($parameter_name){
   if( isset($_GET[$parameter_name]) )
		return $_GET[$parameter_name];
	else if( isset($_POST[$parameter_name]) )
		return $_POST[$parameter_name];
	else if( isset($_SESSION[$parameter_name]))
		return $_SESSION[$parameter_name];
	else
		return false;
   }
   
   function ma_hasParameter($parameter_name){
		if( isset($_GET[$parameter_name]) )
			return true;
		else if( isset($_POST[$parameter_name]) )
			return true;
		else if( isset($_SESSION[$parameter_name]))
			return true;
		else
			return false;
  }
  
  function ma_setParam($parameter_name,$parameter_value,$stringa){
	switch($stringa){
		case 'post':
			$_POST[$parameter_name] = $parameter_value;
			break;
		case 'get':
			$_GET[$parameter_name] = $parameter_value;
			break;

		case 'session':
			$_SESSION[$parameter_name] = $parameter_value;
			break;
   }	
}


  function ma_getOption($option_name){
	$objOpts= new options;
    $objOpts->_ma_getOption($option_name);
    $valore=$objOpts->getData(3);
    return stripslashes($valore);
}


//
 function ma_db_prepare_input($string) {
    if (is_string($string)) {
      return trim(ma_sanitize_string(stripslashes($string)));
    } elseif (is_array($string)) {
      reset($string);
      while (list($key, $value) = each($string)) {
        $string[$key] = ma_db_prepare_input($value);
      }
      return $string;
    } else {
      return $string;
    }
  }
 
 function ma_sanitize_string($string) {
    $string =str_replace(' +', ' ', $string);
    return preg_replace("/[<>]/", '_', $string);
  }

  // set  di funzioni aggiunte   per  data bese
  function ma_db_output($string) {
    return htmlspecialchars($string);
  }

  function ma_db_input($string) {
    return addslashes($string);
  }
  
  function ma_db_sanitize_sqlj($string) {
  	global $DBH;

	if (is_string($string)) {
		//mysql_real_escape_string($string);
    		return substr($DBH->quote($string), 1, -1);
	}
	elseif (is_array($string)) {
      reset($string);
      while (list($key, $value) = each($string)) {
        $string[$key] =ma_db_sanitize_sqlj($value);
      }
      return $string;
	}
  }
  
  
function slugify($value)
	{
		
		// replace non letter or digits by -
	 	$value = preg_replace('~[^\\pL\d]+~u', '-', $value);
	 
	 	// trim
	 	$value = trim($value, '-');
	 
	  	// transliterate
	  	$value = iconv('utf-8', 'us-ascii//TRANSLIT', $value);
	 
	  	// lowercase
	  	$value = strtolower($value);
	 
	  	// remove unwanted characters
	  	$value = preg_replace('~[^-\w]+~', '', $value);

		return $value;
	}


function slugifyFile($value)
	{
		$dataFile=explode('.',$value);
		$name=slugify($dataFile[0]);
		$ext=$dataFile[1];
		return $name.".".$ext;
	}
 /*******************************sanizite input db value********************/
 function ma_cleanInput($input) {
 
  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
   /* '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags*/
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  );
 
    $output = preg_replace($search, '', $input);
    return $output;
  }
 
 function ma_sanitize($input) {
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = ma_sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        //$input  = ma_cleanInput($input);
        $output = ma_db_sanitize_sqlj($input);
    }
    return $output;
}
 
 
 
  function ma_redirect($url) {
    if ( (ENABLE_SSL == true) && ($_SERVER['HTTPS'] == 'on') ) { // We are loading an SSL page
      if (substr($url, 0, strlen(HTTP_SERVER)) == HTTP_SERVER) { // NONSSL url
        $url = HTTPS_SERVER . substr($url, strlen(HTTP_SERVER)); // Change it to SSL
      }
    }

   // clean up URL before executing it
   while (strstr($url, '&&')) $url = str_replace('&&', '&', $url);
   while (strstr($url, '&amp;&amp;')) $url = str_replace('&amp;&amp;', '&amp;', $url);
   // header locates should not have the &amp; in the address it breaks things
   while (strstr($url, '&amp;')) $url = str_replace('&amp;', '&', $url);
   header('Location: ' . $url);
   ma_exit();
  }



  function ma_exit() {
    ma_session_close();
    exit();
  }


 function ma_href_link($url){
     $sep="?";
     $link=DIR_WS_CMS.$url;
     return $link;
 }


 function ma_get_page(){
    $path     = explode('/',$_SERVER[SCRIPT_NAME]);
    $nomefile = $path[count($path)-1];
    $pagefull = explode(".",$nomefile);
    $page     = $pagefull[0];
    $pageext  = $pagefull[1];
    return    $page;
  }


   ////
function ma_output_string($string, $translate = false, $protected = false) {
    if ($protected == true) {
      return htmlspecialchars($string);
    } else {
      if ($translate == false) {
        return ma_parse_input_field_data($string, array('"' => '&quot;'));
      } else {
        return ma_parse_input_field_data($string, $translate);
      }
    }
  }

  ////

  function ma_parse_input_field_data($data, $parse) {
     return strtr(trim($data),$parse);
 }

 function ma_msg_box($text) {
   $html="<div align=\"center\" class=\"msgBox\">".$text."</div>";
   return $html;
 }

// converto un array del  bd  in  una   stringa
 function to_deleta_arrayToString($arr,$sep=','){
   $string='';
   if($arr){
        foreach($arr as $d){
            if(String::ma_not_null($string))$string.=$sep;
            $string.=$d->a;  
        }
   }
   return $string;
}

 //  create  tab  menu
 function to_delete_ma_tab_menu() {
   global  $listaSub;
   global $mode;
   global $Id;
   global $IdDettaglio;
   if(!empty($listaSub)){
     $voci=explode(',',$listaSub);
     $i=1;
     $tabMenu.="\n<div class=\"tabBox\">\n";
     $tabMenu.="\t<TABLE STYLE=\"width:auto\" CELLPADDING=0 CELLSPACING=0>\n\t<TR>\n";
     foreach($voci as $it){
    	$label=explode('#',$it);
    	if($mode=='edit' && $label[1]==0) $a=11 ;
    	else if ($mode!='edit' && $label[1]>1) { $a=11;}
    	else if($label[1]==3){
    	if($i==1) {
        	$url=$label[2];
        	$tabMenu.="\t\t<TD id=\"tab_".$i."\" class=thistab onclick=\"vediDettagli('".$url."','".$i."');\" height=25>".$label[0]."</TD>\n";
     	}
     	else {
        	$url=$label[2];
         	$tabMenu.="\t\t<TD id=\"tab_".$i."\" class=tab onclick=\"vediDettagli('".$url."','".$i."');\" height=20>".$label[0]."</TD>\n";
     	}
    }
    else {
    	 if($i==1) $tabMenu.="\t\t<TD id=\"tab_".$i."\" class=thistab onclick=\"javascript:DoChanges(".$i.");\" height=25>".$label[0]."</TD>\n";
       	 else $tabMenu.="\t\t<TD id=\"tab_".$i."\" class=tab onclick=\"javascript:DoChanges(".$i.");\" height=20>".$label[0]."</TD>\n";
    }
    $i++;
  }
  
  $tabMenu.="\n\t</TR>\n\t</TABLE>\n</div\n>";
  return $tabMenu;
  }
}

/**************************** qury helper ***********************/

function to_delete_getlastObj($lastObj,$lastField){
   if($lastObj==1)return "  (TO_DAYS(NOW())-TO_DAYS(".$lastField."))<'".$lastObj."'";
   else return " (TO_DAYS(NOW())-TO_DAYS(".$lastField."))<='".$lastObj."'";
}

function to_deletesql_countItem($field,$table,$where=1){
   return "select count(".$field.") from ".$table." where ".$where;
}


/******************************  validazione  parametri e  user interface utility *********************************/
/************************************* utility*****************************/
function check_email_address($email)
{
    // First, we check that there's one @ symbol, and that the lengths are right
    if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email))
    {
        // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
        return false;
}
// Split it into sections to make life easier
$email_array = explode("@", $email);
$local_array = explode(".", $email_array[0]);
for ($i = 0; $i < sizeof($local_array); $i++)
{
    if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i]))
    {
        return false;
}
}
if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1]))
{ // Check if domain is IP. If not, it should be valid domain name
    $domain_array = explode(".", $email_array[1]);
if (sizeof($domain_array) < 2)
{
    return false; // Not enough parts to domain
}
for ($i = 0; $i < sizeof($domain_array); $i++)
{
    if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i]))
    {
        return false;
}
}
}
return true;
}


//  codifica  password
function to_delete_encPwd($password){
    	return $pwd = md5($password);
}

/******************* html **********************/


function strip_Image($description) {
        preg_match("/src=\"([^']*?)\"/", $description, $match);
		
        if ( $match[1] ) {
		    return $match[1];
        }

        
        
        return FALSE;
} 

function num2alpha($n) {
    $r = '';
    for ($i = 1; $n >= 0 && $i < 10; $i++) {
        $r = chr(0x41 + ($n % pow(26, $i) / pow(26, $i - 1))) . $r;
        $n -= pow(26, $i);
    }
    return $r;
}
/*****************************date   time ******************************/

function  ma_round_time(){
	$minute=date('i');
    $minute = ($minute < 30 || $minute > 30) ? 30 : $minute;
    return date('H').':'.$minute;
}

    function echo_datelist ($i, $j, $day, $month, $year)
{
    $time = str_pad($i, 2, '0', STR_PAD_LEFT).':'.str_pad($j, 2, '0', STR_PAD_LEFT);            
    $date = strtotime("$month $day $year $time:00");
    return  $time;
}
/******************************  debug  helper********************/

function   simple_mail ($subAdmin,$body){
	if(IS_LOCAL==1) return;
	$headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    // Additional headers
    $headers .= "From: ".WEBSITE_EMAIL."\r\n";
	
	 $body=EMAIL_HEADER.$body.EMAIL_FOOTER;
	
	if(ENABLE_NOTIFY_EMAIL==1) mail (WEBSITE_EMAIL, WEBSITE_NAME." - ".$subAdmin,$body,$headers);
	if(DEBUG_MODE==1)  mail (CMS_EMAIL_WEBMASTER,   WEBSITE_NAME." - ".$subAdmin,$body,$headers);
	
}
       


?>