<?php

class  options  extends commonQuery
{
    // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function options()
    {
        $this->tablename = TABLE_OPTION;
        $this->suffix= 'op';
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
        $fieldspec['Id']    =array('type' => 'integer',
                                             'size' => 5,
                                             'pkey' => 'y',
                                             'required' => 'y',
                                             'hidden' => '1',
											 'label'=>'Id',
											 'display'=>'1'
       );

       



        $fieldspec['IdCategory']    = array('type' =>'string',
                                          'size' =>250,
										  'max' => 255,
                                          
                                          'required' => 'y',
                                          'hidden' => '1',
										  'label'=>CL_CATEGORY,
										  'extraMsg'=>'',
										  'display'=>'1',
										  'default_value'=>$Id_sub
       );


        $fieldspec['name']    =array('type' =>'string',
                                          'size' =>250,
										  'max' => 255,
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>CL_NAME,
										  'extraMsg'=>'',
										  'display'=>'1'
       );
       
       $fieldspec['value']    =array('type' =>'string',
                                          'size' =>600,
										  'max' => 255,
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>CL_VALORE,
										  'extraMsg'=>'',
										  'display'=>'1'
       );
       
        $fieldspec['description']    =array('type' =>'string',
                                          'size' =>600,
										  'max' => 255,
                                          'required' => 'y',
                                          'hidden' => '0',
										 'label'=>CL_DESCRIPTION,
										  'extraMsg'=>'',
										  'display'=>'1'
       );
       
       $fieldspec['FlagAutoLoad']    = array('type' =>'integer',
                                          'size' =>10,
										  'max' => 255,
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>CL_AUTOLOAD,
										  'extraMsg'=>'',										  'display'=>'1',                                          'default_value'=>1
      );
   // primary key details   $this->primary_key              = array('Id');   // unique key details   $this->unique_keys              = array('name');   // default sort sequence   $this->Order                    = $this->suffix.'.name';   //$this->sa="IdDocumento";   $this->suggestField="name";   $this->sa          = $this->suffix.'.name';   $this->sb         = $this->suffix.'.value';   $this->sezTitle=(defined('CL_PAGE_TITLE_'.strtoupper($Id_sub).'_CONFIG'))?constant('CL_PAGE_TITLE_'.strtoupper($Id_sub).'_CONFIG'):"";   $this->titoloItem='Label';   return $fieldspec;
   
   
    function ma_getOption($option_name){      $this->_ma_pre_getData();      $this->_wObj->setEq('name',$option_name);    }
  
  } // getFieldSpec_original
    // ****************************************************************************    // ****************************************************************************// ****************************************************************************
} 
