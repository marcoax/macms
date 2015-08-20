<?php
class  lista  extends commonQuery

{

    // ****************************************************************************

    //class constructor

    // ****************************************************************************

    function lista()

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

    									  'default_value'=>$Id_sub

		); 

		$fieldspec['IdCategory'] = array('type' => 'integer',

                                          'size' => 200,

                                          'minvalue' => 0,

                                          'maxvalue' => 65535,

                                          'pkey' => 'y',

                                          'required' => 'y',

                                          'hidden' => '1',

										  'display'=>'1',

										  'label'=>'',

										  'scombo'=>'categoryTree',

		 								  'default_value'=>2

        );

		

        $fieldspec['IdParent'] = array('type' => 'integer',

                                          'size' => 200,

                                          'minvalue' => 0,

                                          'maxvalue' => 65535,

                                          'pkey' => 'y',

                                          'required' => 'y',

                                          'hidden' => '0',

										  'display'=>'1',

										  'label'=>CL_PARENT,

        								  'hideSelectNull'=>1,

										  'combo'=>'categoryListTree',
										  'default_value'=>$Id_sub,

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

										  

										  'default_value'=>$Id_sub,

        );

         $fieldspec['sezione'] = array('type' => 'string',

                                          'size' => 500,

                                          'minvalue' => 0,

                                          'maxvalue' => 65535,

                                          'pkey' => 'y',

                                          'required' => 'y',

                                          'hidden' => '1',

										  'display'=>'1',

										  'label'=>CL_SEZIONE,

										  'combo'=>'Dominio',

										  'dominio'=>'sezioni',

										  'multiple'=>0,

										  'hideSelectNull'=>0,

	   									  'storeField'=>'Valore'

        );

        $fieldspec['DateStart']    =array('type' => 'date',

                                      'size' =>100,

								      'max' => 255,

                                      'pkey' => 'n',

                                      'required' => 'y',

                                      'hidden' => '0',

									  'label'=>CL_DATE_START,

									  'extraMsg'=>'',

									  'display'=>'0'

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

		

		

		$fieldspec['pageCode']    = array ('type' =>'string',

                                          'size' =>600,

										  'max' => 20,

                                          'pkey' => 'n',

                                          'required' => 'y',

                                         'hidden' =>$this->hideDescrizione,

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

											'extraMsg'=>'dimensione 2000px x 600px',

											'display'=>'1',

											'readonly'=>'1',

											'mediaType'=>'Img',

		);

		

		$fieldspec['ImgBanner']    =array ('type' =>'string',

											'size' =>300,

											'max' => 255,

											'pkey' => 'n',

											'required' => 'n',

											'hidden' => '1',

											'label'=>CL_IMAGE_TITLE_PROGETTO,

											'extraMsg'=>'Max '.IMAGE_MAX_W.'x'.IMAGE_MAX_H,

											'display'=>'1',

											'readonly'=>'1',

											'smediaType'=>'ImgBanner',

		);

		

		$fieldspec['Intro']    =array ('type' =>'string',

                                          'size' =>600,

										  'h' =>200,

										  'max' => 255,

                                          'pkey' => 'n',

                                          'required' => 'y',

                                          'hidden' => '0',

										  'label'=>CL_TITLE,

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
                                          'hidden' =>0,
										  'label'=>CL_DESCRIPTION,
										  'extraMsg'=>'',
										  'lang'=>0,
										  'cssClass'=>'ckeditor',
										  'display'=>1,
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

		

		

       $fieldspec['Site']  =  array ('type' =>'string',

                                        'size' =>200,

										'max' => 255,

                                        'pkey' => 'n',

                                        'required' => 'y',

                                        'hidden' => '1',

										'label'=>CL_WEBSITE,

										'extraMsg'=>'tipo http://www.google.it',

										'display'=>'1'

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

		                                       'required' => '0',

		                                       'hidden' => 1,

											   'label'=>CL_HAS_SUBPAGE.'',

											   'display'=>'1'

        );

        

        

          $fieldspec['flagMenuTop']           = array('type' =>'boolean',

		                                       'size' =>1,

											   'max' => 1,

		                                       'pkey' => 'n',

		                                       'required' => '',

                                               'extraMsg'=>'pagina primo livello',

		                                       'hidden' => '1',

											   'label'=>CL_SHOW_MENU_TOP,

											   'display'=>'1'

       );

        

        $fieldspec['flagMenuDx']           = array('type' =>'string',

		                                       'size' =>1,

											   'max' => 1,

		                                       'pkey' => 'n',

		                                       'required' => '',

		                                       'hidden' => '1',

											   'label'=>CL_SHOW_MENU_DX,

											   'display'=>'1'

       );

	

	     $fieldspec['FlagLeftMenu']           = array('type' =>'boolean',

		                                       'size' =>1000,

											   'max' => 1,

		                                       'pkey' => 'n',

		                                       'required' => '',

		                                       'hidden' =>$this->hideDescrizione,

											   'label'=>CL_SHOW_MENU_SX,

											   'display'=>'1',

											   'dev message'=>'per ora non uso',

											    'default_value'=>'1'

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

	     $fieldspec['FlagHome']           = array('type' =>'boolean',

		                                       'size' =>1,

											   'max' => 1,

		                                       'pkey' => 'n',

		                                       'required' => '',

		                                       'hidden' => '1',

											   'label'=>CL_FLAG_HOME,

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
		$this->showGallery       =0;
		$this->showDocGallery    =0;
		$this->titoloItem        ='Name';
        return $fieldspec;



    } // getFieldSpec_original



   	

// ****************************************************************************

} // end class

// ****************************************************************************

?>