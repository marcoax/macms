<?php

class  prodotti  extends commonQuery
{
    // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function prodotti()
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
         );
		
		 $fieldspec['Code']    = array ('type' =>'string',
                                          'size' =>200,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => '1',
										  'label'=>CL_PAGE_TEMPLATE,
										  'extraMsg'=>'',
										  'display'=>'1',
										  'scombo'=>'pageTamplate',
    									  'default_value'=>$Id_sez
		);
		$fieldspec['IdCategory'] = array('type' => 'integer',
                                          'size' => 200,
                                          'minvalue' => 0,
                                          'maxvalue' => 65535,
                                          'pkey' => 'y',
                                          'required' => 'y',
                                          'hidden' => 1,
										  'display'=>'0',
										  'label'=>CL_TIPO,
										  'combo'=>'categoryTree',
        );
		
        $fieldspec['IdParent'] = array('type' => 'integer',
                                          'size' => 200,
                                          'minvalue' => 0,
                                          'maxvalue' => 65535,
                                          'pkey' => 'y',
                                          'required' => 'y',
                                          'hidden' => '0	',
										  'display'=>'1',
										   'TopOnly'=>1,
										  'label'=>'Categoria',
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
        
        $fieldspec['DateStart']    =array('type' => 'date',
                                      'size' =>100,
								      'max' => 255,
                                      'pkey' => 'n',
                                      'required' => 'y',
                                      'hidden' => '1',
									  'label'=>CL_DATE,
									   'extraMsg'=>'usato in  testi e  recensioni',
									  'display'=>'1'
        );
		
		$fieldspec['Contatto']    = array ('type' =>'string',
                                          'size' =>495,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => '1',
										  'label'=>CL_AUTORE,
										  'extraMsg'=>'usato in  testi e  recensioni',
										  'display'=>'1',
										  'lang'=>0,
		);
        
        $fieldspec['DateStop']    =array('type' => 'date',
                                      'size' =>100,
								      'max' => 255,
                                      'pkey' => 'n',
                                      'required' => 'y',
                                      'hidden' => '0',
									  'label'=>CL_DATE_STOP,
									  'extraMsg'=>'',
									  'display'=>'0'
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
		
		$fieldspec['pageCode']    = array ('type' =>'string',
                                          'size' =>495,
										  'max' => 20,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => $this->hideDescrizione,
										  'label'=>CL_PAGECODE,
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
											'extraMsg'=>'',
											'display'=>'1',
											'readonly'=>'1',
											'mediaType'=>'Img',
											'extraMsgEnabled'=>'Code',
		);
		$fieldspec['ImgBanner']    =array ('type' =>'media',
											'size' =>300,
											'max' => 255,
											'pkey' => 'n',
											'required' => 'n',
											'hidden' => '1',
											'label'=>'per carosello  grande',
											'extraMsg'=>"1170px  x  XXXpx",
											'display'=>'1',
											'readonly'=>'1',
											'mediaType'=>'ImgBanner',
		);
		
		$fieldspec['ImgThumb']    =array ('type' =>'media',
											'size' =>300,
											'max' => 255,
											'pkey' => 'n',
											'required' => 'n',
											'hidden' => '1',
											'label'=>'iconaMenu',
											'extraMsg'=>'',
											'display'=>'1',
											'readonly'=>'1',
											'mediaType'=>'ImgThumb',
											
											
		);
		$fieldspec['TitleMenu']    = array ('type' =>'string',
                                          'size' =>600,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => '1',
										  'label'=>'Titolo Immagine',
										  'extraMsg'=>'',
										  'display'=>'1',
										  'lang'=>0,
		);
		
		$fieldspec['Doc']    =array ('type' =>'string',
											'size' =>180,
											'max' => 255,
											'pkey' => 'n',
											'required' => 'n',
											'hidden' => '1',
											'label'=>'Video ',
											'extraMsg'=>CL_VIDEO_EXTRA_MSG,
											'display'=>'1',
											'readonly'=>'0',
											'devComment'=>'usato  per il video',
		                                    'lang'=>0,
											
	    );
	
	    $fieldspec['SubTitle']    = array ('type' =>'string',
                                          'size' =>600,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>'Titolo Interno Pagina',
										  'extraMsg'=>'',
										  'display'=>'0',
										  'lang'=>0,
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
		
		
		
		
		
		
		$fieldspec['Site']  =  array ('type' =>'string',
                                        'size' =>495,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'y',
                                        'hidden' => '1',
										'label'=>CL_WEBSITE,
										'extraMsg'=>' '  ,
										'display'=>'0'
	   );
		
		
       
	   
	   $fieldspec['Abstract']    =array ('type' =>'text',
                                          'size' =>600,
										  'h' =>300,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => '1',
										  'label'=>'Dati tecnici',
										  'lang'=>1,
										  'cssClass'=>'ckeditor',
										  'display'=>1,
		);
		
		$fieldspec['Intro']    =array ('type' =>'text',
                                          'size' =>600,
										  'h' =>200,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => '1',
										  'label'=>'Didascalida dati tecnici',
										  'extraMsg'=>'',
										  'lang'=>1,
										  'cssClass'=>'ckeditor',
										  'display'=>1,
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
        
       
	   $fieldspec['SEO_META_TITLE']  =  array ('type' =>'string',
                                        'size' =>200,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'y',
                                       'hidden' => $this->hideDescrizione,
										'label'=>SEO_META_TITLE.'',
										'extraMsg'=>'max 60 caratteri',
										'display'=>'0',
										'seo'=>1,
	   									'showCount'=>60
	   );
	   
	   
	   $fieldspec['SEO_META_DESCRIPTION']   = array ('type' =>'text',
                                          'size' =>600,
										  'h' =>100,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>SEO_META_DESCRIPTION.'',
										  'extraMsg'=>'Breve descrizione max 160 caratteri',
										  'display'=>'0',
										  'seo'=>1,
	  									  'cssclass'=>'campoNoeditor',
	   									  'showCount'=>160

		);
		$fieldspec['SEO_META_KEYWORD']  =  array ('type' =>'string',
                                        'size' =>200,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'y',
                                        'hidden' => '0',
										'label'=>SEO_META_KEYWORD.'',
										'extraMsg'=>'lista di parole chiave separata da virgola',
										'display'=>'0',
										'seo'=>1
	   );
	   
	   $fieldspec['SEO_META_ROBOTS']  =  array ('type' =>'string',
                                        'size' =>200,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'y',
                                        'hidden' => '0',
										'label'=>SEO_META_ROBOTS.'',
										'extraMsg'=>'',
										'display'=>'0',
										'seo'=>1
	   );
	   
	   $fieldspec['SEO_META_TITLE_ATTRIBUTE']  =  array ('type' =>'string',
                                        'size' =>200,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'y',
                                        'hidden' => '0',
										'label'=>SEO_META_TITLE_ATTRIBUTE,
										'extraMsg'=>'',
										'display'=>'0',
										'seo'=>1
	   );
	   
	   $fieldspec['SEO_META_TITLE_MENU']  =  array ('type' =>'string',
                                        'size' =>200,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'y',
                                        'hidden' => '0',
										'label'=>SEO_META_TITLE_MENU,
										'extraMsg'=>'',
										'display'=>'0',
										'seo'=>0
	   );


        // primary key details
        $this->primary_key              = array('Id');
        // unique key details
        $this->unique_keys              = array('Name');
        $this->userHiddenField          = array('FlagAdmin','Code','IdCategory');
        // default sort sequence
        $this->Order             = $this->suffix.'.Name ';
        $this->addField          = "'Name','Intro'";
        $this->searchField       = "Name";
		$this->sa                = $this->suffix.'.Id';
        $this->sb                = $this->suffix.'.Name';
        $this->sc                = $this->suffix.'.pageCode';
        $this->st		         = $this->suffix.'.Code';//template
		$this->a                 = $this->suffix.'.Id';
        $this->b                 = $this->suffix.'.Name';
		$this->userHiddenField   = array('pageCode,FlagLeftMenu');
		$this->showGallery       =1;
		$this->showDocGallery    =1;
        $this->sezTitle          = CL_PAGE_TITLE_PRODOTTI;
		$this->titoloItem        ='Name';
        return $fieldspec;

    } // getFieldSpec_original

   
   	
// ****************************************************************************
} // end class
// ****************************************************************************
?>