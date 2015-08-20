<?php
class  media  extends commonQuery
{
    // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function media()
    {
        $this->tablename = TABLE_MEDIA;
        $this->suffix= 'me';
        $this->commonQuery();
        $this->fieldspec = $this->getFieldSpec_original();
        
        
       

    } // template
    // ****************************************************************************
    function getFieldSpec_original ()
    // set the specifications for this database table
    {
        global $Id_sez;
        global $Id_sub;
        $this->primary_key      = array();
        $this->unique_keys      = array();
        $this->child_relations  = array();
        $this->parent_relations = array();
       // build array of field specifications
        $fieldspec['Id']    = array('type' => 'integer',
                                    'size' => 5,
                                    'minvalue' => 0,
                                    'maxvalue' => 65535,
                                    'pkey' => 'y',
                                    'required' => 'y',
                                    'hidden' => '1',
									'display'=>'1',
         );
       
		$fieldspec['IdCategory'] = array('type' => 'integer',
                                          'size' => 200,
                                          'minvalue' => 0,
                                          'maxvalue' => 65535,
                                          'pkey' => 'y',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'display'=>'1',
										  'label'=>CL_TIPO,
										  'combo'=>'categoryTreeMedia',
        );
        
        $fieldspec['IdSubCategory'] = array('type' => 'integer',
                                          'size' => 200,
                                          'minvalue' => 0,
                                          'maxvalue' => 65535,
                                          'pkey' => 'y',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'display'=>'1',
										  'label'=>CL_TIPO,
										  'combo'=>$Id_sub.'Tree',
                                          
        );
        
		
		$fieldspec['Dominio'] = array('type' => 'string',
                                          'size' => 200,
                                          'minvalue' => 0,
                                          'maxvalue' => 65535,
                                          'pkey' => 'y',
                                          'required' => 'y',
                                          'hidden' => '1',
										  'display'=>'1',
										  'label'=>CL_DOMAIN,
										  'default_value'=>$Id_sub,
        );
		
    	
	
		$fieldspec['Title']    = array ('type' =>'string',
                                          'size' =>600,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>CL_TITLE,
										  'extraMsg'=>'',
										  'display'=>'1'
		);
		
		$fieldspec['Img']    =array ('type' =>'media',
											'size' =>300,
											'max' => 255,
											'pkey' => 'n',
											'required' => 'n',
											'hidden' => '0',
											'label'=>CL_IMAGE,
											'extraMsg'=>'Max 800x600',
											'display'=>'1',
											'readonly'=>'1',
											'mediaType'=>'Img',
		);
		
		$fieldspec['ImgThumb']    =array ('type' =>'media',
											'size' =>300,
											'max' => 255,
											'pkey' => 'n',
											'required' => 'n',
											'hidden' => '1',
											'label'=>CL_IMAGE_THUMB,
											'extraMsg'=>' Size 150x113',
											'display'=>'0',
											'readonly'=>'1',
											'mediaType'=>'ImgThumb',
		);
		
		
		
		$fieldspec['Descrizione']    = array ('type' =>'text',
                                          'size' =>600,
										  'h' =>150,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>CL_DIDA,
										  'extraMsg'=>'',
										  'display'=>'0'
		);
		
	
       
	 
	  $fieldspec['Sort']  =  array ('type' =>'string',
                                        'size' =>50,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'n',
                                        'hidden' => '0',
										'label'=>CL_SORT,
										'extraMsg'=>'',
										'display'=>'1'
	   );
	  
	  
	   $fieldspec['Disable']    = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '0',
											   'label'=>CL_DISABILITA,
											   'display'=>'1'
        ); 
       
	    $fieldspec['FlagThumb']    = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '0',
											   'label'=>CL_FLAG_THUMB,
											   'display'=>'0'
        );
		
		$fieldspec['FlagHome']    = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '0',
											   'label'=>CL_FLAG_HOME,
											   'display'=>'0'
        );  
	   $fieldspec['Pub']           = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '0',
											   'label'=>CL_PUBBLISH,
											   'display'=>'0'
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
        $this->unique_keys              = array('Title');
        // default sort sequence
        $this->Order                    = $this->suffix.'.Title  ';
        $this->addField                 = "Title";
        $this->searchField              = "Title ";
        return $fieldspec;

    } // getFieldSpec_original


    function _ma_pre_getData ($where='')

    {
        // only do this if sql_select is empty
        if (empty($this->sel)) {
             $this->sel = $this->suffix.'.*';
             $this->tab= $this->tablename." as " .$this->suffix." ";
             if(String::ma_not_null($where))$where=$this->suffix.'.'.$this->primary_key[0]."='".$where."'";
			 else $where=1;
        } // if

       $this->initWhere($where);

    } // _cm_pre_getData


	
 
// ****************************************************************************
} // end class
// ****************************************************************************


