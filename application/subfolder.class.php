<?php

class  subfolder  extends commonQuery
{
    // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function subfolder()
    {
        $this->tablename= TABLE_ARTICLE;
        $this->suffix= 'at';
        $this->commonQuery();
        $this->fieldspec = $this->getFieldSpec_original();

    } // template
    // ****************************************************************************
    function getFieldSpec_original ()
    // set the specifications for this database table
    {
        $this->primary_key      = array();
        $this->unique_keys      = array();
        $this->child_relations  = array();
        $this->parent_relations = array();
		global $Id_sub;
        global $Id_sez;
		
        // build array of field specifications
        $fieldspec['Id']    = array('type' => 'integer',
                                    'size' => 5,
                                    'minvalue' => 0,
                                    'maxvalue' => 65535,
                                    'pkey' => 'y',
                                    'required' => 'y',
                                    'hidden' => '1',
									'display'=>'1',
									'json'=>1 
         );
		 $fieldspec['Dominio'] = array('type' => 'integer',
                                          'size' => 200,
                                          'minvalue' => 0,
                                          'maxvalue' => 65535,
                                          'pkey' => 'y',
                                          'required' => 'y',
                                          'hidden' => '1',
										  'display'=>'1',
										  'label'=>CL_TIPO,
										  'default_value'=>$Id_sez,
										  'json'=>1 

        );
		
	    
		
		
		
		
		
		
		$fieldspec['IdParent']    = array('type' =>'string',
                                         'size' => 600,
                                         'h'=>100,
   									     'max' => 255,
                                         'required' => '0',
                                         'hidden' => '0',
										  'label'=>CL_PAGE_TITLE_FOLDER,
										  'extraMsg'=>'',
										   'combo'=>'categoryPageTree',
										  'multiple'=>0,
										  'Domain'=>'marchi',
										  'maxLevel'=>1,
										  'hideLevelId'=>0,
										  'display'=>'1',
										  'cssClass'=>'span7',
										  'json'=>1,
										  'devMsg'=>'uso  hideLevel id  per  non mettere id  del marchio e  quindi potersalvare il folrders'

       );
	
	$fieldspec['Name']    = array ('type' =>'string',
                                          'size' =>495,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>CL_TITLE,
										  'extraMsg'=>'',
										  'display'=>'1',
										  'lang'=>1,
										  'json'=>1 
		);
		
		$fieldspec['pageCode']    = array ('type' =>'string',
                                          'size' =>600,
										  'max' => 20,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => 1,
										  'label'=>CL_PAGECODE,
										  'extraMsg'=>'',
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
										'display'=>'1',
										'cssClass'=>'span1'
	   );
	  	
		
		
	   $fieldspec['flagReserved']          = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
                                               'extraMsg'=>'pagina ad acesso riservato',
		                                       'hidden' => '1',
											   'label'=>CL_RESERVED_PAGE,
											   'display'=>'1'
       );
        
		 
		
       
	    $fieldspec['Pub']           = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '0',
											   'label'=>CL_PUBLISH,
											   'display'=>'1',
											   'default_value'=>1
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


        $fieldspec['LastModified']  = array('type' => 'timestamp',
                                            'size' => 14,
                                            'autoinsert' => 'y',
                                            'noedit' => 'y');
        
       
	 


        // primary key details
        $this->primary_key              = array('Id');
        // unique key details
        $this->unique_keys              = array('Name');
        // default sort sequence
        $this->Order              = $this->suffix.'.Name ';
        $this->addField          = "'Name','Intro'";
        $this->searchField       = "Name";
		$this->sa          = $this->suffix.'.Id';
        $this->sb         = $this->suffix.'.Name';
		$this->a          = $this->suffix.'.Id';
        $this->b         = $this->suffix.'.Name';
		$this->c         = $this->suffix.'.Name';
		$this->showGallery=0;
		$this->showDocAjaxGallery=1;
		$this->sezTitle    = CL_PAGE_TITLE_SUBFOLDER;
		$this->titoloItem='Name';
        return $fieldspec;

    } // getFieldSpec_original

   	
// ****************************************************************************
} // end class
// ****************************************************************************
?>