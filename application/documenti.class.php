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
    function getFieldSpec_original ()
    {
        $this->primary_key      = array();
        $this->unique_keys      = array();
        $this->child_relations  = array();
        $this->parent_relations = array();

        // build array of field specifications
        $fieldspec['IdDocumento']    = array('type' => 'integer',
                                    'size' => 5,
                                    'minvalue' => 0,
                                    'maxvalue' => 65535,
                                    'pkey' => 'y',
                                    'required' => 'y',
                                    'hidden' => '1',
									'display'=>'1',
        );
		
		$fieldspec['Data']    =array('type' => 'date',
     
		$fieldspec['IdCategory'] = array('type' => 'integer',
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
										  'extraMsg'=>'',
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
		
		
		$fieldspec['IdProfilo']    = array('type' =>'string',
	   
	   
		
    	
	
		$fieldspec['Title']    = array ('type' =>'string',
                                          'size' =>600,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>CL_TITLE,
										  'extraMsg'=>'',
										  'display'=>'1',
		 								  'lang'=>1,
		);
		
		$fieldspec['Doc']    =array ('type' =>'media',
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


        $fieldspec['lastModified']  = array('type' => 'timestamp',
                                            'autoinsert' => 'y',
        



        // primary key details
    } // getFieldSpec_original


    function getDocActionList($IdAction,$IdCategory,$fullList='0'){
      }
	  else {
	  
      
    
      $this->_ma_pre_getData();
      $this->wObj->setIN('IdAzione',$treeArray);
    
	
    
    function getMediaList($IdAzione,$IdCategory){
	   $this->_ma_pre_getData();
	   $this->Order='IdDocumento';
	//  solo stringa  che  contiene la  query per la max  versione 
	function prepareMaxVersione(){
	  ";
	}
   

	function insertFromAction($IdAzione,$Doc,$IdCategory='documenti',$IdSubCategory='',$IdEvento,$Sort='',$Title='',$Lang=''){
		$this->docName=($this->docName)?$this->docName:$Doc['name'];
       $Descrizione=ma_getParameter('docDescrizione');
        ;
	    $this->insertItem($field,$values,1);
	}
	
	function pathHandlerFromId($type='doc',$Id) {

// ****************************************************************************
}