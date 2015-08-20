<?php
class  documenti  extends commonQuery
{
   // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function documenti()
    {
        $this->tablename = TABLE_MEDIA;
		$this->tablenameVersion = TABLE_MEDIAVERSIONI;
        $this->suffix= 'me';
        $this->commonQuery();
        $this->fieldspec = $this->getFieldSpec_original();

    } // template
    // ****************************************************************************
    function getFieldSpec_original ()    // set the specifications for this database table 
    {        
        $this->primary_key      = array();
        $this->unique_keys      = array();
        $this->child_relations  = array();
        $this->parent_relations = array();         global $Id_sez;

        // build array of field specifications
        $fieldspec['IdDocumento']    = array('type' => 'integer',
                                    'size' => 5,
                                    'minvalue' => 0,
                                    'maxvalue' => 65535,
                                    'pkey' => 'y',
                                    'required' => 'y',
                                    'hidden' => '1',
									'display'=>'1',									'json'=>1
        );
		
		$fieldspec['Data']    =array('type' => 'date',                                      'size' =>80,								      'max' => 255,                                      'pkey' => 'n',                                      'required' => 'y',                                      'hidden' => '1',									  'label'=>CL_DATE,     								  'extraMsg'=>'dd-mm-YYYY',									  'display'=>'1',									  'cssClass'=>'span2',									  'default_value'=>date('d-m-Y'),									  'json'=>1        );
     
		$fieldspec['IdCategory'] = array('type' => 'integer',                                          'size' => 200,                                          'minvalue' => 0,                                          'maxvalue' => 65535,                                          'pkey' => 'y',                                          'required' => 'y',                                          'hidden' => '1',										  'display'=>'1',										  'label'=>CL_TIPO,
										  'default_value'=>'documenti',
        );
		
		$fieldspec['IdSubCategory'] = array('type' => 'integer',
                                          'size' => 200,
                                          'minvalue' => 0,
                                          'maxvalue' => 65535,
                                          'pkey' => 'y',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'display'=>'1',
										  'label'=> CL_TIPO_IMMAGINE,
										  'combo'=>'Dominio',
                                          'dominio'=>'tipoimmagine',
                                          'multiple'=>0,
                                          'hideSelectNull'=>0
        );
		
		$fieldspec['IdAzione']    = array('type' =>'string',
                                          'size' =>250,
										  'max' => 255,
                                          'required' => 'y',
                                          'hidden' => '1',
										  'label'=>CL_ADD_ACTIVITY,
										  'extraMsg'=>'',										  'display'=>'1',										  'json'=>1,										  'jsonLabel'=>'IdParent'
       );
		
		
		$fieldspec['IdEvento']    = array('type' =>'string',
                                          'size' =>250,
										  'max' => 255,
                                          'required' => '0',
                                          'hidden' => '1',
										  'label'=>CL_EVENTO,
										  'extraMsg'=>'',
										  'scombo'=>'AggiungiEventi',
										  'display'=>'1'
       );
		
		
		$fieldspec['IdProfilo']    = array('type' =>'string',                                          'size' => 180,                                          'h'=>100,										  'max' => 255,                                          'required' => '1',                                          'hidden' => '1',										  'label'=>'User permission',										  'extraMsg'=>'',										  'combo'=>'PermissionDoc',										  'display'=>'1',										  'json'=>'1',										  'multiple'=>1,       );
	   
	   
		
    	
	
		$fieldspec['Title']    = array ('type' =>'string',
                                          'size' =>600,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>CL_TITLE,
										  'extraMsg'=>'',
										  'display'=>'1',
		 								  'lang'=>1,		 								  'json'=>1
		);				$fieldspec['Autore']    = array('type' =>'string',                                         'size' =>615,										  'h' =>100,										  'max' => 255,                                          'pkey' => 'n',                                          'required' => 'n',                                          'hidden' => 1,     									  'label'=>CL_AUTORE,										  'extraMsg'=>'',										  'lang'=>0,										  'display'=>1,//$this->showDescrizione,										  'devComment'=>'Autore',										  'json'=>1       );		$fieldspec['Descrizione']    = array ('type' =>'string',                                         'size' =>615,										  'h' =>100,										  'max' => 255,                                          'pkey' => 'n',                                          'required' => 'n',                                          'hidden' => 0,     									  'label'=>CL_DESC,										  'extraMsg'=>'',										  'lang'=>0,										  'display'=>0,//$this->showDescrizione,										  'devComment'=>'Desc',										 										  'json'=>0	  );
		
		$fieldspec['Doc']    =array ('type' =>'media',    	  							 'size' =>200,									 'max' => 255,									 'pkey' => 'n',									 'required' => 'n',									 'hidden' => '1',									 'label'=>CL_DOCUMENTO."<br/>".MSG_HELP_MAX_FILE_SIZE,									 'extraMsg'=>'',									 'display'=>'1',									 'readonly'=>'1',									 'mediaType'=>'Doc',									 'devComment'=>'Rimesso   da  togliere per  gestire il versioning',									 'pathSuffix'=>'documenti',									 'json'=>1
		);
		
        
        
        $fieldspec['DocData']    = array ('type' =>'string',
                                          'size' =>580,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => '1',
										  'label'=>CL_TITLE,
										  'extraMsg'=>'contieni  tutti i riferimenti  al   file  uplodato',
										  'display'=>'1'
		);
		$fieldspec['Lang'] = array('type' => 'integer',
                                          'size' => 200,
                                          'minvalue' => 0,
                                          'maxvalue' => 65535,
                                          'pkey' => 'y',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'display'=>'1',
										  'label'=>CL_LANG,
										  'combo'=>'Lang',
										  'default_value'=>'en',
        );
		
		$fieldspec['ImgThumb']    =array ('type' =>'media',
											'size' =>300,
											'max' => 255,
											'pkey' => 'n',
											'required' => 'n',
											'hidden' => '0',
											'label'=>CL_IMAGE0,
											'extraMsg'=>' Size 150x113',
											'display'=>'0',
											'readonly'=>'1',
											'mediaType'=>'Img',
		);
		
		
		
		
/*not used */
	  $fieldspec['Tag']    = array ('type' =>'string',
                                          'size' =>585,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'n',
                                          'hidden' => '1',
										  'label'=>CL_TAG,
										  'extraMsg'=>'<br>'.MSG_HELP_TAG,
										  'display'=>'1'
		);
       
	 
	  $fieldspec['Sort']  =  array ('type' =>'string',
                                        'size' =>50,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'n',
                                        'hidden' => '1',
										'label'=>CL_SORT,
										'extraMsg'=>'',
										'display'=>'1'
	   );
	   $fieldspec['Pub']           = array('type' =>'boolean',
		                                    'size' =>1,
											'max' => 1,
		                                    'pkey' => 'n',
		                                    'required' => '',
		                                    'hidden' => '0',
											'label'=>CL_PUBLISH,
											'display'=>'1'
       );
	  
	   $fieldspec['Disable']    = array('type' =>'integer',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '1',
											   'label'=>MSG_HELP_DELETE,
											   'display'=>'1'
        ); 
       	       	   	   $fieldspec['mediaLastModified']    =array('type' => 'date',                                      'size' =>80,								      'max' => 255,                                      'pkey' => 'n',                                      'required' => 'y',                                      'hidden' => '1',									  'label'=>'mediaLastModified',     								  'extraMsg'=>'dd-mm-YYYY',									  'display'=>'1',									  'cssClass'=>'span2',									  'default_value'=>date('d-m-Y'),									  'json'=>1        );
											
	   $fieldspec['CreatedBy']   = array('type' => 'integer',
                                          'size' => 3,
                                          'minvalue' => 0,
                                          'maxvalue' => 65535,
                                          'autoinsert' => 'y',
                                         'noedit' => 'y');

        $fieldspec['dateCreation']  = array('type' => 'date',
                                            'size' => 10,
                                            'autoinsert' => 'n',
                                            'noedit' => 'y');

        $fieldspec['lastUser']      = array('type' => 'integer',
                                            'size' => 3,
                                            'minvalue' => 0,
                                            'maxvalue' => 65535,
                                            'autoinsert' => 'y',
                                            'noedit' => 'y');


        $fieldspec['lastModified']  = array('type' => 'timestamp',                                            'size' => 14,                                            'json'=>1,
                                            'autoinsert' => 'y',                                            'noedit' => 'y',											);
        



        // primary key details        $this->primary_key              = array('IdDocumento');        // unique key details        $this->unique_keys              = array('Title');        // default sort sequence        $this->Order    = $this->suffix.'.Data Desc  ';        $this->addField = "Title";        $this->sa="IdDocumento";	    $this->sb="Title";		$this->sa= $this->suffix.'.IdDocumento';        $this->sb= $this->suffix.'.Doc';        $this->suggestField="Title";		$this->sezTitle=CL_PAGE_TITLE_DOCUMENTI;		$this->titoloItem="Title";		$this->addJoinTable=$this->tablenameVersion." as dv on ".$this->suffix.".IdDocumento=dv.IdDocumento";		$this->jsonAddField=array('actionType','lastModified,Doc');        return $fieldspec;
    } // getFieldSpec_original


    function getDocActionList($IdAction,$IdCategory,$fullList='0'){	  $this->objAction = new azioni();	  if($fullList==0){            $this->objAction->getTopParent($IdAction); // ritorno solo la lista delle azioni fino al padre            $treeArray=$this->objAction->getArrayTree();//array;
      }
	  else {         $this->objAction->getActionTree($IdAction);         $treeArray=$this->objAction->ActivityTree->arrayTree;       } //getActionTree
	  
      
    
      $this->_ma_pre_getData();	  $this->setSelect('st.Label as Stato,dv.Doc as Doc');	  $this->addJoin($this->addJoinTable);	  $this->addJoin(TABLE_DOMINI." as st on ".$this->suffix.".Pub=st.IdDominio");	  $this->initWhere($this->suffix.".Disable=0	                   and dv.Disable=0					   and IdCategory='".$IdCategory."'					   and ".$this->prepareMaxVersione()."	  ");
      $this->wObj->setIN('IdAzione',$treeArray);	  $this->Order='Stato DESC,st.Sort,Data';  }
    
	
    
    function getMediaList($IdAzione,$IdCategory){
	   $this->_ma_pre_getData();	   $this->initWhere($this->suffix.".Disable=0	                   and IdAzione='".$IdAzione."'					   and IdCategory='".$IdCategory."'"					   );
	   $this->Order='IdDocumento';	}
	//  solo stringa  che  contiene la  query per la max  versione 
	function prepareMaxVersione(){	  $queryMax="Versione=(	             select max(versione) 				 from ".$this->tablenameVersion." as sb 				 where sb.IdDocumento=dv.IdDocumento 				 and sb.Disable=0				 )
	  ";	  return $queryMax;
	}
   

	function insertFromAction($IdAzione,$Doc,$IdCategory='documenti',$IdSubCategory='',$IdEvento,$Sort='',$Title='',$Lang=''){ 
		$this->docName=($this->docName)?$this->docName:$Doc['name'];        //prepololo l'autore 		$field="IdAzione,	           IdCategory,	           IdSubCategory,	           IdProfilo,	           Pub,	           Data,	           DateCreation,	           mediaLastModified,	           CreatedBy,	           Autore,	           Doc,	           DocData,	           Title,	           Descrizione,	           Lang,	           Sort";
       $Descrizione=ma_getParameter('docDescrizione');       $Sort=($Sort)?$Sort:ma_getParameter('docSort');	   if(!String::ma_not_null($Title)) $Title=(ma_getParameter('docTitle')!='')?ma_getParameter('docTitle'):$Doc['name'];       $values="'".$IdAzione."',	            '".$IdCategory."',                '".$IdSubCategory."',				'premium,standard,top',                '1',                '".date('Y-m-d')."',                 '".date('Y-m-d H:m:s')."',                '".date('Y-m-d')."',                   '".ma_getParameter('uid')."',                '".ma_getParameter('NomeUtente')."',                 '".ma_db_prepare_input($this->docName)."',                '".ma_db_prepare_input(serialize($Doc))."',                '".addslashes(ma_db_prepare_input($Title))."',                '".addslashes(ma_db_prepare_input($this->Descrizione))."',				'".ma_db_prepare_input($Lang)."',                '".ma_db_prepare_input($Sort)."'         "
        ;
	    $this->insertItem($field,$values,1);	    return $this->db->lastInsertId();
	}
	     function pathHandler($type='doc',$IdAzione='',$isUrl=1) {		$objDoc= new  documenti;		if($isUrl==1)$pathMedia=DIR_WS_REPOSITORY.$type.'/';		elseif($isUrl==5)$pathMedia=$type.'/';		else $pathMedia=DIR_FS_REPOSITORY.$type.'/';		$objDoc->Data=articoli::ma_getFastRow('articoli',$IdAzione);		//if($objDoc->Data->IdParent)$pathMedia.=$objDoc->Data->IdParent.'/';		//if($IdAzione)$pathMedia.=$IdAzione.'/';				$objPageTree=new articoli;        $objPageTree->getTreeFromChild($IdAzione);        if($objPageTree->arrayRevBreadCrumbsItem){    	foreach ($objPageTree->arrayRevBreadCrumbsItem as $dir) {			$pathMedia.=$dir.'/';		}		        }						return $pathMedia;  			}
	function pathHandlerFromId($type='doc',$Id) {		$curData	= articoli::ma_getFastRow('documenti',$Id);		$pathMedia	= documenti::pathHandler($type,$curData->IdAzione,5);		return $pathMedia;	}			function docCatHelper($Id) {						$objPageTree=new articoli;        $objPageTree->getTreeFromChild($Id);       	    	 	$objPageTree->nItem=count($objPageTree->arrayRevBreadCrumbsItem);		$objDoc->DataM=articoli::ma_getFastRow('articoli',$objPageTree->arrayRevBreadCrumbsItem[$objPageTree->nItem-1]);		$dataDoc['marchio']=$objDoc->DataM->Name;		$dataDoc['IdMarchio']=$objDoc->DataM->Id;				if($objPageTree->arrayRevBreadCrumbsItem[$objPageTree->nItem-2]) {			$objDoc->DataF=articoli::ma_getFastRow('articoli',$objPageTree->arrayRevBreadCrumbsItem[$objPageTree->nItem-2]);			 $dataDoc['folder']=$objDoc->DataF->Name;					}		if($objPageTree->arrayRevBreadCrumbsItem[$objPageTree->nItem-3]) {			$objDoc->DataSF=articoli::ma_getFastRow('articoli',$objPageTree->arrayRevBreadCrumbsItem[$objPageTree->nItem-3]);			$dataDoc['subfolder']=$objDoc->DataSF->Name;					}		return $dataDoc;	}		/************************ funzioni Stream **********************/	     //verifico se l'azione      function getStream($data=''){         $this->_ma_pre_getData();		 $this->sel="IdDocumento,Autore,IdAzione,IdProfilo";		 $this->setSelect('actionType,MediaFile as Doc,pageTitle as Title,accessDatetime as Data');         $this->addJoin(' usertracker ut on me.IdDocumento=ut.IdObject');         $this->wObj->addWhere("actionType In ('upload','versionupdate','delete')");		 $this->Order=' leftDatetime DESC';         if($data!='')  $this->wObj->addWhere("accessDatetime >= '".$data."'");	}

// ****************************************************************************
}