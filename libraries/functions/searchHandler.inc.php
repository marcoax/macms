<?php
$showList=1;
//se   sono nella  pagina della   ricerca
if($Id_sez=='ricerca'){
	$objRicerca= new ricerca;
	$sezione=ma_getParameter('sezione');
	if(ma_hasParameter('field'))$field=implode(',',ma_getParameter('field'));
	$objRicerca->setparolaRicerca($parolaRicerca);
	$objRicerca->setselectCerca($field);
	$objRicerca->setTable($sezione);
	$objRicerca->setSelect($select);
	$objRicerca->setWhere($where);
	$objRicerca->createQuery();
	/*
	$tabella="(select Id as Id,'azioni' as t,lastModified as d,Title as b  from azioni where Title like '%".$parolaRicerca."%')
               union
              (select Id as Id,'eventi' as t ,lastModified as d, Title as b  from eventi where Title like '%".$parolaRicerca."%')
              union
              (select IdDocumento as Id ,'documenti' as t,Data as d,Doc as b  from documenti where Doc like '%".$parolaRicerca."%')
   ";
   */
   $tabella=$objRicerca->query;
   $showList=$objRicerca->isSearch;
};
$invDate=new invDate(''); //init the date obj handler
// init the where  obj
// set Where
///  qui gestisco gli special  handlaer
$w= new Where;
$w->setWhere($where.$whereCurMont);// aggiunto curMont per liste eventi


//Area tematica
if(String::ma_not_null(ma_getParameter('IdAreaTematica'))){
    
    $whereTematica=" ta.IdDominio=".ma_getParameter('IdAreaTematica')." 
                  or at.IdDominio=".ma_getParameter('IdAreaTematica');
    $w->setOr($whereTematica);
}


if(String::ma_not_null(ma_getParameter('IdAttivita'))){
      $ActivityTree= new treeHTML();
      $ActivityTree->setData(TABLE_AZIONI,'tipoazioni');
      $ActivityTree->_ma_combo_parent('',ma_getParameter('IdAttivita'));
	  $ActivityTree->arrayTree[]=ma_getParameter('IdAttivita');// aggiungo anche l'attivita  di ricerca oltyre ai  figli  cosi non becco errori
      $w->setIN('az.Id',$ActivityTree->arrayTree);
}
//Regione
if(String::ma_not_null(ma_getParameter('IdRegione'))){
    
    if($Id_sez=='user'){
	   	$w->setEq('user.IdRegione',ma_getParameter('IdRegione'));
    }
    else {
		$whereTematica=" ra.IdDominio=".ma_getParameter('IdRegione')." 
                         or
                         az.IdRegione='-1' 
                         or 
                         azp.IdRegione='-1' 
                         or
                         ar.IdDominio=".ma_getParameter('IdRegione');
	    $w->setOr($whereTematica);
	}
    
}
//Data
if(String::ma_not_null(ma_getParameter('DataFrom'))){
   $searchDate=$invDate->invDate(ma_getParameter('DataFrom'));
   if($Id_sez=='azioni')$whereOr='(DATE_FORMAT(az.lastModified ,"%Y-%m-%d")="'.$searchDate.'" or DATE_FORMAT(az.dateCreation ,"%Y-%m-%d")="'.$searchDate.'")';
   elseif($Id_sez=='documenti')$whereOr='(DATE_FORMAT(m.lastModified ,"%Y-%m-%d")="'.$searchDate.'" or DATE_FORMAT(m.dateCreation ,"%Y-%m-%d")="'.$searchDate.'")';
   else $whereOr='(DATE_FORMAT(m.DateStart ,"%Y-%m-%d")="'.$searchDate.'")';
   
   
   if(String::ma_not_null(ma_getParameter('DataTo'))){
     $searchDateStop=$invDate->invDate(ma_getParameter('DataTo'));
	 if($Id_sez=='azioni')$whereOr=' (DATE_FORMAT(az.lastModified ,"%Y-%m-%d") BETWEEN "'.$searchDate.'" and "'.$searchDateStop.'") or (DATE_FORMAT(az.dateCreation ,"%Y-%m-%d") BETWEEN "'.$searchDate.'" and "'.$searchDateStop.'")';
     elseif($Id_sez=='documenti')$whereOr=' (DATE_FORMAT(m.lastModified ,"%Y-%m-%d") BETWEEN "'.$searchDate.'" and "'.$searchDateStop.'") or (DATE_FORMAT(m.dateCreation ,"%Y-%m-%d") BETWEEN "'.$searchDate.'" and "'.$searchDateStop.'")';
     else $whereOr=' (DATE_FORMAT(m.DateStart ,"%Y-%m-%d") BETWEEN "'.$searchDate.'"  and "'.$searchDateStop.'")';
	 
   }
   $w->setOr($whereOr);
}
 // tag
 //azione  level 4
if(String::ma_not_null(ma_getParameter($mainTab.'_Tag'))){
	$db->get_results("SELECT * FROM $mainTab limit 0,1");
    $dataCol=$db->get_col_info("name");
	$tabella.=" left join ".TABLE_TAG." as Tag on ".$mainTabSuffix.".".$dataCol[0]."=Tag.IdParent ";
    $w->setEq('Tag.Title',ma_getParameter($mainTab.'_Tag'));
}



if(String::ma_not_null(ma_getParameter($mainTab.'_Dominio'))){
    $w->setEq('Dominio',ma_getParameter($mainTab.'_Dominio'));
}



$where=$w->getWhere();

//$where=($_SESSION['whereList'] && ma_hasParameter('page'))?$_SESSION['whereList']:$where;
if($_SESSION['whereList']&& $_GET['page']>0 && ma_get_page()=='list') {
	$where=$_SESSION['whereList'];
	$tabella=$_SESSION['tableList'];
}
else {
  $_SESSION['whereList']=$where;
  $_SESSION['tableList']=$tabella;	
}
?>