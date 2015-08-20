<?php
class  articoli  extends commonQuery
{
    // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function articoli()
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
		$fieldspec['Id'] = array(
			'type' => 'integer',
			'size' => 5,
			'minvalue' => 0,
			'maxvalue' => 65535,
			'pkey' => 'y',
			'required' => 'y',
			'hidden' => '1',
			'display'=>'1',
		);
		
		$fieldspec['Code']    = array (	
			'type' =>'integer',
			'size' =>400,
			'max' => 255,
			'pkey' => 'n',
			'required' => 'y',
			'hidden' => '0',
			'label'=>CL_PAGE_TEMPLATE,
			'extraMsg'=>'',
			'display'=>'1',
			'combo'=>'pageTamplate'
		);
		$fieldspec['IdCategory'] = array(
			'type' => 'integer',
			'size' => 200,
			'minvalue' => 0,
			'maxvalue' => 65535,
			'pkey' => 'y',
			'required' => 'y',
			'hidden' => 1,
			'display'=>'0',
			'label'=>CL_TIPO,
			'combo'=>'categoryTree' ,
		);
		
		$fieldspec['IdParent'] = array(
			'type' => 'integer',
			'size' => 400,
			'minvalue' => 0,
			'maxvalue' => 65535,
			'pkey' => 'y',
			'required' => 'y',
			'hidden' => '0',
			'display'=>'1',
			'label'=>CL_PARENT,
			'combo'=>'categoryPageTree',
		);
		$fieldspec['Dominio'] = array(
			'type' => 'integer',
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
		$fieldspec['sezione'] = array(
			'type' => 'string',
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
		 $fieldspec['DateStart']  =array('type' => 'date',
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
 
	   $fieldspec['IdOpzione'] = array('type' => 'integer',
                                          'size' => 200,
                                          'minvalue' => 0,
                                          'maxvalue' => 65535,
                                          'pkey' => 'y',
                                          'required' => 'y',
                                          'hidden' => '1',
										  'display'=>'1',
										  'label'=>CL_TIPOLOGIE.'  usare solo per le  collezioni',
        								  'hideSelectNull'=>0,
        								  'usePageCode'=>1,
										  'combo'=>'categoryListTree',
										  'Domain'=>'materiali'
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
											'extraMsg'=>'-',
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
                                          'hidden' => '1',
										  'label'=>'Titolo Interno Pagina',
										  'extraMsg'=>'',
										  'display'=>'1',
										  'lang'=>1,
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
		
		
		
		$fieldspec['Intro']    =array ('type' =>'text',
                                          'size' =>600,
										  'h' =>200,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>'Testo descrittivo per x box  pagina',
										  'extraMsg'=>'',
										  'lang'=>0,
										  'cssClass'=>'ckeditor',
										  'display'=>0,
		);
		
		$fieldspec['Latitude']  =  array ('type' =>'string',
                                        'size' =>550,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'y',
                                        'hidden' => '1',
										'label'=>CL_LATITUDE,
										'extraMsg'=>'',
										'display'=>'1'
	   );
       
       
       $fieldspec['Longitude']  =  array ('type' =>'string',
                                        'size' =>550,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'y',
                                        'hidden' => '1',
										'label'=>CL_LONGITUDE,
										'extraMsg'=>'',
										'display'=>'1'
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
                                          'hidden' => '0',
										  'label'=>'Codice per catalogo issue',
										  'extraMsg'=>'',
										  'cssclass'=>'campoNoeditor',
										  'display'=>1,
										  'lang'=>0,
										  'fieldTemplateEnabled'=>'Code'
		);
		
		
		
		
		
		
		$fieldspec['DescriptioHome']    =array ('type' =>'text',
                                          'size' =>600,
										  'h' =>200,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => '1',
										  'label'=>'Testo descrittivo per x Home Page',
										  'extraMsg'=>'',
										  'display'=>$this->showDescrizione,
										  'lang'=>0,
										  'fieldTemplateEnabled'=>'Code'
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
		                                       'hidden' => 0,
											   'label'=>CL_HAS_SUBPAGE.'',
											   'display'=>'1'
        );
        
        
          $fieldspec['flagMenuTop']           = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
                                               'extraMsg'=>'Pagina di primo livello',
		                                       'hidden' => 0,
											   'label'=>CL_SHOW_MENU_TOP,
											   'display'=>'1'
       );
        
      
	   
	    $fieldspec['FlagLeftMenu']           = array('type' =>'boolean',
		                                       'size' =>1000,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => 0,
											   'label'=>'Mostra nel sotto menu',
											   'display'=>'1',
											   'dev message'=>'per ora non uso'
       );
	     $fieldspec['flagMenuDx']           = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '1',
											   'label'=>'non mostra la voce linkabile sul menu sx',
											   'display'=>'1',
											   'dev message'=>'usato per  nascondere il link'
       );
	  $fieldspec['FlagHome']           = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '1',
											   'label'=>CL_FLAG_HOME.' usato per le pagine dei servizi',
											   'display'=>'1'
       );
	
	   $fieldspec['flagReserved']      = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
                                               'extraMsg'=>'pagina ad acesso riservato',
		                                       'hidden' => '1',
											   'label'=>CL_RESERVED_PAGE,
											   'display'=>'1'
       );

       
       $fieldspec['FlagAdmin']          = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
                                               'extraMsg'=>'vede solo  admin',
		                                       'hidden' =>$this->hideDescrizione,
											   'label'=>CL_ADMIN_PAGE,
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
		$this->showImageType	 =1;
        $this->sezTitle          = CL_PAGE_TITLE_ARTICOLI;
		$this->titoloItem        ='Name';
        return $fieldspec;

    } // getFieldSpec_original

     function _ma_pre_getData ($where='')

    {
        // only do this if sql_select is empty
        if (empty($this->sel)) {
             $this->sel = $this->suffix.'.* , '.$this->suffix.'.Id as a, '.$this->suffix.'.name as b';
             $this->tab= $this->tablename." as " .$this->suffix." ";
             if(String::ma_not_null($where))$where=$this->suffix.'.'.$this->primary_key[0]."='".$where."'";
			 else $where=1;
        } // if

       $this->initWhere($where);

    } // _cm_pre_getData

	
    function ma_getArticle($page){
       $this->_ma_pre_getData();
       $this->initWhere("at.Pub=1 and at.Disable=0 and  at.Code='".$page."'");
    } 
   
    function ma_getByPageCode($page){
       $this->_ma_pre_getData();
       $this->initWhere(" at.pageCode='".$page."'");
       $this->getData(2);
    } 

    
    // _cm_pre_getData
   // getOnly The top category
 
   
    function ma_getTopParent($page){
       $this->_ma_pre_getData();
	   //echo $this->hideParentNull;
       if($this->hideParentNull==1)$this->initWhere("at.Code='".$page."'");
	   else $this->initWhere("at.Code ='".$page."' and IdParent is null");
	   if($this->pageCode)$this->wObj->setEq('pageCode',$this->pageCode);
	   //$this->debug=1;
	   $this->getData(2);

    } 
    
    
    function ma_getTopParentbyPageCode($page){
       $this->_ma_pre_getData();
	   //echo $this->hideParentNull;
       if($this->hideParentNull==1)$this->initWhere("at.pageCode='".$page."'");
	   else $this->initWhere("at.pageCode='".$page."' and IdParent is null");
	   if($this->pageCode)$this->wObj->setEq('pageCode',$this->pageCode);
	   $this->getData(2);

    }// _cm_pre_getData
    
	
    
    function ma_getTopParentByCat($IdCategory){
       $this->_ma_pre_getData();
       $this->initWhere("at.idCategory='".$IdCategory."' and IdParent is null" );
	   if($this->Dominio)$this->wObj->setEq('Dominio',$this->Dominio);
	   $this->getData(2);

    } 
    
    function ma_getTopParentByPage($curPage){
       $this->_ma_pre_getData();
       $this->initWhere("at.Id='".$curPage."'");
	   $this->getData(2);
       if(String::ma_not_null($this->Data->IdParent))$this->ma_getTopParentByPage($this->Data->IdParent);
       else $this->IdTopPage=$curPage;

    } 
 
  function _ma_combo_parent($Id,$parent='',$order='Name',$lang='',$IdTipo='Name',$livello=0,$pageCode=''){
       if($this->catOnly!=1)$parentW=(String::ma_not_null($parent))?'and IdParent="'.$parent.'"':' and IdParent is NULL ';
       $pageCodeWhere=($pageCode!='')? "and  at.pageCode='".$pageCode."'":""; 
	   $labelField=($lang)?'cd.Label ':$this->suffix.'.Name'; 
       $this->sel =$this->suffix.'.*,'.$labelField.' as b, '.$this->suffix.'.Id as a, IdParent as IdParent,Code';
       $this->tab= $this->tablename." as " .$this->suffix." ";
	   if($lang){
		   $this->tab.=" left join 
	       ".TABLE_CATEGORYTREE_DESCRIZIONI." cd on ".$this->suffix.".Id=cd.IdOpzioni";
		   $langWhere="  and Lingua='".$lang."' and IdPage='articoli' ";
	   }
       if($this->disablePub==1)$this->initWhere("at.Disable=0  ".$parentW.$langWhere.$pageCodeWhere);
       else $this->initWhere("at.Disable=0 and at.Pub=1  ".$parentW.$langWhere.$pageCodeWhere);
	   if($IdTipo&&$lang)$this->wObj->setEq('cd.IdTipo',$IdTipo);
       if($this->Dominio)$this->wObj->setEq('Dominio',$this->Dominio);
       if($this->IdCategory)$this->wObj->setEq('IdCategory',$this->IdCategory);
       if($this->isAdminOnly==1)$this->wObj->setEqN('FlagAdmin',0);
       $this->Order=$order;
       $this->getData();
       if($this->debug==1)$this->debugQ();
       if(String::ma_not_null($this->Data)){
         foreach($this->Data as $d){
             if(String::ma_not_null($parent)&& $this->hideLevelDecoration!=1)$treeLevel=$this->indent($livello);
			 if($Id==$d->a){
			 	 $this->curPage=$d->Code;
				 $this->curPageData=$d;
		      }
			 else if($this->curPage=='' && $Id<1){
		    	$this->curPage=$d->Code;
				$this->curPageData=$d;
			}
            $this->arrayDataTree[]=$d;
		    $this->comboTreeArray[$livello][]=$d;
	        $selected=($Id==$d->a or (is_array($Id) and in_array($d->a, $Id)))?" SELECTED ":"";
		    $this->comboTree.="<option value='".$d->a."' ".$selected.">".$treeLevel.stripslashes($d->b)."</option>";
            
            if($this->TopOnly!=1)$this->_ma_combo_parent($Id,$d->a,$order,$lang,$IdTipo,$livello+1);
         }
        
      }
      return $this->comboTree; 
    }

   function getPageData($Id,$lang='',$IdTipo='Name',$domain='articoli'){
       $labelField=' cd.Label '; 
       $domain=($domain)?$domain:'articoli';
       $this->tab= $this->tablename." as " .$this->suffix." ";
	   if($lang){
	       $this->sel =$this->suffix.'.*,'.$labelField.' as b,'.$this->a.' as a';
	       $labelField=' cd.Label '; 
		   $this->tab.=" left join 
	       ".TABLE_CATEGORYTREE_DESCRIZIONI." cd on ".$this->suffix.".Id=cd.IdOpzioni";
		   
		   
		   $langWhere="  and Lingua='".$lang."' and IdPage='".$domain."' "; 
		   $this->initWhere("at.Id ='".$Id."' ".$langWhere);
		   if($IdTipo)$this->wObj->setEq('cd.IdTipo',$IdTipo);
	   }
	   else {
	   	   $this->sel =$this->suffix.'.*,'.$this->a.' as a ,'.$this->b.' as b';
	       $this->initWhere("at.Id ='".$Id."' ".$langWhere);
		   
	   }
	  
   }
   
    static function  ma_GetPageNameByCode($page){
         $objPage= new articoli;
    	 $objPage->_ma_pre_getData();
    	 $objPage->debug=0;
         $objPage->initWhere(" at.pageCode='".$page."'");
         $objPage->getData(2);
         return  stripslashes($objPage->Data->Name);   
    }
    
    
     function getListOption($lang='',$IdTipo='Name',$parent=''){

       $parentW=(String::ma_not_null($parent))?'IdParent="'.$parent.'"':' IdParent is NULL ';
       $pageCodeWhere=($pageCode!='')? "and  at.pageCode='".$pageCode."'":""; 
	   $labelField=($lang)?'cd.Label ':$this->suffix.'.Name'; 
       $this->sel =$this->suffix.'.*,'.$labelField.' as b, '.$this->suffix.'.Id as a, IdParent as IdParent, Code,pageCode as t';
       $this->tab= $this->tablename." as " .$this->suffix." ";
	   if($lang){
		   $this->tab.=" left join 
	       ".TABLE_CATEGORYTREE_DESCRIZIONI." cd on ".$this->suffix.".Id=cd.IdOpzioni";
		   if($this->excludeDomain !='') $langWhere="  and Lingua='".$lang."' and IdPage!='".$this->excludeDomain."' ";
		   else if($this->hideDomain==1)$langWhere="  and Lingua='".$lang."'  ";
		   else $langWhere="  and Lingua='".$lang."' and IdPage='articoli' ";
	   }
       $this->initWhere("at.Disable=0 and at.Pub=1 and ".$parentW.$langWhere.$pageCodeWhere);
	   if($IdTipo&&$lang)$this->wObj->setEq('cd.IdTipo',$IdTipo);
       if($this->Dominio)$this->wObj->setEq('Dominio',$this->Dominio);
       if($this->IdCategory)$this->wObj->setEq('IdCategory',$this->IdCategory);
     
       
     } 
    
    
    
    function getPageTree($lang,$IdParent='',$livello=0){
      $this->getListOption($lang,'Name',$IdParent);
      if($IdParent)$this->wObj->setEq('IdParent',$IdParent);
	 
	   $this->getData();
      if($this->Data){
        foreach($this->Data as $d){
            $treeLevel=$this->indent($livello);
            $this->comboTree.=$treeLevel." ".$d->Label."-".$d->Id."<br>";
            $this->comboTreeArray[$livello][]=$d;
            $this->getPageTree($lang,$d->Id,$livello+1);
         }
      }
      
      
      return $this->comboTree;
    }
	function getLinks($Dominio,$sort='',$limit='',$debug=0,$lang=''){
  	 	$objLinks= new articoli();
   		$objLinks->debug=$debug;
   		if($lang!='')$objLinks->lang=$lang;
   		$objLinks->_ma_getList($Dominio);
		if($sort!='')$objLinks->Order=$sort;
		if($limit!='')$objLinks->setLimit(0,$limit);
		$objLinks->wObj->setEq('Pub',1);
   		$objLinks->getData();
   		return $objLinks;
   }
   function getLinksByParent($Dominio,$IdParent,$sort=''){
  	 	$objLinks= new articoli();
   		$objLinks->debug=0;
   		$objLinks->_ma_getList($Dominio);
		if($sort!='')$objLinks->Order=$sort;
		$objLinks->wObj->setEq('Pub',1);
		$objLinks->wObj->setEq('IdParent',$IdParent);
   		$objLinks->getData();
   		return $objLinks;
   }
   
   
   
    function ma_GetPageByCode($page,$lang=''){
    	
         $objPage= new articoli;
    	 $objPage->_ma_pre_getData();
    	 $objPage->debug=0;
         $objPage->initWhere(" at.pageCode='".$page."'");
         $objPage->getData(2);
         $objPage->Data->pageUrl=$objPage->ma_GetPageLink($objPage->Data);
		 if(String::ma_not_null($lang))$objPage->Data=articoli::lang_text_helper($objPage->Data->Dominio,$objPage->Data,$lang,0);
		
		 
		 //$objPage->getPageData($page,$lang,$IdTipo,$objPage->Data->Dominio);
         return  $objPage->Data;   
    }
	
	function ma_GetPageLink( $data ){
   	     $data->t = $data->Code;
   	     $curUrl  = Tool::seoPathHandler( $data );
         return  $curUrl;   
    }
	
	function ma_getPermalink($page,$lang=''){
   	     $objPage= new articoli;
		 $data=$objPage->ma_GetPageByCode($page,$lang);
		 return  $data->pageUrl;   
    }
    

// ****************************************************************************
} // end class
// ****************************************************************************
?>