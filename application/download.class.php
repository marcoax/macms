<?php
class  download  extends commonQuery
{
    // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function download()
    {
        $this->tablename= TABLE_ARTICLE;
        $this->suffix= 'social';
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
         );
		 
         $fieldspec['Code']    = array ('type' =>'string',
                                          'size' =>200,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'n',
                                          'hidden' => '1',
										  'label'=>CL_PRODUCT_CODE,
										  'extraMsg'=>'',
										  'display'=>'1'
		);
         
		
		
         $fieldspec['IdCategory'] = array('type' => 'integer',
                                          'size' => 200,
                                          'minvalue' => 0,
                                          'maxvalue' => 65535,
                                          'pkey' => 'y',
                                          'required' => 'y',
                                          'hidden' => '0	',
										  'display'=>'1',
										  'label'  =>'Categoria',
										  'TopOnly'=>1,
										  'IdParentStart'=>'17',
										  'combo'=>'categoryListTree',
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
		);
		
		  $fieldspec['Site']  =  array ('type' =>'string',
                                        'size' =>495,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'y',
                                        'hidden' => '1',
										'label'=>CL_WEBSITE,
										'extraMsg'=>'tipo http://www.facebook.com',
										'display'=>'1'
	   );
		
		
		
		$fieldspec['TitleMenu']    = array ('type' =>'string',
                                          'size' =>600,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>CL_TITLE_MENU,
										  'extraMsg'=>'',
										  'display'=>'0'
		);
		
		
		
		$fieldspec['ImgBanner']    =array ('type' =>'media',
											'size' =>300,
											'max' => 255,
											'pkey' => 'n',
											'required' => 'n',
											'hidden' => '0',
											'label'=>CL_PAGE_TITLE_BANNER,
											'extraMsg'=>BANNER_W.'x'.BANNER_H,
											'display'=>'0',
											'readonly'=>'1',
											'smediaType'=>'ImgBanner',
		);
		
		$fieldspec['Img']    =array ('type' =>'media',
											'size' =>300,
											'max' => 255,
											'pkey' => 'n',
											'required' => 'n',
											'hidden' => '0',
											'label'=>CL_IMAGE,
											'extraMsg'=>'',
											'display'=>'1',
											'readonly'=>'1',
											'mediaType'=>'Img',
		);
		
		$fieldspec['Intro']    =array ('type' =>'text',
                                          'size' =>600,
										  'h' =>100,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>CL_SHORT,
										  'extraMsg'=>'',
										  'display'=>'0',
                                          'cssclass'=>'campoNoeditor'
		);
		
		$fieldspec['Descrizione']    = array ('type' =>'text',
                                          'size' =>600,
										  'h' =>300,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' =>1,
										  'label'=>CL_DESCRIPTION,
										  'extraMsg'=>'',
										  'lang'=>1,
										  'cssClass'=>'ckeditor',
										  'display'=>1,
		);
		
		
		$fieldspec['Doc']    =array ('type' =>'media',
    	  							 'size' =>200,
									 'max' => 255,
									 'pkey' => 'n',
									 'required' => 'n',
									 'hidden' => '0',
									 'label'=>CL_DOCUMENTO."<br/>".MSG_HELP_MAX_FILE_SIZE,
									 'extraMsg'=>'',
									 'display'=>'1',
									 'readonly'=>'1',
									 'mediaType'=>'Doc',
									 'devComment'=>'Rimesso   da  togliere per  gestire il versioning',
									 'pathSuffix'=>'documenti',
									 'json'=>1
		);
		
		
		
		$fieldspec['ImgThumb']    =array ('type' =>'media',
											'size' =>300,
											'max' => 255,
											'pkey' => 'n',
											'required' => 'n',
											'hidden' => '0',
											'label'=>CL_IMAGE,
											'extraMsg'=>' Max 500x300',
											'display'=>'0',
											'readonly'=>'1',
											'mediaType'=>'ImgThumb',
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
	  	
		
		$fieldspec['hasSub']           = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '0',
											   'label'=>CL_HAS_SUBPAGE,
											   'display'=>'0'
        );
        
        $fieldspec['flagMenuDx']           = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '0',
											   'label'=>CL_SHOW_MENU_DX,
											   'display'=>'0'
       );
		
		 
		$fieldspec['Disable']    = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '0',
											   'label'=>CL_DISABILITA,
											   'display'=>'0'
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
        $this->addField           = "'Name','Intro'";
        $this->searchField        = "Name";
		$this->sa                 = $this->suffix.'.Id';
        $this->sb                 = $this->suffix.'.Name';
		$this->a                  = $this->suffix.'.Id';
        $this->b                  = $this->suffix.'.Name';
		$this->sezTitle			  = CL_PAGE_TITLE_DOWNLOAD;
		$this->titoloItem         = "Name";
        return $fieldspec;

    } // getFieldSpec_original




// ****************************************************************************
} // end class
// ****************************************************************************
?>



	      