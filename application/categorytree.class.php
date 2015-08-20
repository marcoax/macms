<?php
class  categorytree  extends commonQuery
{
    // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function categorytree()
    {
        $this->tablename = TABLE_CATEGORYTREE;
        $this->suffix= 'ct';
        $this->commonQuery();
        $this->fieldspec = $this->getFieldSpec_original();
        $this->curLang='';
		

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
        $fieldspec['IdCategory']   = array('type' => 'integer',
                                          'size' => 5,
                                          'minvalue' => 0,
                                          'maxvalue' => 65535,
                                          'pkey' => 'y',
                                          'required' => 'y',
                                          'hidden' => '1',
										  'display'=> '1',
										 
		);
       $fieldspec['IdParent']   = array('type' => 'integer',
                                          'size' => 5,
                                          'minvalue' => 0,
                                          'maxvalue' => 65535,
                                          'pkey' => 'y',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'display' =>'1', 
										  'label'=>CL_CATEGORY_PARENT,
										  'combo'=>'categoryParent',
	   );
      
	  
	   $fieldspec['Dominio']    =  array('type' =>'string',
                                      'size' =>50,
									  'max' => 255,
                                      'pkey' => 'n',
                                      'required' => '0',
                                      'hidden' => '1',
									  'label'=>'',
									  'extraMsg'=>'',
									  'display'=>'1',
									  'default_value'=>$this->Id_sub,
       );
	   
	   $fieldspec['Azienda']    = array('type' =>'string',
                                      'size' =>50,
									  'max' => 255,
                                      'pkey' => 'n',
                                      'required' => '0',
                                      'hidden' => '1',
									  'label'=>'',
									  'extraMsg'=>'',
									  'display'=>'1',
									  'default_value'=>'s2',
       );
     
	  $fieldspec['Label']  =  array ('type' =>'string',
                                        'size' =>500,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'y',
                                        'hidden' => '0',
										'label'=>CL_TITLE,
										'extraMsg'=>'',
										'display'=>'1'
	  );
	   
	   $fieldspec['subTitle']  =  array ('type' =>'string',
                                         'size' =>500,
										 'h' =>200,
										 'max' => 255,
                                         'pkey' => 'n',
                                         'required' => 'y',
                                         'hidden' => '0',
										 'label'=>CL_SOTTO_TITOLO,
										 'extraMsg'=>' ',
										 'display'=>'1'
	   );
	  
	  	$fieldspec['Img']    =array ('type' =>'media',
											'size' =>300,
											'max' => 255,
											'pkey' => 'n',
											'required' => 'n',
											'hidden' => '0',
											'label'=>CL_ICONA,
											'extraMsg'=>'',
											'display'=>'1',
											'readonly'=>'1',
											'mediaType'=>'Img',
		);
		
		$fieldspec['ImgBanner']    =array ('type' =>'media',
											'size' =>300,
											'max' => 255,
											'pkey' => 'n',
											'required' => 'n',
											'hidden' => '0',
											'label'=>CL_IMAGE_BCK,
											'extraMsg'=>'Max 780 x 185 ',
											'display'=>'1',
											'readonly'=>'1',
											'mediaType'=>'ImgBanner',
		);
	  
	  
	  $fieldspec['shortDesc']  =  array ('type' =>'string',
                                         'size' =>100,
										 'h' =>200,
										 'max' => 255,
                                         'pkey' => 'n',
                                         'required' => 'y',
                                         'hidden' => '0',
										 'label'=>CL_CODE,
										 'extraMsg'=>' usare  per il colore #FFF',
										 'display'=>'1'
	   );
	  
	   $fieldspec['longDesc']  =  array ('type' =>'text',
                                        'size' =>600,
										'h' =>200,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'y',
                                        'hidden' => '0',
										'label'=>CL_DESCRIPTION,
										'extraMsg'=>'',
										'display'=>'1'
	   );
	  
	  $fieldspec['Sort']  =  array ('type' =>'string',
                                        'size' =>100,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'y',
                                        'hidden' => '0',
										'label'=>CL_SORT,
										'extraMsg'=>'',
										'display'=>'1'
	  );
	   
	  
	  $fieldspec['Disable']    = array('type' =>'integer',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '1',
											   'label'=>CL_DISABLE,
											   'display'=>'1'
      ); 
       
	   
	  $fieldspec['FlgWeb']           = array('type' =>'boolean',
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
       $this->primary_key              = array('IdCategory');
       // unique key details
       $this->unique_keys              = array('Dominio,Label');
       // default sort sequence
       $this->Order                    = $this->suffix.'.Label';
       return $fieldspec;

    } // getFieldSpec_original

   
    
    function setDominio($value){
      $this->curDominio=$value;
    }
    
    function setAzienda($lang){
      $this->curAzienda=$lang;
    }
   
    
    
   function  prepareTree(){
      $labelF=($this->curlang)?'cl.Label':'ct.Label';
      $this->sel="ct.IdCategory  as a, ".$labelF." as b,ct.IdParent as c";
      $this->tab=TABLE_CATEGORYTREE." as ct";
      if($this->curlang)$this->tab=" left join ".TABLE_CATEGORYTREE_DESCRIZIONI. ' as cl on cl.IdOpzioni=cd.IdCategory ';
      $this->initWhere("Disable=0");
      if($this->curDominio)$this->wObj->setEq("ct.Dominio",$this->curDominio);
      if($this->curAzienda)$this->wObj->setEq("ct.Azienda",$this->curAzienda);
      if($this->curLang)$this->wObj->setEq("lingua",$this->curLang);
   }
   
   
   
   function _ma_pre_getData($where=''){
        // only do this if sql_select is empty
        if (empty($this->sel)) {
             $this->sel = $this->suffix.'.*';
             $this->tab= $this->tablename." as " .$this->suffix." ";
             if(String::ma_not_null($where))$where=$this->primary_key[0]."='".$where."'";
             else $where=1; 
        } // if
        $this->initWhere($where);
    } // _cm_pre_getData

   
   function getTopCategory(){
     $this->prepareTree();
     $this->wObj->setNull("IdParent");
   }
   
   function getCateroryByDomain($IdParent){
      $this->prepareTree();
      $this->wObj->setEq("IdParent",$IdParent);
   }
   
   
   function getCurSelLabel(){
     return $this->curSelLabel;
   }
   
   
   function _ma_combo_d($Id,$dominio,$lang='en',$order="dl.Label",$Azienda){
      $this->sel="ct.IdCategory  as a, cl.Label as b";
      $this->tab=TABLE_CATEGORYTREE."
                 as ct  left join ".TABLE_CATEGORYTREE_DESCRIZIONI. ' as cl on dl.IdOpzioni=dv.IdCategory ';
      $this->initWhere("Dominio='".$dominio."' and Disable=0 ' and Lingua='".$lang."'" );
       if($Azienda)$this->wObj->setEq("ct.Azienda",$Azienda);
      $this->Order=$order;
      $this->getData();
      $this->combo=new combo;
      $this->combo->setInv();
      $this->combo->setMode(2);
      return $this->combo->makeSimpleCombo($this->Data,$Id);
  }


  function getParentCategory($Id){
    $this->_ma_pre_getData($Id);
    $this->getData(2);
    Return $this->Data;
  }
  
  
   function getCategoryByDomain($Dominio){
    $this->_ma_pre_getData();
    $this->wObj->setEq("Dominio",$Dominio);
    $this->getData(2);
    Return $this->Data;
  }
  // da  arry  estra  il primo elemento  di una categoria
  function getFirstItem($Id){
    if($this->arrayDataTree){
	   foreach($this->arrayDataTree as $d){
	   if($Id==$d->IdParent)return $d->a;
	   }
	}
	else Return 'errore';
  }
  
   function _ma_combo_parent($IdParent,$dominio,$lang='',$order="cl.Label",$Azienda='',$parent='',$livello=0){
  
      $parentW=(String::ma_not_null($parent))?'IdParent="'.$parent.'"':' IdParent is NULL ';
	  $labelF=($lang)?'cl.Label':'ct.Label';
      $this->sel="ct.IdCategory  as a, ".$labelF." as b,ct.IdParent";
	
      $this->tab=TABLE_CATEGORYTREE." as ct";
				 
	 
      $this->initWhere("Disable=0  and ".$parentW );
      if($this->Dominio)$this->wObj->setEq("ct.Dominio",'gallery');
      
      if($Azienda)$this->wObj->setEq("ct.Azienda",$Azienda);
	  if(!empty($lang)){
	  	  $this->tab=TABLE_CATEGORYTREE."
                 as ct  left join ".TABLE_CATEGORYTREE_DESCRIZIONI. ' as cl on cl.IdOpzioni=ct.IdCategory ';
	      $this->wObj->setEq("cl.lingua",$lang);
	  }
     
     
      $this->Order=$order;
      $this->setGroupBy('IdCategory');
      $this->getData();
	  if(String::ma_not_null($this->Data)){
         foreach($this->Data as $d){
             if(String::ma_not_null($parent))$treeLevel=$this->indent($livello);
            $selected=($IdParent==$d->a)?" SELECTED ":"";
            if($IdParent==$d->a){
              $this->curSelLabel=$d->b;
            }
            if($this->curId!=$d->a)$this->comboTree.="<option value='".$d->a."' ".$selected.">".$treeLevel.$d->b."</option>";
            $this->_ma_combo_parent($IdParent,$dominio,$lang,$order,$Azienda,$d->a,$livello+1);
         }
      }
      return $this->comboTree;

   }
   

	 
 function _ma_array_parent($IdParent,$dominio,$lang='',$order="cl.Label",$Azienda='',$parent='',$livello=0){
  
      $parentW=(String::ma_not_null($parent))?'IdParent="'.$parent.'"':' IdParent is NULL ';
	  $labelF=($lang)?'cl.Label':'ct.Label';
      $this->sel="ct.IdCategory  as a, ".$labelF." as b,ct.IdParent";
	
      $this->tab=TABLE_CATEGORYTREE."
                 as ct  left join ".TABLE_CATEGORYTREE_DESCRIZIONI. ' as cl on cl.IdOpzioni=ct.IdCategory ';
				 
	 
      $this->initWhere("Dominio='".$dominio."' and Disable=0 ".$aziendaW."  and ".$parentW );
      
      if($Azienda)$this->wObj->setEq("ct.Azienda",$Azienda);
	  if(!empty($lang)){
	      $this->wObj->setEq("cl.lingua",$lang);
	  }
     
     
      $this->Order=$order;
      $this->setGroupBy('IdCategory');
      $this->getData();
       if(String::ma_not_null($this->Data)){
         foreach($this->Data as $d){
             if(String::ma_not_null($parent))$treeLevel=$this->indent($livello);
            $selected=($IdParent==$d->a)?" SELECTED ":"";
            if($IdParent==$d->a){
              $this->curSelLabel=$d->b;
            }
            if($this->curId!=$d->a)$this->arrayTree.=$d->a;
            $this->_ma_combo_parent($IdParent,$dominio,$lang,$order,$Azienda,$d->a,$livello+1);
         }
      }
      return $this->arrayTree;

   }
   
   



  function _ma_ckbox_d($tabellaOpzioni,$Azienda,$IdTipo,$dominio,$lang,$order,$col=3){
      global $Id;
      $this->sel="ct.IdCategory  as a, cl.Label as b";
      $this->tab=TABLE_CATEGORYTREE."
                 as ct  left join ".TABLE_CATEGORYTREE_DESCRIZIONI. ' as cl on cl.IdOpzioni=ct.IdCategory ';
      $this->initWhere("Dominio='".$dominio."' and FlagOb=0 and Azienda='".$Azienda."' and Lingua='".$lang."'" );
      $this->Order=$order;
      $this->getData();
      if(!is_object($this->objOpt))$this->objOpt= new option();
      $this->objOpt->setTable($tabellaOpzioni);
      $this->objOpt->setCol($col);
      $this->objOpt->HtmlOpzioni($this->Data,$Id,$IdTipo);
     }

	 
  function getListOption(){
    $this->sel="ct.IdCategory  as a, cl.Label as b";
    $this->tab=TABLE_CATEGORYTREE."
                 as ct  left join ".TABLE_CATEGORYTREE_DESCRIZIONI. ' as cl on cl.IdOpzioni=ct.IdCategory ';
    $this->initWhere("Dominio='".$dominio."' and FlagOb=0 and Azienda='".$Azienda."' and Lingua='".$lang."'" );
    $this->Order=$order;
  }
  
  function setInCategory($cat){
    $this->inCategory=$cat;
  }
  function setExCategory($cat){
    $this->exCategory=$cat;
  }
  function setTipo($tipo){
    $this->Tipo=$tipo;
  }

// ****************************************************************************
} // end class
// ****************************************************************************



class   treeHTML extends categorytree
{
    // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function treeHTML()  {
        $this->categorytree();
	}
	function addTreelevel($add){
      $this->addTreelevel=$add;
    }
    function setData($table,$dominio='',$lang='',$order='d.Title',$field='Title'){
        $this->sel="d.Id as a, ".$field." as b, d.IdParent as p,d.*"; //default  select
        $this->tab= $table." as d";
        /*$this->tab.=" left join
        ".TABLE_CATEGORYTREE." as ct on   d.IdCategory=ct.IdCategory";
        */
        if($lang!=''){
        
       		 $this->tab.=" left join 
       		 ".TABLE_CATEGORYTREE_DESCRIZIONI." cd on d.Id=cd.IdOpzioni";
			 $this->curLang=$lang;
			 $this->setLang($lang);
		}
        
        if($order)$this->Order=$order;
        // $this->setGroupBy('ct.IdCategory');
      
        if($dominio)$this->setDominio($dominio);
        
     }
     
     
     
    function _ma_combo_parent($IdParent,$parent='',$livello=0,$whereAdd=''){
        if($whereAdd)$this->addWhere=$whereAdd;
        else $this->addWhere='';
        $this->initWhere(' d.Disable=0 and d.Pub=1 '.$this->addWhere);
        
        if(String::ma_not_null($this->curLang)){
          $this->wObj->setEq("cd.lingua",$this->curLang);
        }
        
        if(String::ma_not_null($this->curDominio)){
         $this->wObj->setEq("cd.IdPage",$this->curDominio);
        }
        
         if(String::ma_not_null($this->Tipo)){
         $this->wObj->setEq("cd.IdTipo",$this->Tipo);
        }
        
        if(String::ma_not_null($this->inCategory)){
          $this->wObj->setIN("ct.IdCategory",$this->inCategory);
        }
        if(String::ma_not_null($this->exCategory)){
          $this->wObj->setDIV("ct.IdCategory",$this->exCategory);
        }
      
        
        if(String::ma_not_null($parent)){
          $this->wObj->setEq("d.IdParent",$parent);
        }
        else {
            $this->wObj->setNull("d.IdParent");
        }
        
        if($livello=='0' && $this->startItem)$this->wObj->setEq("d.Id",$this->startItem); 
		$this->debug=0;     
        $this->getData();
		
        if(String::ma_not_null($this->Data)){
                foreach($this->Data as $d){
                    if(String::ma_not_null($parent))$treeLevel=$this->indent($livello);
                    $selected=($IdParent==$d->a)?" SELECTED ":"";
                   // $d->l=$livello;//li;
                    if($IdParent==$d->a){
                      $this->curSelLabel=stripslashes($d->b);
                    }
                    $d->l=$livello;
                    $d->Id=$d->a;
                    $this->arrayTree[]=$d->a;
					
                    if($this->addTreelevel==true)$d->b=$treeLevel.stripslashes($d->b);
                    $this->arrayDataTree[]=$d;
                    if($livello==0) $classOption="top";
                    else $classOption="normal";
                    if($livello==0)$this->comboTree.="<option> </option>";
                    $this->comboTree.="<option value='".$d->a."'".$selected." class=\"".$classOption."\"><b></b>".$treeLevel.stripslashes($d->b)."</option>\n";
                    $this->_ma_combo_parent($IdParent,$d->a,$livello+1);
                }
        }
        return $this->comboTree;
    
    }
	
	
	function ma_create_level_list($data){
		global  $lang;
		if($data){
			$menuSubDx="<ul>\n";
			$i=0;
			foreach($data as $d){
			
				if($this->useLang=1)$d->b=articoli::getDescrizioneByLang($d->a,$lang,'Intro','articoli');
					$pageActive='class="'.$this->objPage->Colore.'"';
					if($this->curPage==$d->a){
						$pageActive='class="current "';
					}
					if($d->a==$this->objPage->IdParent && $d->l==2) $pageActive='class="current "';  
					if($d->l==3)  {
						$d->b=" > ".$d->b;
					}
					if($this->hideLevel<$d->l && String::ma_not_null($this->hideLevel)) {}
					else if(String::ma_not_null($this->showCurCat) && $d->l==$this->hideLevel) {
						if($this->showCurCat==$d->p)$menuSubDx.="<li class=\"".$this->objPage->Colore." level_".$d->l."\">".$prefix."<a href=\"".ma_get_full_url($d->Code.".php")."/".$lang."/".$d->pageCode."/".$d->a."\" ".$pageActive." ".ma_alt_title($d->b).">".$d->b."</a></li>\n";
					}
					else if($d->pageCode!='')$menuSubDx.="<li class=\"".$this->objPage->Colore." level_".$d->l."\">".$prefix."<a href=\"".ma_get_full_url($d->Code.".php")."/".$lang."/".$d->pageCode."/".$d->a."\" ".$pageActive." ".ma_alt_title($d->b).">".$d->b."</a></li>\n";
				$i++;
			}
			
		}
		$menuSubDx.="</ul>\n";
		return $menuSubDx;
	}
}
?>