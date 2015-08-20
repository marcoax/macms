<?php

// store the user  visit  and  the  file  download
// store   the user  visit
class  userTracker extends commonQuery
{
    // ****************************************************************************
    // class constructor
    // ****************************************************************************
    function userTracker()
    {
        $this->tablename = TABLE_USERTRACKER;
        $this->suffix= 'ut';
        $this->commonQuery();
        $this->fieldspec = $this->getFieldSpec_original();
        $this->timeduration=900;// utente  connesso  per  20 min
    } // template
    // ****************************************************************************
    function getFieldSpec_original ()
    // set the specifications for this database table
    {
        $this->primary_key      = array();
        $this->unique_keys      = array();
        $this->child_relations  = array();
        $this->parent_relations = array();

        // build array of field specifications
        $fieldspec['Id']    = array('type' =>  'integer',
                                    'size' => 5,
                                    'pkey' => 'y',
                                    'required' => 'y',
                                    'hidden' => '1',
									'label'=>'Id',
									'display'=>'1'
        );

        $fieldspec['IdUser']  =   array('type' =>  'integer',
                                        'size' => 50,
                                        'pkey' => 'y',
                                        'required' => 'y',
                                        'hidden' => '0',
									    'label'=>'IdUser',
									    'display'=>'1'
       );
       $fieldspec['UserName']  =   array('type' =>  'string',
                                        'size' => 200,
                                        'pkey' => 'y',
                                        'required' => 'y',
                                        'hidden' => '0',
									    'label'=>'Username',
									    'display'=>'1'
       );
	   
	   $fieldspec['IdSession']  = array('type' =>'string',
                                        'size' =>200,
									    'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'n',
                                        'hidden' => '0',
									    'label'=>'Session Id',
									    'extraMsg'=>'',
									    'display'=>'1'
       );

	   $fieldspec['Platform']  = array('type' =>'string',
                                        'size' =>200,
									    'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'n',
                                        'hidden' => '0',
									    'label'=>'Platform',
									    'extraMsg'=>'',
									    'display'=>'1'
       );
	   $fieldspec['Browser']  = array('type' =>'string',
                                        'size' =>200,
									    'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'n',
                                        'hidden' => '0',
									    'label'=>'Browser',
									    'extraMsg'=>'',
									    'display'=>'1'
       );
	   
	 
	   $fieldspec['Website']  = array('type' =>'string',
                                        'size' =>200,
									    'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'n',
                                        'hidden' => '0',
									    'label'=>'Website',
									    'extraMsg'=>'',
									    'display'=>'0',
                                        'devmessage'=>' not used'
       );
	   
       $fieldspec['Ip']       = array('type' =>'string',
                                      'size' =>200,
									  'max' => 255,
                                      'pkey' => 'n',
                                      'required' => 'y',
                                      'hidden' => '0',
									  'label'=>'Ip Address',
									  'extraMsg'=>'',
									  'display'=>'0',
                                        'devmessage'=>' not used'
       );
	   
	   $fieldspec['RefererPage']   = array('type' =>'string',
                                      'size' =>200,
									  'max' => 255,
                                      'pkey' => 'n',
                                      'required' => 'y',
                                      'hidden' => '0',
									  'label'=>'HTTP Referer Page',
									  'extraMsg'=>'',
									  'display'=>'0',
                                      'devmessage'=>' not used'
       );
	

       $fieldspec['host']     =  array('type' =>'string',
                                        'size' =>200,
								        'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'n',
                                        'hidden' => '0',
									    'label'=>'Host Name',
									    'extraMsg'=>'',
									    'display'=>'0',
                                        'devmessage'=>' not used'
        );
      
	  
	   $fieldspec['netname'] =  array('type' =>'string',
                                        'size' =>200,
								        'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'n',
                                        'hidden' => '0',
									    'label'=>'Net Name',
									    'extraMsg'=>'',
									    'display'=>'0',
                                        'devmessage'=>' not used'
        );
		
	    $fieldspec['Section'] =  array('type' =>'string',
                                        'size' =>200,
								        'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'n',
                                        'hidden' => '0',
									    'label'=>'page',
									    'extraMsg'=>'',
									    'display'=>'1',
                                        'devmessage'=>'sezione  visualizzata'
        );
        
        $fieldspec['Id_sub'] =  array('type' =>'integer',
                                        'size' =>200,
								        'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'n',
                                        'hidden' => '0',
									    'label'=>'page',
									    'extraMsg'=>'',
									    'display'=>'1',
                                        'devmessage'=>'sottosezione visualizzata'
        );
        
        
        $fieldspec['IdObject'] =  array('type' =>'integer',
                                        'size' =>200,
								        'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'n',
                                        'hidden' => '0',
									    'label'=>'page',
									    'extraMsg'=>'',
									    'display'=>'1',
                                        'devmessage'=>'Id oggetto',
                                        'json'=>1
                                       
        );
        
        
        $fieldspec['page'] =  array('type' =>'string',
                                        'size' =>200,
								        'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'n',
                                        'hidden' => '0',
									    'label'=>'page',
									    'extraMsg'=>'',
									    'display'=>'1',
                                        'devmessage'=>'pagina visualizzata'
        );
		$fieldspec['actionType']  = array('type' =>'string',
                                        'size' =>200,
									    'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'n',
                                        'hidden' => '0',
									    'label'=>'Session Id',
									    'extraMsg'=>'',
									    'display'=>'1',
									    'json'=>1
                                       
       );
		
		$fieldspec['pageTitle'] =  array('type' =>'string',
                                        'size' =>200,
								        'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'n',
                                        'hidden' => '0',
									    'label'=>'pageTitle',
									    'extraMsg'=>'',
									    'display'=>'1',
                                        'devmessage'=>'contiene  la  descrizione dell\'oggetto tipo ad  esempio titolo evento titolo documento etc',
                                         'json'=>1
        );
		
		$fieldspec['fullUrl'] =  array('type' =>'string',
                                        'size' =>200,
								        'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'n',
                                        'hidden' => '0',
									    'label'=>'fullPath',
									    'extraMsg'=>'',
									    'display'=>'1'
        );
		
        
        $fieldspec['MediaType'] =  array('type' =>'string',
                                        'size' =>200,
								        'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'n',
                                        'hidden' => '0',
									    'label'=>'MediaType',
									    'extraMsg'=>'',
									    'display'=>'1'
        );
		
		$fieldspec['MediaFile'] =  array('type' =>'string',
                                        'size' =>200,
								        'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'n',
                                        'hidden' => '0',
									    'label'=>'MediaFile',
									    'extraMsg'=>'',
									    'display'=>'1',
									     'json'=>1
                                       
        );
	   
       $fieldspec['Country']  =  array('type' =>'string',
                                       'size' =>200,
								       'max' => 255,
                                       'pkey' => 'n',
                                       'required' => 'n',
                                       'hidden' => '0',
								       'label'=>'Country',
									   'extraMsg'=>'',
									   'display'=>'0',
                                       'devmessage'=>' not used'
       );
       
	   $fieldspec['accessDate']   =   array('type' =>'datetime',
                                      'size' =>200,
								      'max' => 20,
                                      'pkey' => 'n',
                                      'required' => 'n',
                                      'hidden' => '1',
								      'label'=>'Access Time',
									  'extraMsg'=>'',
									  'display'=>'1'
		);
		
		$fieldspec['accessDatetime']   =  array('type' =>'timestamp',
                                          'size' =>200,
								          'max' => 20,
                                          'pkey' => 'n',
                                          'required' => 'n',
                                          'hidden' => '0',
								          'label'=>'Time stamp',
									      'extraMsg'=>'',
									      'display'=>'1'
		);
   
       // primary key details
       $this->primary_key              = array('Id');
       // unique key details
       // default sort sequence
       $this->Order                    = $this->suffix.'.accessDatetime DESC';
       return $fieldspec;

   } // getFieldSpec_original
 
 
   // get predata
   function _ma_pre_getData ($where='')
    {
       // only do this if sql_select is empty
       if (empty($this->sel)) {
             $this->sel =  $this->suffix.'.*';
             $this->tab =  $this->tablename." as " .$this->suffix;
			 if(String::ma_not_null($where))$where=$this->primary_key[0]."='".$where."'";
			 else $where= " 1 ";
			 
        } // if
        $this->initWhere($where);
    } // _cm_pre_getData
}



 class userTrackerHandler extends userTracker {
        var $country; // country
	   var $Ip;      // ip adress
	   var $Ipn; // get ip number
	   var $Platform; // Operating System
	   var $Browser;  // broser version
	   var $userAgent;  // browser user  agent
	   var $host;     // domain
	   var $page;// page
	   var $fullUrl; //full url
	   var $pageTitle; // page title
	   var $IdUser;// id of logged  user
	   var $UserName;
	   var $IdSession;
	   var $RefererPage;//  keep track of the referring page
	  
	  //init  class
	  function userLogPara(){
	     $this->userTracker();
	  }
	   
	  //get ip 
	  function get_ip()  {
		$ip = FALSE;
		// If HTTP_CLIENT_IP is set, then give it priority
		if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
			$ip = $_SERVER["HTTP_CLIENT_IP"];
		}
			
		// User is behind a proxy and check that we discard RFC1918 IP addresses
		// if they are behind a proxy then only figure out which IP belongs to the
		// user.  Might not need any more hackin if there is a squid reverse proxy
		// infront of apache.
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			
			// Put the IP's into an array which we shall work with shortly.
			$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
			if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
			
			for ($i = 0; $i < count($ips); $i++) {
			    // Skip RFC 1918 IP's 10.0.0.0/8, 172.16.0.0/12 and 192.168.0.0/16
			    if (!eregi ("^(10|172\.16|192\.168)\.", $ips[$i])) {
			        if (version_compare(phpversion(), "5.0.0", ">=")) {
			            if (ip2long($ips[$i]) != false) {
			                $ip = $ips[$i];
			                break;
			            }
			        } else {
			            if (ip2long($ips[$i]) != -1) {
			                $ip = $ips[$i];
			                break;
			            }
			        }
			    }
			 }
         }
        $this->Ip=($ip)? $ip : $_SERVER['REMOTE_ADDR'];
        return $this->Ip;
   }
	  
 
   //return ip in number format
   function get_ipn(){
     return $this->Ipn = (float) sprintf("%u", ip2long($this->Ip));
   }
 
   //function get country from ip2country table
   function get_country() {
         $this->Country_unknow=" Unresolved Country";
	 	 $country_sql = sprintf("SELECT c.country FROM ".TABLE_IP2NATION." as na , ".TABLE_IP2NATIONCOUNTRIES." as c WHERE na.country=c.code and ip < INET_ATON('%s') ORDER BY ip DESC LIMIT 0,1", $this->Ip);
		 $this->Country = $this->db->get_var($country_sql);
		 return $this->Country=($this->Country)?$this->Country:$this->Country_unknow;
    }
	
	function getHost(){
	  return $this->Host=$_SERVER["HTTP_HOST"];
	}
	
	function getUserAgent(){
	  return $this->userAgent=$_SERVER['HTTP_USER_AGENT'];
	}
	
	
    function  setRefererPage(){
	   $this->RefererPage=$_SERVER['HTTP_REFERER'];
	}
	function getBrowser(){
	    $this->Browser= Browser_Detection::get_browser($_SERVER['HTTP_USER_AGENT']);
        $this->Platform=Browser_Detection::get_os($_SERVER['HTTP_USER_AGENT']);
	}
	
	function getPage(){
	  $this->fullUrl=($this->fullUrl)?$this->fullUrl:"http://".$_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"]; 
	  //echo $this->page=ma_get_page($this->fullUrl);
	}
	
    function setPage($page){
	  $this->page=$page;
	}
     function setPageTitle($pageTitle){
	  $this->pageTitle=$pageTitle;
	}
    
    function setSection($section){
      $this->section=$section;
	}
	
	function setFullUrl($fullUrl){
      $this->fullUrl=$fullUrl;
	}
	
	function setMediaFile($MediaFile,$MediaType=''){
	  $this->MediaFile=$MediaFile;
      $this->MediaType=$MediaType;
	}
	
    function setUser($IdUser='',$UserName=''){
		$this->IdUser=($IdUser)?$IdUser:'';
		$this->UserName=($UserName)?$UserName:' Guest ';
	}

    function setWebSite($Website=''){
	   $this->Website=($Website)?$Website:HTTP_SERVER;
    }
	
    function setLang($lang=''){
      $this->Lang=$lang;
	}
    
    function setActionType($actionType){
      $this->actionType=$actionType;
	}
    
    function setSub($Id_sub){
      $this->Id_sub=$Id_sub;
	}
    
    function setIdObject($IdObject){
      $this->IdObject=$IdObject;
	}
    
 function setArea($area){
      $this->area=$area;
	}
 function setSearchParameter($searchParameter=''){
      if($searchParameter)$this->searchParameter=$searchParameter;
	}
    
    //used to retrive extra website session
    function setSession($storeSession=''){
	  $this->session=($storeSession)?$storeSession:session_id();
    }
    
    
   
	//get all  the user parameter
	function getParameter(){
	   $this->getBrowser();
	   $this->getPage();
	   $this->setSession();
       $this->get_ip();
       $this->get_ipn();
	   $this->setRefererPage();
   	}
	
	
	function updateTracker(){
		//set  the  left  time
		$qUp="UPDATE ".$this->tablename."  set leftDatetime=NOW() where IdSession='".$this->session."' order by accessDatetime DESC  LIMIT 1";
		$this->db->query($qUp);
		  $queryIns="Insert INTO ".$this->tablename." 
					  (Id , 
					   IdUser , 
					   UserName ,
					   IdSession , 
					   Platform , 
					   Browser ,
					   Website,
                       Ip,
					   RefererPage, 
					   page , 
					   pageTitle ,
                       actionType,
                       Section,
                       Id_sub,
                       IdObject,
                       area,
                       fullUrl ,
                       searchParameter,
                       MediaType, 
					   MediaFile,
                       accessDatetime,
					   leftDatetime)
					 VALUES (
				       '', 
					   '".$this->IdUser."', 
					   '".addslashes($this->UserName)."', 
					   '".$this->session."',  
					   '".$this->Platform."', 
					   '".$this->Browser."',
					   '".$this->Website."',
                       '".$this->Ip."', 
					   '".$this->RefererPage."', 
                       '".addslashes($this->page)."',  
					   '".addslashes($this->pageTitle)."', 
                       '".addslashes($this->actionType)."',  
                       '".addslashes($this->section)."',
                       '".$this->Id_sub."', 
                       '".addslashes($this->IdObject)."',
                       '".addslashes($this->area)."',   
					   '".$this->fullUrl."',
					   '".$this->searchParameter."',
                       '".$this->MediaType."', 
					   '".$this->MediaFile."',
                        NOW( ),
						NOW( )+1
				       )
					";
	   $this->db->query($queryIns);
	   $this->lastId=$this->db->insert_id;
	 }
     
     function setLeftTime($IdUserLog){
	   $qUp="UPDATE ".$this->tablename."  set leftDatetime=NOW() where Id=".$IdUserLog." order by accessDatetime DESC  LIMIT 1";
	   //$this->db->query($qUp);
	 }
	 
	 
     
     function initNotifier(){
	   $this->objEmail= new emailHandler();
	   $this->objEmail->setTemplate('notify');
	 }
     
     //verifico se l'azione 
     function checkActionExist(){
         $this->_ma_pre_getData();
         $this->sel =" count(*) c";
         $this->initWhere("IdUser='".$this->IdUser."'
                      and  IdSession='".$this->session."'
         ");
         $this->wObj->setEq("actionType",$this->actionType);
         $this->wObj->setEq("Section",$this->section);
         if($this->Id_sub)$this->wObj->setEq("Id_sub",$this->Id_sub);
         $this->wObj->setEq("IdObject",$this->IdObject 	);
	     $this->getData(3); 
         return  $this->Data;          
     }
	 
	 
	
     
     
     /************************ funzioni statistiche **********************/
     //  funzione preconfezionata
      function  getAziendaStats($IdUser){
    	$this->Id_sub=$IdUser; //  � la  pagina  dell'utente
    	$this->_ma_pre_getData();
    	$this->initWhere("Section='website' 
    	              and IdObject='".SCHEDA_INSERZISTI_ID."' 
    	              and page='".SCHEDA_INSERZISTI_ID."' 
    	              ");//  deafu�t  per  estrarre le  statistiche della pagina
     	if($this->Id_sub)$this->wObj->setEq('Id_sub',$this->Id_sub);
    	
    	return $this->countRows();
    }
    
    //aggiornamento tracker 
     function fastTracker($actionTypeMode,$Id_sez,$Id_sub,$Id,$curPage){
     	
		
		$objSez=new $Id_sez;
		$objSez->_ma_pre_getData($Id);
		$objSez->debug=0;
		$objSez->getData(2);
	
        if($Id_sez=='documenti') {
        	$MediaType='doc';
			$MediaFile=$objSez->Data->Doc;
        }
		$objTitolo=$objSez->titoloItem;
		$titoloItem=$objSez->Data->$objTitolo;
		
		$objTracker = new userTrackerHandler();
		$objTracker->userTracker();
 		$objTracker->getParameter();
 		$objTracker->setActionType($actionTypeMode);
 		$objTracker->setSection($Id_sez);
 		$objTracker->setSub($Id_sub);
 		$objTracker->setIdObject($Id);
 		$objTracker->setPage($curPage);
 		if($MediaTitle)$objTracker->setPageTitle($MediaTitle);
 		$objTracker->setPageTitle($titoloItem);
 		$objTracker->setMediaFile($MediaFile,$MediaType);
 		$objTracker->setUser($_SESSION['uid'],$_SESSION['NomeUtente']);
 		$objTracker->getParameter();
 		if($MediaFullUrl)$objTracker->setFullUrl($MediaFullUrl);
 		$objTracker->updateTracker(); //**** tracker update ************/
          
     }
      
 }
 
 class userTrackerStats extends userTracker {
 	
    function userTrackerStats()  {
        
        $this->userTracker();
        
    }
    
     /************************ funzioni Stream **********************/
	
     //verifico se l'azione 
     function getStream($data=''){
         $this->_ma_pre_getData();
         $this->sel ="*";
         $this->wObj->addWhere("actionType In ('upload','versionupdate','delete')");
         if($data!='')  $this->wObj->addWhere("leftDatetime >= '".$data."'");
	}
 	
 	
 }
?>