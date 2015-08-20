<?php
 
class commonQuery {
	var $Id;
	var $Disable;
	var $Date;
	var $Time;
	var $Code;
	var $debug;
	var $arrayError;
	//  counstroctor  fella   classe
	
	function  commonQuery(){
		//also init  some global para
		global $DBH;
		global $Id_sub;
		global $Id_sez;
		global $hideDescrizione; //  mostra il  campo desrizione  se  non ho la lingua;
		$this->db=$DBH;
		$this->hideDescrizione=$hideDescrizione; // mosta  nascondi  descrizioni
		$this->Id_sub=$Id_sub;
	}
	
	function setCurId($Id){
		$this->curId=$Id;
	}
	//setto la lingua
	function setLang($value){
		$this->curLang=$value;
	}
	
	// function extra solo  quelli non obsoleti
	function setActive() {
		$this -> isActive = 1;
	}
	
	// soloi pubblicati
	function setPub() {
		$this -> isPub = 1;
	}
	
	// soloi pubblicati
	function setReserved() {
		$this -> isReserved = 1;
	}
	// setta il  dominio corrente
	function setDomain($domian){
		$this->curDomain=$domian;
	}
	
	 // soloi pubblicati
	function setCurField($field){
		$this->curField=$field;
	}
	function setLimit($i=0,$f=10){
		$this->limit= " Limit ".$i.",".$f;
	}
	
	function setTable($tab){
		$this->tab.="," .$tab;
	}

	function setSelect($sel){
		if(String::ma_not_null($this->sel))$this->sel.=",".$sel;
		else $this->sel=$sel;
	}

	function setOrder($Order){
		$this->Order=$Order;
	}

	function setRandom($limit=15) {
		$this->Order=" RAND() ";
		$this->limit=" limit " .$limit;
	}

	function addJoin($tab){
		$this->tab.=" left join ".$tab;
	}

	function initWhere($where=''){
		$this->wObj=new where;
		$this->wObj->setWhere($where);
	}
	
	function setGroupBy($groupby){
		if(String::ma_not_null($this->groupBy))$this->groupBy.=",".$groupby;
		else $this->groupBy=" group by " .$groupby;
	}
	
	function  resetQuery(){
		$this->sel='';
		$this->tab='';
		$this->Order='';
		$this->limit='';
	}
	/******************************************start PDO  helper ***********************************/

	function getData($mode=1){
		$this->qE="	SELECT 	".$this->sel."
					From	".$this->tab."
					where   ".$this->wObj->getWhere()."
		 			".$this->groupBy."
					Order By " .$this->Order
					.$this->limit;
					
	      if($this->debug) echo $this->qE;
		try {
			$this->STH=$this->db->query($this->qE);
			$this->STH->setFetchMode(PDO::FETCH_OBJ);
			if($mode==1) $this->Data=$this->STH->fetchAll();
			else if($mode==2) $this->Data=$this->STH->fetch();
			else if($mode==3) $this->Data=$this->STH->fetch();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			//file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
		}

		
		return $this->Data;
	}
	//  this   function retur  the  query
	function debugQ(){
		echo $this->qE."<br>";
	}

	function updateById($id,$value){
	$q="UPDATE	".$this->tab."
		    SET  	".$this->curField."= '".addslashes($value)."',
		    		lastUser='".ma_getParameter('uid')."'
		  	WHERE 	".$this->primary_key[0]." = '".$id."'";
		$this->execute($q);
   }

   function updateFastById($id,$curField,$value){
       $q="UPDATE ".$this->tablename." 

	       SET  ".$curField."= '".addslashes($value)."', 

               lastUser='".ma_getParameter('uid')."'

		   WHERE ".$this->primary_key[0]." = '".$id."'";

	   $this->execute($q);

   }

   

   

   function removeItem($Id){

         $this->qD="update ".$this->tablename." 

                   set Disable=1,

                   lastUser='".ma_getParameter('uid')."' 

                   where ".$this->primary_key[0]."='".$Id."'";

        $this->execute($this->q);

   }

   

   function deleteItem($Id,$addWhere=''){

        $this->q="Delete from ".$this->tablename." 

                   where ".$this->primary_key[0]."='".$Id."'" .$addWhere;
        
        $this->rowCount=$this->execute($this->q);
        return  $this->rowCount;
	
  } 

   

   function deleteItemValue($campo,$Id){
      
         $this->q="update ".$this->tablename." 

                   set ".$campo."='',

                   lastUser='".$_SESSION['uid']."' 

                   where ".$this->primary_key[0]."='".$Id."'";

        $this->execute($this->q);

   }

   
   function deleteItemValueFromSet($campo,$Id,$Id_sez){
        $objItem=explode('_',$Id);
		$objItemA=$objItem[0];//oggetoo propretiario
		$objItemB=$objItem[1];//oggetoo da rimuovere
	    $objData=articoli::ma_getFastRow($Id_sez,$objItemA);
	    
	
	    $arrayOriginal=explode(',',$objData->$campo);
		
	    $arrayResult=array_diff($arrayOriginal, array($objItemB));
	    $this->q="update ".$this->tablename." 

                   set ".$campo."='".implode(',',$arrayResult)."',

                   lastUser='".$_SESSION['uid']."' 

                   where ".$this->primary_key[0]."='".$objItemA."'";

        $this->execute($this->q);

   }
   
   
   function addItemToSet($Id_sez,$campo,$objItemA,$objItemB){
   	
        $objData=articoli::ma_getFastRow($Id_sez,$objItemB);
      	$arrayOriginal=explode(',',$objData->$campo);
   		array_push($arrayOriginal,$objItemA);
		$arrayOriginal=array_unique($arrayOriginal);
		$new_array_without_nulls = array_filter($arrayOriginal);	
		$this->q="update ".$this->tablename." 

                   set ".$campo."='".implode(',',$new_array_without_nulls)."',

                   lastUser='".$_SESSION['uid']."' 

                   where ".$this->primary_key[0]."='".$objItemB."'";

       $this->execute($this->q);
		
  }

   

    function insertItem($field,$values){

       $this->q="Insert 

                      INTO ".$this->tablename." 

                      (".$field.")

                      VALUES(".$values.")

       ";

       $this->execute($this->q);

   }

   

   function insertnewItem($field,$values,$data){

       $this->q="Insert 
                INTO ".$this->tablename." 
                (".$field.")
                VALUES(".$values.")
      ";
      try {
 		  $this->STH = $this->db->prepare( $this->q);
	      $this->STH->execute($data);
	      return  $this->db->lastInsertId();
     }
     catch(PDOException $e) {  
       return $e->getMessage();  
     }  
   }

   
   
    function insertItemArray($params=array(),$debug=0){
   	 
      $this->qInsert="Insert 
                      INTO ".$this->tablename." 
                      (".implode(",",array_keys($params)).")
                      VALUES (".implode(",",array_values($params)).")
	  ";
	  if($debug=1) echo $this->qInsert;
      
      try {
 		   $this->execute($this->qInsert);
	       return  $this->lastInsertId=$this->db->lastInsertId();
      }
      catch(PDOException $e) {  
      	 return $e->getMessage();  
     } 
   }
   

   

   // count Rows  query 

   function countRows($sql){

      $STH=$this->db->query($sql);
      $STH->setFetchMode();
      $this->Data=$STH->fetch();
      if($this->debug) echo $sql;
      return $this->Data[0];
   }

   
   
   

   

   function execute($q){
   	 $this->STH=$this->db->prepare($q);
   	 if($this->debug) echo $q; 
	 $this->STH->execute();
	 return $this->STH->rowCount();

   }

   //fect all  using  obj

   function executeSel($sql,$all=0){
   	  	
     
	  
	     	  $STH=$this->db->query($sql);

      $STH->setFetchMode(PDO::FETCH_OBJ);

      if($all==1)$this->Data=$STH->fetchAll();

	  else  $this->Data=$STH->fetch();
    
    
	  return $this->Data;

   }

    

   //get   col info   from table;

   function get_col_info($type){

        $sql = 'SHOW COLUMNS FROM ' . $this->tablename;

        $this->stmt = $this->db->prepare($sql);

        $this->column_names=array();    

        try {    

            if($this->stmt->execute()){

                $raw_column_data = $this->stmt->fetchAll();

				

                 foreach($raw_column_data as $outer_key => $array){

        	

                    foreach($array as $inner_key => $value){

                         

                        if ($inner_key === $type){

                        	

                                if (!(int)$inner_key){

                                	if($type=='Null'){

                                		if($value=='YES')$this->column_names[] = 0;

										else $this->column_names[]=1;

                                	}

									else if($type=='Type'){

                                		$valueArray=explode("\(",$value);

                                		$this->column_names[] = $valueArray[0];

                                	}

									else $this->column_names[] = $value;

                                }

                            }

                    }

                }        

            }

            return true;

        } catch (Exception $e){

                return $e->getMessage(); //return exception

        }        

    } 

    

	 //get   col info   from query;

	function get_col_info_by_query($stmtTable, $type = 'name') {

		$this -> column_names = array();

		try {

			$this -> colcount = $stmtTable -> columnCount();

			for ($i = 0; $i < $this -> colcount; $i++) {

				$meta = $stmtTable -> getColumnMeta($i);

				if ($type == 'native_type') {

					$this -> column_names[] = $this -> _translateNativeType($meta[$type]);

				} else {

					$this -> column_names[] = $meta[$type];

				}

			}

			return $this -> column_names;

		} catch (Exception $e) {

			return $e -> getMessage();
			//return exception

		}

	}
  //translate PDO Native type	

  private function _translateNativeType($orig) {

    $trans = array(

        'VAR_STRING' => 'stringa',

        'STRING' => 'stringa',

        'BLOB' => 'blob',

        'LONGLONG' => 'int',

        'LONG' => 'int',

        'SHORT' => 'int',

        'DATETIME' => 'datetime',

        'DATE' => 'data',

        'DOUBLE' => 'real',

        'TIMESTAMP' => 'timestamp'

    );

    return $trans[$orig];

  }	

  function updateSortList($data){
	if($data){

			$this->sortStep=($this->sortStep)?$this->sortStep:10;
			$this->sortNum=$this->sortStep;
			foreach($data as $d){
				$this->updateById($d,$this->sortNum);
				$this->sortNum=$this->sortNum+$this->sortStep;

			}
    	}
  }
   // estra  velocemente  la  descrizione  di una  lingua  
	function ma_getFastDescrizione($Dominio,$IdTipo,$Id,$lang){
		$objItem=new articoli;
		$objItem->qE="	SELECT Label
						From   ".TABLE_CATEGORYTREE_DESCRIZIONI."
						where  IdPage='".$Dominio."'
							and  IdTipo='".$IdTipo."'
							and  IdOpzioni='".$Id."'
							and  Lingua='".$lang."'
		";
		$d= $objItem->executeSel($objItem->qE);
		return $d->Label;
	}
 	// basic  get  data  can be override by the extended  class 
	function _ma_pre_getData($where=''){
		// only do this if sql_select is empty
		if (empty($this->sel)) {
			$this->sel = $this->suffix.'.*';
			$this->tab= $this->tablename." as " .$this->suffix." ";
			if(String::ma_not_null($where))$where=$this->suffix.".".$this->primary_key[0]."='".$where."'";
			else $where=1; 
		} // if
		else $where=1;
			$this->initWhere($where);
		}

	function getRow($where){
		$this->_ma_pre_getData($where);
		$this->getData(2);
		return $this->Data;
	} 

	//************  ritorna  velocemente i dati di una riga
	function ma_getFastRow($Id_sez,$Id=''){
	if(String::ma_not_null($Id)){
			$objSez= new $Id_sez;
			$objSez->getRow($Id);
			return $objSez->Data;
		}
		else return '';
	}
	
	 function ma_getItemByField($table,$field,$value){
 	    $objSez= new $table;
		$objSez->_ma_pre_getData();
		$objSez->debug=0;
    	$objSez->wObj->setEq($field,$value);
		$objSez->getData(2);
    	return $objSez->Data;
    }

    function ma_getFastLabel($table,$field,$value,$returnField){
 	    $objSez= new $table;
		$objSez->_ma_pre_getData();
		$objSez->debug=0;
    	$objSez->wObj->setEq($field,$value);
		$objSez->getData(2);
    	return $objSez->Data->$returnField;
    }

	function getPrimaryKey(){
		$this->tablename=$this->tab;
		$this->get_col_info("Field");
		return $this->PrimaryKey=$this->column_names[0];
	}
 
   function ckItem($field,$value){
	    $this->_ma_pre_getData();
		$this->initWhere(1);
		$this->wObj->setEq($field,$value);
		$this->getData(2);
		if($this->Data)return true;
		else return false;

	 }
	
	//add  this  extra  function    to  crete    common  combo  box
	function  makeCombo($Id)   {
		$this->combo=new combo;
		$this->combo->setInv();
		$this->combo->setMode(2);
		$this->w_cData=$this->combo->makeSimpleCombo($this->Data,$Id);
	}
	
	function _ma_combo_d($Id,$addWhere=1){
		$this->tab=$this->tablename ." as ".$this->suffix;
		$this->sel=$this->sa."  as a,".$this->sb." as b";
		$this->initWhere($addWhere);
		if($this->isActive==1)$this->wObj->setEqN("Disable",0);
		if($this->isPub==1)$this->wObj->setEqN("Pub",1);
		$this->getData();
		$this->combo=new combo;
		$this->combo->setInv();
		$this->combo->setMode(2);
		return $this->combo->makeSimpleCombo($this->Data,$Id);
	}



    function getCount(){

     $this->cField=(String::ma_not_null($this->cField))?$this->cField:' * ';
  	 $this->qC="Select Count(".$this->cField.")
                from  ".$this->tab."
                where
                     ".str_replace('where','',$this->wObj->getWhere())

      ;

      return $this->NumRows=$this->countRows($this->qC);

   } 

function initPager($limit=10,$sep='',$stringaPercorso=''){

     // setto  anche  per  la  ricerca

      global $cerca;

      if(!empty($cerca))$this->ricerca($cerca);
      $p= new Pager;
	  $p->sep=$this->sep;
      $this->getCount($countF);
      $this->start = $p->findStart($limit);
	  $p->maxPages = $this->maxPages;
	  $p->useStep=$this->useStep;
	  $this->pages = $p->findPages($this->NumRows, $limit);
      $this->pagelist =$p->seoPageList($_REQUEST['page'],$this->pages,$stringaPercorso);
      $this->setLimit($this->start,$limit);
      return  $this->pagelist;

  }



  function ricerca($parola){

      $this->parola=$parola;

	  $c= new cerca;

      $where=$this->wObj->getWhere();

      $c->setData( $this->searchField ,$where);

      $this->wObj->where=$c->getQuery($this->parola);

    }

	

    

  function  pagerString($pathString){

  	

  	 if(String::ma_not_null($this->pagerString))$this->pagerString.="&".$pathString;

        else $this->pagerString=$pathString;

  }

	

  //lista semplice

	function _ma_getList($dominio='',$status=0){

	   $this->_ma_pre_getData();

       $this->tab=$this->tablename." as ".$this->suffix;

      

	   $this->initWhere($this->suffix.".Disable=0");

	   if($dominio)$this->wObj->setEq($this->suffix.".Dominio",$dominio);

	   if($this->lang) {
	             $this->tab=$this->tablename." as ".$this->suffix. " 
                 left join ".TABLE_CATEGORYTREE_DESCRIZIONI.' as cl 
                 on cl.IdOpzioni='.$this->suffix.'.Id';
                 $this->setSelect('cl.Label as b, cl.IdOpzioni as a');
	             $this->wObj->setEq('Lingua',$this->lang);
	   }

	  

	   else   {

	   	 if($this->sa)$this->setSelect($this->sa.'  as a');
         if($this->sb)$this->setSelect($this->sb.'  as b');
         if($this->sc)$this->setSelect($this->sc.'  as c');
		 if($this->sm)$this->setSelect($this->sm.'  as m');
	     $this->tab=$this->tablename." as ".$this->suffix;

    	}

	}

    

    function _ma_getOptions($dominio='',$autoload=false){
	   $this->_ma_pre_getData();
       $this->tab=$this->tablename." as ".$this->suffix;
       if($this->sa)$this->setSelect($this->sa.'  as a');
       if($this->sb)$this->setSelect($this->sb.'  as b');
       if($this->sc)$this->setSelect($this->sc.'  as c');
	   if($autoload===true)$this->wObj->setEq($this->suffix.".FlagAutoLoad",1);
	   if($dominio)$this->wObj->setEq($this->suffix.".IdCategory",$dominio);
    }

	

   

    function  actionHandler($dataList,$value){

	   if(is_array($dataList)){

		  foreach($dataList as $d){

		   	if($this->actionType=='update'){

			  $this->updateById($d,$value);

			}

			if($this->actionType=='delete'){

			  $this->deleteItem($d);

			}

            elseif($this->actionType=='insert'){

            }

		  }

	   }

	   else {

	   }

	}

  /****************************  some layout  helper   funtion **********************/

  /****************** manage  the suggest list ***********************/  

   function  suggestList($value,$addWhere=''){

        $this->_ma_pre_getData();

        $this->suggestField=($this->suggestField)?$this->suggestField:$this->sb;
        $this->initWhere($this->suffix.".Disable=0");
        $this->wObj->setLike($this->suggestField,$value); 
		if($addWhere)  $this->wObj->addWhere($addWhere); 
        $this->setSelect($this->suggestField.'  as b, '.$this->sa.' as a');

        //$this->setGroupBy($this->suggestField);

        $this->getData();

        
        return $this->Data;

  }

  

  /*********************************** lista  tree  orizzontale ***********************/

 // ritorna  l'albero piu il top  parent 

function getTreeFromChild($Id){

    if($Id){

        $this->arrayTree[]=$Id; //  tiene traccia   di tutti i parent;

        $this->_ma_pre_getData();

        $this->initWhere($this->suffix.".Id=".$Id);

        

        $this->sel=$this->suffix.".IdParent as IdParent";

        if($this->sa)$this->setSelect($this->sa ." as a");

        if($this->sb && $this->lang=='')$this->setSelect($this->sb ." as b");

        if($this->sc)$this->setSelect($this->sc ." as c");
		if($this->sd)$this->setSelect($this->sd ." as d"); //template

        if($this->st)$this->setSelect($this->st ." as t"); //template

        if($this->getAll)$this->setSelect($this->suffix.".* ");

        if($this->lang!=''){ 

        $this->tab=$this->tablename." as ".$this->suffix. " 

                 left join ".TABLE_CATEGORYTREE_DESCRIZIONI.' as cl 

                 on cl.IdOpzioni='.$this->sa;

                 if($this->lang)$this->wObj->setEq('Lingua',$this->lang);

                 if($this->IdTipo)$this->wObj->setEq('IdTipo',$this->IdTipo);

                 $this->setSelect('cl.Label as b');

        }



        $this->getData(2);
        $this->arrayBreadCrumbsItem[]=$this->Data->a;
        $this->arrayBreadCrumbs[]=$this->Data ;

        if(String::ma_not_null($this->Data->IdParent)){

            $this->getTreeFromChild($this->Data->IdParent);

        }

        else {

            $this->arrayRevBreadCrumbs=array_reverse ($this->arrayBreadCrumbs, TRUE);
			$this->arrayRevBreadCrumbsItem=array_reverse ($this->arrayBreadCrumbsItem, TRUE);
           
            $this->TopId=$Id;

            return $this->TopId;

        }

    }

}





 function getListByCategory($IdCategory,$IdFamily='',$lang='',$IdTipo='Descrizione'){

      $this->_ma_pre_getData();

      $this->tab=$this->tablename." as ".$this->suffix. " 

                 left join ".TABLE_CATEGORYTREE_DESCRIZIONI.' as cl 

                 on cl.IdOpzioni='.$this->suffix.'.Id';

      $this->setSelect('cl.Label as b, cl.IdOpzioni as a');

      $this->initWhere($this->suffix.'.Disable=0');

      if($IdCategory)$this->wObj->setEq('IdCategory',$IdCategory);

      if($IdFamily)$this->wObj->setF_I_S('Dominio',$IdFamily);

      if($lang)$this->wObj->setEq('Lingua',$lang);

      if($IdTipo)$this->wObj->setEq('IdTipo',$IdTipo);

      //$this->wObj->setNotNull('IdParent');

    

      $this->Order=$this->suffix."Title";

      

  }



function getRandom($obj,$where='',$lang='',$limit=1) {

	  

	  $objCur=new $obj;

	  $objCur->_ma_pre_getData();

	  if(String::ma_not_null($where))$objCur->initWhere($objCur->suffix.'.Disable=0 and  '.$where);

	  else $objCur->initWhere($objCur->suffix.'.Disable=0 ');

	  $objCur->Order=" RAND() ";

      $objCur->limit=" limit ".$limit;

	  $objCur->debug=0;

      if($limit==1)$objCur->getData(2);

	  

      else $objCur->getData();

      

	  if(String::ma_not_null($lang) && String::ma_not_null($objCur->Data->Id)) {

	       $objPageData=new $obj();

		   $objPageData->setDomain($obj);

		   $objPageData->setLang($lang);

		   $objPageData->getDescrizioni($objCur->Data->Id,'Intro');

		   $objPageData->getData(2);

		   $objCur->Data->Name=stripslashes($objPageData->Data->b);

	  }

	  

	  return $objCur->Data; 

}







function getlast($obj,$where='',$lang='',$limit=1) {

	  

	  $objCur=new $obj;

	  $objCur->_ma_pre_getData();

	  if(String::ma_not_null($where))$objCur->initWhere($objCur->suffix.'.Disable=0 and  '.$where);

	  else $objCur->initWhere($objCur->suffix.'.Disable=0 ');

	  $objCur->setSelect(' DATE_FORMAT(DateStart,"%d-%m-%y") as dayStart,DATE_FORMAT(DateStop,"%d-%m-%y") as dayStop');

	  $objCur->limit=" limit ".$limit;

	  $objCur->Order=" DateStart DESC ";

      if($limit==1)$objCur->getData(2);

      else $objCur->getData();

      

	  if(String::ma_not_null($lang) && String::ma_not_null($objCur->Data->Id)) {

	       $objPageData=new $obj();

		   $objPageData->setDomain($obj);

		   $objPageData->setLang($lang);

		   $objPageData->getDescrizioni($objCur->Data->Id,'Intro');

		   $objPageData->getData(2);

		   $objCur->Data->Name=stripslashes($objPageData->Data->b);

	  }

	  

	  return $objCur->Data; 

}











 function getDescrizioni($Id,$IdTipo='Name'){

       $labelField=' cd.Label '; 

       $this->sel =$this->suffix.'.*,'.$labelField.' as b';

       $this->tab= $this->tablename." as " .$this->suffix." ";

	   if($this->curLang){

		   $this->tab.=" left join 

	       ".TABLE_CATEGORYTREE_DESCRIZIONI." cd on ".$this->suffix.".Id=cd.IdOpzioni";

		   $langWhere="  and Lingua='".$this->curLang."' ";

	   }

       $this->initWhere($this->suffix.".Id ='".$Id."' ".$langWhere);

	   if($IdTipo)$this->wObj->setEq('cd.IdTipo',$IdTipo);

	   if($this->curDomain)$this->wObj->setEq('cd.IdPage',$this->curDomain);

 }

 

 function  lang_text_helper($curPage,$data,$lang){



	    if($curPage=='page')$objPageLang=new articoli();    

        else if(class_exists($curPage))$objPageLang=new $curPage();

        else $objPageLang=new articoli();

	      $objPageData=new articoli();  

	      //estraggo  tutti i campi in lingua

	      foreach ($objPageLang->fieldspec as $chiave => $valore) {

	        if($valore['lang']==1){

	            $objPageData->getPageData($data->a,$lang,$chiave,$curPage);

	            $objPageData->debug=0;

	            $objPageData->getData(2);

	            $data->$chiave=stripslashes($objPageData->Data->b);

	            $i++;

	        }

	      }

	      

	      return $data;

	  }

  

 

   function getDescrizioneByLang($Id,$lang,$IdTipo='Name',$Dominio){

   	  

   	  $articoli= new articoli();

	  $articoli->curLang=$lang;

	  $articoli->curDomain=$Dominio;

	  $articoli->getDescrizioni($Id,$IdTipo);

	  $articoli->debug=0;

   	  $articoli->getData(2);

	  return stripslashes($articoli->Data->b);

   }

  

  

  function getChildData($curArticle,$pageTopId,$domain,$nLang='0',$tipo='Name'){

       global $lang;

       $objMenuTree=new treeHTML();

       if($nLang>1){

        $objMenuTree->setData('article',$domain,$lang,'d.Sort','cd.Label');

       }

       else {

        $objMenuTree->setData('article',$domain,$lang,'d.Sort','d.Name');

       }

      $objMenuTree->setTipo($tipo);

      $objMenuTree->_ma_combo_parent($curArticle,$pageTopId,0,' ');

      return $objMenuTree->arrayDataTree;

    }

	

	

	function get_first_child($IdParent,$data) {

     

	 

	 foreach($data as $d){

	       

			 if($d->IdParent==$IdParent){

			   $this->dataChild=$d;		  

		     return  $d->a;

			}

   

   }

   }



/*********************** utility***********************/

	function indent($level=0){
	     $str="|";
	     for ($i=0;$i<$level;$i++){
	        $str.="___";
	     }
	     return $str;
	}

	function storeQuery(){
		$this->listQuery[]=$this->db->last_query;
	}
	
	function errorHandlaer($error){
		$this->errorCode=$error;
	}
 	//	daniele	2009.11.18
	//	generate an unique code

	function createCode($p_string, $start, $lenght) {
		$newString = $p_string . substr($p_string,$start,$lenght);
		return md5($newString);
	}

  	

	function pageCodeHandler($mode=''){
		$mainTab	= ma_getParameter('mainTab');
		$pageName	= ma_getParameter($mainTab.'_Name');
		if(!String::ma_not_null($_POST[$mainTab.'_pageCode']) || $mode=='up' ){
			
			$_POST[$mainTab.'_pageCode']= ma_sanitize_seo_page_title($pageName);
			
		}
	}
	
	
	function pageCodeUniqueHandler($mode=''){
		$mainTab				= ma_getParameter('mainTab');
		$this->originaleName	= ma_getParameter($mainTab.'_Name');
		
		if(!String::ma_not_null($_POST[$mainTab.'_pageCode']) || $mode=='up' ){
			   
			   $this->createUniqueCode();
			   $_POST[$mainTab.'_pageCode']=$this->pageCode;
			
		}
	}
	
    function createUniqueCode($a=0){
    	if($a==5) die();
    		
    	$this->pageCode = ($a)?ma_sanitize_seo_page_title($this->originaleName.'_'.$a):ma_sanitize_seo_page_title($this->originaleName);
		$curItems		=	$this->ma_get_itemByPageCode($this->pageCode,'');
		if($curItems->Id>0) {
			 
			 $this->createUniqueCode($a+1);
		}
		else  {
			return $this->pageCode;
			
		}

	}


	function ma_get_itemByPageCode($page,$lang=''){
	
		$objPage= new articoli;
		$objPage->_ma_pre_getData();
		$objPage->debug=0;
		$objPage->initWhere(" at.pageCode='".$page."'");
		$objPage->getData(2);
		    
		if(String::ma_not_null($lang))$objPage->Data=articoli::lang_text_helper($objPage->Data->Dominio,$objPage->Data,$lang,0);
		return  $objPage->Data;   
	}
	

  	function ma_getPageIdByPageCode($Id_sez,$pageCode){

       $objSez  = new $Id_sez;
	   $objSez->_ma_pre_getData();
	   $objSez->initWhere($objSez->suffix.".pageCode='".$pageCode."'");
	   $objSez->getData(2);
   	   $objSez->tab=$objSez->tablename;
	   $pk=$objSez->getPrimaryKey();
	   //$objSez->debugQ(2);
	   return $objSez->Data->$pk;
  }
  
   
  function createMapJsArray($data){

        $i=1;
    	if($data) {
    	foreach ($data as $d) {
    		if($d->Latitude!=0){
    			$title=ma_trim($d->Name);
    			$text=ma_trim($d->Descrizione);
    			$arrayDati[]="['".$title."',".$d->Latitude.",".$d->Longitude.",".$i.",'".addslashes($text)."']";
    			$i++;
    		}
    	}
    	return implode(',',$arrayDati);
       }
    } 
   //   funzione  che mi  crea  i  campi  della  tabella da metter  in un  oggetto

   function create_obj($tablename,$mode=''){

       $this->executeSel("SHOW FULL COLUMNS FROM $tablename",1);

    	foreach($this->Data as $d){
		$d->Type=str_replace(')','',$d->Type);

		$d->TypeAr=explode("\(",$d->Type);

	

		$d->DATA_LENGTH=$d->TypeAr[1];

		$d->Type=$d->TypeAr[0];	

		if($d->Type=='int' && $d->Type=='float')$d->itemType='integer';

		elseif($d->Type=='date' || $d->Type=='timestamp')$d->itemType='date';

		elseif($d->Type=='int'  && $d->DATA_LENGTH=='1')$d->itemType='boolean';

		elseif($d->Type=='text' )$d->itemType='text';

		else $d->itemType='string';

		if($d->DATA_LENGTH>255) {

			 $d->itemType='text';	

		}

		

		

		if($mode=='json'){

			 echo '	//'.$d->Comment;

	 	     echo "\n";	

			 echo "Campo:".$d->Field;

			 echo "\n";

			 echo "Type:".$d->Type."($d->DATA_LENGTH)";

			 echo "\n";

		}

		else {

			

	 	echo '	//'.$d->Comment;

	 	echo "\n";

        echo ' 	$fieldspec'."['".$d->Field."']= array('type' =>'$d->itemType',

 					'size' =>,

 					'h' =>'',

					'max' => $d->DATA_LENGTH,

 					'pkey' => 'n',

 					'required' => '0',

 					'hidden' => '0',

 					'label'=>CL_".str_replace(' ','_',strtoupper($d->Field)).",

 					'extraMsg'=>'',

 					'display'=>'1',

 					'devMsg'=>'".$d->Comment."'

									 

	    );\n";
	    $popolate.='$this->populateInsertArray'."('".$d->Field."','',2);".'	//'.$d->Comment.''.";\n";
		}
    	}
        echo  $popolate;
    }


	/*******************************************************json  utility  handler *********************************/
	
	
	
	
     function populateInsertArray($field,$para,$sistemVariable=0,$lenght=0){
       if($sistemVariable==1)$this->insertArray[$field]=$para;
       elseif($sistemVariable==2){
       	                  if($lenght==0)$this->insertArray[$field]="'".$para."'";
                          else $this->insertArray[$field]="'".substr($para,0,$lenght-1)."'";
	   }
	   elseif($sistemVariable==3){
	   	       $para=(String::ma_not_null($para))?"T":"F";
	    	   $this->insertArray[$field]="'".$para."'"; // oracle  boolean
	   }
	   elseif($sistemVariable==4){
	   	       //$para='to_date(\''.$para.'\',\'dd/mm/YYYY\')';
	    	   $this->insertArray[$field]="'".$para."'"; // oracle  boolean
	   }
	   elseif($sistemVariable==5){
	   	       if(strlen($para)==0)$this->insertArray[$field]="'".$para."'";
               else $this->insertArray[$field]=str_replace(',', '.',$para);  //  sanitize  number
	   	        //if($para$lenght==0)$this->insertArray[$field]="'".$para."'";
                        
	   }
	  
	   
       else $this->insertArray[$field]="'".$this->db->escape($_REQUEST[$para])."'";
    }	
    function jsonToQuery($method='i'){
    
      	if($this->jsonData){
      			foreach($this->jsonData->data[0]  as $key => $value){
      			if($this->fieldspec[$key]['pkey']=='y' && String::ma_not_null($this->oracleSEQ)){
      				$this->curId=$value=$this->getSequence($this->oracleSEQ.'.NEXTVAL');
      				$this->populateInsertArray($key,$value,1);
      			} 
				else {
					
					if($this->fieldspec[$key]['type']=='date'){
						if($this->fieldspec[$key]['default_value']!='') {
							$value=$this->fieldspec[$key]['default_value'];
							$fType=1;
						}
						else {
						if($method=='i')$fType=2;
						else $fType=1;
						}
					}
					else {
						if($method=='i')$fType=2;
						else $fType=1;
					}
				   
					$this->populateInsertArray($key,$value,$fType);
			    };
      	  }
		  
		
		   if($method=='i')$this->insertItemArray($this->insertArray,0);
		   else $this->updateByArray($this->insertArray,0);
        }
	 }
	
	
	
	function updateByArray($params=array(),$debug=0){
   	  
	    $this->qUp="UPDATE ".$this->tablename." 
                        SET ";
        
		foreach($params  as $key => $value){
			if($key!=$this->primary_key[0]){
				// se il  campo esiste
				if(String::ma_not_null($this->fieldspec[$key])){
				   	$this->validateItem($key,$value);
					if($this->fieldspec[$key]['autoinsert']!='y')$arrayValues[]=$key."='".$value."'";
				}
			}
			elseif($key==$this->primary_key[0])$id=$value; 
		}
        
        $this->qUp.=implode(',',$arrayValues);        
        if($id)$this->qUp.=" WHERE ".$this->primary_key[0]." =$id";
		else $this->arrayError['required'][]=$this->primary_key[0];
	    
	    if($debug==1) echo $this->qUp;
		// se  non  ci  sono errori
		if(count($this->arrayError)<1) {
			$this->STH = $this->db->prepare($this->qUp);  
        	$this->STH->execute();
        	$this->rowCount=$this->STH->rowCount();
        	return  $this->rowCount;
		}
        
     }
	
	
	
	
	function validateItem($key,$valore=''){
	
   	   if($this->fieldspec[$key]['required']=='y' && !String::ma_not_null($valore)){
   	      	 $this->arrayError['required'][]=$key;
	   }
	   if($this->fieldspec[$key]['type']=='date'){
	   	
	   	   if(!date_time::isValidDate($valore,1))$this->arrayError['invalid'][]=$key.'-'.$this->fieldspec[$key]['errorMessage'];
	   }   
	   
    }
	


	function setJson($data){
	   if($data) {
			foreach ($data as $key => $value) {
			     
				 if($this->fieldspec[$key]['json']==1){
				 	$key=($this->fieldspec[$key]['jsonLabel'])?$this->fieldspec[$key]['jsonLabel']:$key;
				 	
				 	if($this->fieldspec[$key]['type']=='media') {
				 		
				 		$jsonData[$key]=DIR_WS_REPOSITORY.$this->fieldspec[$key]['pathSuffix'].'/'.$value;
						$fsPathMedia=DIR_FS_REPOSITORY.$this->fieldspec[$key]['pathSuffix'].'/';
						if (file_exists($fsPathMedia.$value)) {
    							$jsonData['mediaLastModified']=date ("Y-m-d", filemtime($fsPathMedia.$value));
						}
				 	}
					else $jsonData[$key]= $this->helperJsonArray($value,$key);		
				 	
				 }
			}
	    }
	    else $jsonData=$data;
		return $jsonData;
	}
	
	function setJsonArray($data){
	    $a=0;
		
		if($data) {
		  foreach($data as $d){
	    	
	    	foreach ($d as $key => $value) {
			       
				   
				 if($this->fieldspec[$key]['json']==1 or (is_array($this->jsonAddField) and in_array($key,$this->jsonAddField))){
				 	
					$key=($this->fieldspec[$key]['jsonLabel'])?$this->fieldspec[$key]['jsonLabel']:$key;
				 	
				 	if($this->fieldspec[$key]['type']=='media') {
				 		 
				 		if($this->fieldspec[$key]['pathSuffix']=='documenti') {
				 			$pathMedia=documenti::pathHandler('doc',$d->IdAzione,1);
							$fsPathMedia=documenti::pathHandler('doc',$d->IdAzione,0);
							
							$dataDoc=documenti::docCatHelper($d->IdAzione);
							$jsonData[$a]['marchio']=$dataDoc['marchio'];
							$jsonData[$a]['folder']=$dataDoc['folder'];
							$jsonData[$a][$key.'FullUrl']=$pathMedia.$value;
							//if (file_exists($fsPathMedia.$value)) {
    							//$jsonData[$a]['mediaLastModified']=date ("Y-m-d", filemtime($fsPathMedia.$value));
							//}
						
				 			$jsonData[$a][$key]=$value;
				 		}	
						else {
						  $fsPathMedia=DIR_FS_REPOSITORY.$this->fieldspec[$key]['pathSuffix'].'/';
						  
						  $jsonData[$a][$key]=DIR_WS_REPOSITORY.$this->fieldspec[$key]['pathSuffix'].$value;
						  if (file_exists($fsPathMedia.$value)) {
    							 $jsonData[$a]['mediaLastModified']=date ("Y-m-d", filemtime($fsPathMedia.$value));
						  }
						}
				 	}
					
					else $jsonData[$a][$key]= $this->helperJsonArray($value,$key);	
				 	
				 }
				
		    }
			 $a++;
			
			//echo "***************************<br>";
	    	}
	    }
        else $jsonData=$data;
		
		return $jsonData;
	}


    function  helperJsonArray($value,$type){
  
    	if($type=='Country'){
    		$value=nazioni::ma_getFastLabel('nazioni','dominio',$value,'Nazione');
			return  $value;
    	}
		else return  $value;
    }
}
