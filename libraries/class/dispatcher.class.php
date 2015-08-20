<?php
class dispatcher
{
	/**
	 * @var Dispatcher
	 */   
	public $lang;
    public $curArticle;
	public $curPage;
	public $homePage ="home";
	public static $instance = null;
	
	public function __construct()
	{


	}
	public function init()
	{
      
	   $pathArray = explode("/",$_SERVER[REQUEST_URI]);
	   $this->resolveCurArticle( $pathArray ) ;
       $this->lang = $this->resolveLanguage( $pathArray );
	   
 	}
	
	public function  resolveLanguage( $pathArray ) 
	{
        $lang = $pathArray[count($pathArray)-2];
	    $lang = (strlen($lang)==2) ? $lang  : Tool::comefrom(LANG_PRE);
	  	$lang = (String::ma_not_null($_REQUEST['lang']))?$_REQUEST['lang']:$lang;
		$_SESSION['langSite']=$lang;
		if(empty($lang))$lang = Tool::comefrom(LANG_PRE); //  rivestimenti in pietraset default language;
	    $_SESSION['langSite']=$lang;
		return $lang;
    
	}
	
	public function  resolveCurArticle( $pathArray ) 
	{
        $lastItem  = explode ('-',end( $pathArray));
	    $this->curArticle = ( int ) $lastItem ['0'];
	    if($this->curArticle == '0') {
	    	$data = articoli::ma_get_itemByPageCode($this->homePage);
        	$this->curArticle = $data->Id;
        } 
	 
    
	}
	public function getLang(  ) 
	{
    	return $this->lang;
  	}
	public function getCurArticle(  ) 
	{
  		return $this->curArticle;
  	}
}
