<?php 
// tabella   principale
$campiList='';
if($tabelleConf[$Id_sez]['comboField']){
}
if($tabelleConf[$Id_sez]['ckField']){
}
if($tabelleConf[$Id_sez]['hiddenField']){
if($tabelleConf[$Id_sez]['shortField'])$shortField=explode(',',$tabelleConf[$Id_sez]['shortField']);
if($tabelleConf[$Id_sez]['tdspan'])$tdspan=explode(',',$tabelleConf[$Id_sez]['tdspan']);
$or= new ordina;
	$tipoCol=$db->column_names;
    $dataToStore=($_POST)?$_POST:$_GET;
    //becco Id
    $campo=$data[0];
    $nItem=count($campiListInsert)-count($hiddenField);
    $primoField=$campiListInsert[0];

  if($nItem>0 && !empty($dataToStore[$primoField])){
          while (list($Item,$valore) = each($dataToStore[$primoField])){
               $curStringa='';
                 $i=1;
                foreach($campiListInsert as $f) {
                    $curKey=array_keys($data,trim($f));
                    $valore=$dataToStore[$f][$Item];
					//do nothing if is  and hidden field
					if(is_array($hiddenField))$isHidden=in_array($f,$hiddenField);
					if($f=='Id' || $f=='IdAna' || $isHidden){}
                    else {
					
                    if($tipoCol[$curKey[0]]=='date')$valore=invDate::invDate($valore);
                    else $valore=stripslashes(str_replace("'","''",trim($valore)));
                    $curStringa.=$f."='".$valore."'";
                    if($i<$nItem)$curStringa.=",";
					
                    }
                    $i++;
                }
                //echo "<br>";
				 
				$queryUp="Update ".$mainTab." SET ".$curStringa."  where ".$campo."=".$Item.";";
                 //echo "<br>".$f;
				if($saveButt==1)$db->execute($queryUp);
				
        }
    }
}

if($mode=="del"){
	$campo=$colNames[0];
	if(DELETE_MODE=='Disable'){
      $del_query="
          UPDATE
		     $mainTab
           SET Disable=1
		   WHERE
		   $campo='$Id'
	  ";
	}
	else {
       $del_query=" DELETE FROM $mainTab WHERE  $campo='$Id' ";
   }
   $db->execute($del_query);
    $actionTypeMode=ACTION_DELETE.'list';
}
// faccio  ricerca  solo  sui  campi settati  se  uso il fullTXT o no
if($mode=='cerca'){
  $cO= new cerca;
  
  $cO->setData($selectCerca,$where);
  if(String::ma_not_null($parolaRicerca))$cO->getQueryLike($parolaRicerca);
  $cO->getQuery();
  $where=$cO->w->getWhere();
}

if(!empty($groupByList)){
   $gb=  new groupBy;
   $groupByList=$gb->setGroup($groupByList);
}


if(class_exists ('Pager') && $showList==1) {
    //conto  guanti  sono i record
if($Id_sez!='ricerca') {
 $queryConta="
    SELECT
       count(*)
     From
       $tabella
     where
        $where
        
  ";
  
}
 else {
	$queryConta=" SELECT count(*) from (".$tabella.") as tabella";
	
}
  // micreo pure la stringa percorso
  $stringaPercorso="Id_sez=".$Id_sez."&Id_sub=".$Id_sub."&mode=".$mode."&limit=".$limit."&parola=".$parolaRicerca."&orderby=".$orderBy."&amp;ordertype=".$orderType.$query;
  $p = new Pager;
  $p->curpageStep();//setto  qunate pagina  devono essere visualizzate prima  della paggina  corrente
  $start = $p->findStart($limit);

  if($start<0)$start=0;
    $count = $db->countRows($queryConta);
    $pages = $p->findPages($count, $limit);
    $pagelist = $p->pageList($curPageN, $pages,$stringaPercorso);
    $limitPager="LIMIT $start,$limit";
}



// costruisco  la  select
// se   sono nei report mensili tolgo il limit
 if($Id_sez!='ricerca') {
 $query="
   SELECT
      $select
   From
      $tabella
   WHERE
      $where
	  $groupByList
      $sorta
      $limitPager
   ";
  }
  // mostra solo se impostato un parametro di ricerca 
else if($showList==1){
	$query="$tabella
	        $sorta
           $limitPager
";
	
}




//***********************  actionType handler  
//
if(ma_hasParameter('actionType') && ma_hasParameter('list')){
  $objAction= new commonQuery;
  $objAction->tab=$mainTab;
  $objAction->primary_key[]=$objAction->getPrimaryKey();
  if(ma_getParameter('actionType')=='status'){
    $objAction->curField='Pub';
	$objAction->actionType='update';
	$value=ma_getParameter($objAction->tab.'_Stato');
  }
  else if(ma_getParameter('actionType')=='deleteAll'){
    $objAction->curField='Disable';
	$objAction->actionType='delete';
	$value=1;
    $actionTypeMode=ACTION_DELETE;
  }
   else if(ma_getParameter('actionType')=='archiviaAll'){
    $objAction->curField='Pub';
	$objAction->actionType='update';
	$value=1;
    $actionTypeMode=ACTION_ARCHIVE;
  }
  else if(ma_getParameter('actionType')=='riattivaAll'){
    $objAction->curField='Pub';
	$objAction->actionType='update';
	$value=0;
    $actionTypeMode=ACTION_RIATTIVA;
  }
  else if(ma_getParameter('actionType')=='AssGruppo'){
    $objAction->curField='Disable';
	$objAction->actionType='insert';
	$value=ma_getParameter($objAction->tab.'_AssGruppo');
  }
  $objAction->actionHandler(ma_getParameter('list'),$value);
}


//  insert Item 
if(ma_hasParameter($mainTab.'_AddGruppo')){
  $objAddItem = new domini();
  $valore=ma_getParameter($mainTab.'_AddGruppo');
  $objAddItem->setDomain('gruppi');
  $objAddItem->addDomainItem($valore);
  $lastIdGruppo=$objAddItem->db->insert_id;
}