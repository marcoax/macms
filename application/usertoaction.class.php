<?php class  usertoaction  extends commonQuery
{
    // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function usertoaction()
    {
        $this->tablename= TABLE_USER_TO_ACTION;
        $this->suffix= 'uta';
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
		 
		 $fieldspec['IdActivity'] = array('type' => 'integer',
                                          'size' => 200,
                                          'minvalue' => 0,
                                          'maxvalue' => 65535,
                                          'pkey' => 'y',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'display'=>'1',
										  'label'=>CL_TIPO,
										  
        );
        
        
        $fieldspec['IdUser']    = array('type' => 'integer',
                                    'size' => 5,
                                    'minvalue' => 0,
                                    'maxvalue' => 65535,
                                    'pkey' => 'y',
                                    'required' => 'y',
                                    'hidden' => '1',
									'display'=>'1',
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
										  'scombo'=>'categoryParent',
										  'default_value'=>$Id_sez,
        );
        
        $fieldspec['Valore']    = array ('type' =>'string',
                                          'size' =>250,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>CL_TITLE,
										  'extraMsg'=>'',
										  'display'=>'1'
		);
		
        $fieldspec['Disable']    = array('type' =>'integer',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '1',
											   'label'=>CL_DISABILITA,
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
        $this->unique_keys              = array('Dominio,IdUser,IdActivity');
        // default sort sequence
        $this->Order              = $this->suffix.'.Dominio ';
        $this->addField          = "'Dominio'";
        $this->sa          = $this->suffix.'.Id';
        $this->sb         = $this->suffix.'.Title';
        return $fieldspec;

    } // getFieldSpec_original

    // setta il  dominio corrente
    function setIdActivity($IdActivity){
       $this->curIdActivity=$IdActivity;
    } 
    
    function deleteAll(){
      $query=" Delete From ".$this->tablename."  
               where  IdActivity='".$this->curIdActivity."'
               and  Dominio='".$this->$this->curDomain."'
      ";
      $this->db->query($query);
    }
    function ckIfExist($IdUser){
       $this->_ma_pre_getData();
       $this->sel=" count(*) as c ";
       $where="IdActivity='".$this->curIdActivity."'
          and  Dominio='".$this->curDomain."'
          and  IdUser='".$IdUser."'
       ";
       $this->initWhere($where);
       $this->getData(2);
       if($this->Data->c>0) return true;
       else return false
       ;
    }
    function insertAll($dataList){
	 
     foreach($dataList as $d){
        $field='IdActivity,Dominio,IdUser,CreatedBy';
        $value="'".$this->curIdActivity."',
                '".$this->curDomain."',
                '".ma_db_prepare_input($d)."',
                '".ma_getParameter('uid')."'"
        ;
        if($this->ckIfExist($d)==false){
           $this->insertItem($field,$value);
        }
      }
   }
   
   // questo metodo  ritorna la lista degli utenti per una determinata azione o gruppo
   function getUserByAction($IdActivity,$IdUser=0){
   		$this->_ma_pre_getData();
		$this->setTable(TABLE_ADMIN_USER." as u ");
		$this->setSelect('u.*');
		// solo utenti e  associazioni non cancellate
		$this->initWhere('u.Disable=0 and '.$this->suffix.".Disable=0 and ".$this->suffix.".IdUser=u.IdUser");
        if(is_array($IdActivity)){
         $this->wObj->setIN("IdActivity",$IdActivity);
        }
		else if($IdActivity)$this->wObj->setEq("IdActivity",$IdActivity);
		if($IdUser)$this->wObj->setEq("u.IdUser",$IdUser);
		if($this->curDomain)$this->wObj->setEq("dominio",$this->curDomain);
		$this->Order='u.username';
		$this->setGroupBy('u.username');
   }
   
   
    // questo metodo  ritorna la lista degli utenti per una determinata azione o gruppo
   function getUserByActionType($IdActivity,$IdUser=0,$activityType='IdTodoList'){
   		$this->_ma_pre_getData();
		$this->setTable(TABLE_ADMIN_USER." as u ");
		$this->setSelect('u.*');
		// solo utenti e  associazioni non cancellate
		$this->initWhere('u.Disable=0 and '.$this->suffix.".Disable=0 and ".$this->suffix.".IdUser=u.IdUser");
        if(is_array($IdActivity)){
         $this->wObj->setIN($activityType,$IdActivity);
        }
		else if($IdActivity)$this->wObj->setEq($activityTyp,$IdActivity);
		if($IdUser)$this->wObj->setEq("u.IdUser",$IdUser);
		if($this->curDomain)$this->wObj->setEq("dominio",$this->curDomain);
		$this->Order='u.username';
		$this->setGroupBy('u.username');
   }
   
   
   
   function getNotInGroupByUser($IdUser){
   		$ObjUserList= new gruppi();
        $ObjUserList->getGroupByUser($IdUser);
        $ObjUserList->sel="gr.Id as a";
        $ObjUserList->getData();
        if($ObjUserList->Data){
           $list = String::arrayToString($ObjUserList->Data);
        }
        $ObjUserNotList= new gruppi();
        $ObjUserNotList->sel='';
        $ObjUserNotList->_ma_pre_getData();
        $ObjUserNotList->initWhere('Disable=0');
        if($list)$ObjUserNotList->wObj->where.=' and Id not IN ('.$list.')';
        $this->Data=$ObjUserNotList->getData();
   }
// ****************************************************************************
}?>     