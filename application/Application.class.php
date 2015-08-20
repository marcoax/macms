<?php
class Application {
    
	public $config;
    public $helper;
	public $page;
	public $lang;
	public static $instance;

    public static function init()
    {
        self::$instance = new self;
        return self::$instance;
    }
	public function __construct()
    {
    	$this->setConfiguration();
    }

    public static function close()
    {
       self::$instance->__destruct();
    }
    
    
    protected function setConfiguration(){
    		
		$this->config =  new stdClass();
		$this->page   =  new stdClass();	
		
		$Dispa = new dispatcher();
		$Dispa->init();
        $ObjLang = new Lingue();
        $ObjLang->getLista( 1 );
	
	    $this->page->curArticle    = $Dispa->getCurArticle();
		$this->config->lang        = $Dispa->getLang();
		$this->config->isMultiLang = ( $ObjLang->nLang >1 ) ? true : false;
		$this->config->langList  = $ObjLang->dataList;
		
    }
    
    

    public function applicationAutoload( $class )
    {
        
    }

    public function __destruct()
    {
        
    }
  
   
}