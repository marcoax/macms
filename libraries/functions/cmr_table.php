<?php
  $ele="";
   if(!empty($datas)){    //$colcount = $db->get_col_info_by_query($stmtTable);    
    if(DB_TYPE=='oracle'){
    	 $db->get_results("ALTER SESSION SET NLS_DATE_FORMAT = 'DD-MM-YYYY'");
         $datas = $db->get_results( $query );
      	 $listaColonne=$db->get_col_info("name");
		 $tipoColonna=$db->get_col_info("type");
	} 
	else {
		//echo $query;
	 	$stmtTable = $DBH->query($query);
        $datas = $stmtTable->fetchAll(PDO::FETCH_OBJ);
		$listaColonne=$db->get_col_info_by_query($stmtTable,"name");
	  	$tipoColonna=$db->get_col_info_by_query($stmtTable,"native_type");
	}
	
		$ele.='<div class="table-responsive"><table class="table table-striped table-bordered table-condensed table-hover table-shadow" id="list_'.$Id_sez.'">';    $ele.="\n";	$ele.="<thead>\n";    $ele.="<tr>\n";	if($selbox=="1"){       $ele.='<th  Title="'.CL_SELEZIONA.'" class="cktd">';       //$ele.="<input type=\"checkbox\" value=\"".$Id."\" id=\"list_".$Id."\" name=\"list[".$Id."]\" class=\"checkbox\"/>\n";       $ele.="</th>\n";    }
	
	
    
    if(is_array($fieldLabel)){
           $z=0;		   foreach ($fieldLabel  as $colName ){              if(is_array($hiddenField) && in_array($colName,$hiddenField)){                 $ele.= '<th  style="display:none">'.$colName.'</th>';              }              else {			    $orderCol=$listaColonne[$z];			    $imgOrder="";                $ordertype="ASC";                if($_GET['orderby']==$orderCol  && $_GET['ordertype']=="ASC"){                  $ordertype="DESC";                  $imgOrder=' <img src="'.DIR_WS_CMS_IMAGES.'fre_desc.gif"  border="0">';	
                }
                else if($_GET['orderby']==$orderCol && $_GET['ordertype']=="DESC"){                $ordertype="ASC";                $imgOrder=' <img src="'.DIR_WS_CMS_IMAGES.'fre_asc.gif"  border="0">';                }
			    else if($orderCol==$defaultOrder && !String::ma_not_null($_GET['orderby'])){				 $ordertype=$defaultOrderType;                 $imgOrder=' <img src="'.DIR_WS_CMS_IMAGES.'fre_'.strtolower(trim($ordertype)).'.gif"  border="0">';				}
				
				if(ma_get_page()==FILENAME_LISTA)$strpercorso="<a href=\"".$_SERVER['PHP_SELF']."?".$p->perc."orderby=".$orderCol."&amp;ordertype=".$ordertype."&amp;page=".$curPageN."\" title=\"order by \" class=\"sort\">";                $ele.= '<th  nowrap>'.$strpercorso.''.$colName.''.$imgOrder.'</a></td>'; 
			  }
              $ele.="\n";
			  $z++;
           }
	  
      }
     else {
        foreach ($listaColonne  as $colName ){              // create  the   url  link             if(ma_get_page()==FILENAME_LISTA) $strpercorso="<a href=\"".$_SERVER['PHP_SELF']."?".$p->perc."orderby=".$colName."&amp;ordertype=".$ordertype." &amp;page=".$curPageN."\" title=\"order by \" class=\"pager\">";              if(is_array($hiddenField) && in_array($colName,$hiddenField)){               $ele.= '<td  style="display:none">'.$strpercorso.''.$colName.'</a></td>';              }
              else {
                $imgOrder="";
                $ordertype="ASC";
                if($_GET['orderby']==$colName  && $_GET['ordertype']=="ASC"){
                  $ordertype="DESC";
                  $imgOrder=' <img src="'.DIR_WS_CMS_IMAGES.'fre_desc.gif"  border="0">';
                }
                else if($_GET['orderby']==$colName  && $_GET['ordertype']=="DESC"){
                $ordertype="ASC";
                $imgOrder=' <img src="'.DIR_WS_CMS_IMAGES.'fre_asc.gif"  border="0">';
                }
                $strpercorso="<a href=\"".$_SERVER['PHP_SELF']."?".$p->perc."orderby=".$colName."&amp;ordertype=".$ordertype."&amp;page=".$curPageN."\" title=\"order by \" class=\"sort\">";

                $ele.= '<th  nowrap>'.$strpercorso.''.$colName.''.$imgOrder.'</a></td>';
              }
              $ele.="\n";
          }
    }    if($configDoc==1)  $ele.='<th Title="'.MSG_CONFIGURA_PDF.'" style="text-align:center" class="col-sm-1">'.substr(MSG_CONFIGURA_PDF,0,4).'.</th>';
    if($editButt==1)  $ele.='<th Title="'.MSG_HELP_MODIFY.'" style="text-align:center" class="col-sm-1">'.substr(MSG_HELP_MODIFY,0,100).'</th>';	if($view=="1")$ele.='<th  Title="'.MSG_HELP_VIEW.'" style="text-align:center" class="col-sm-1">'.substr(MSG_HELP_VIEW,0,100).'</th>';	else if(String::ma_not_null($view))$ele.='<th  Title="'.MSG_HELP_VIEW.'" class="col-sm-1">'.$view.'</th>';    if($copyButton==1)$ele.='<th style="text-align:center" class="col-sm-1">'.MSG_HELP_COPY.'</th>';	if($inviaButton==1)  $ele.='<th >Send</th>';	if($delButton==1)$ele.='<th Title="'.MSG_HELP_DELETE.'" style="text-align:center" class="col-sm-1">'.substr(MSG_HELP_DELETE,0,100).'</th>';    if($listShowHide==1)$ele.='<th class="showHide" nowrap="1"><a href="#" title="">'.MSG_CHIUDI_LISTA.'</a></th>';
	$ele.="\n</tr>\n";  $ele.="</thead>\n";
	//$isEventList=in_array('Day',$db->get_col_info("name"));
	// creo dati
	$a=0;
   
	$ele.="<tbody>\n";

    // prepara lo span per gestire tabella
    if(is_array($tdspan)){
        $xc=0;    
        foreach ( $tdspan as $span){
        $tdspan[$xc] = $span;
        $xc = $xc + 1;
        }
    }
    if($datas) {
	foreach ( $datas as $data )	{        $i=0;		$rowCol=($a%2)?"rowD":"rowP";		$ele.="\n<tr class=\"".$rowCol."\">\n";	    foreach ($listaColonne as $colName){
           $short=false;           $tdwrap=($tipoColonna[$i]=='date' || $tipoColonna[$i]=='stringa'  )?"nowrap":'';           if($i==0)$Id=$data->$colName;           /**************** modifica  per  ricerca avanzata ***************/           $sezione=($Id_sez=='ricerca')?$data->t:$Id_sez;           //inizio  tools
           //view            if($selbox=="1" && $i==0){                $ele.='<td  Title="'.CL_SELEZIONA.'"  class="cktd">';                $ele.="<input type=\"checkbox\" value=\"".$Id."\" id=\"list_".$Id."\" name=\"list[".$Id."]\" class=\"checkbox\"/>\n";                $ele.="</td>\n";            }
           $ele.="\n";            if(is_array($hiddenField) && in_array($colName,$hiddenField)){              $ele.= '<td style="display:none">';           }           else $ele.= '<td class="'.$tdspan[$i].'" '.$tdwrap.'>';

           if(is_array($campiSpeciali) && in_array($colName,$campiSpeciali) && ma_get_page()!='home'){               if(is_array($shortField) && in_array($colName,$shortField)) {               $short=true;               }               $ele.=editaColonna($data->$colName,$colName,$Id,$tipoColonna[$i],'text',$tdspan[$i]);
           }           else if(is_array($ckField) && in_array($colName,$ckField)){               $ele.=editaCk($data->$colName,$colName,$Id);           }           elseif(is_array($comboSpeciali) && in_array($colName,$comboSpeciali) && ma_get_page()!='home'){
           	               $ele.=editaCombo($data->$colName,$colName,$Id);           }           elseif (is_array($hiddenField) && in_array($colName,$hiddenField)){               $ele.=editaColonna($data->$colName,$colName,$Id,$tipoColonna[$i],'text',$tdspan[$i]);           }            elseif (is_array($imgField) && in_array($colName,$imgField)){               $ele.=mediaColonna($data->$colName,$colName,$Id,$tipoColonna[$i],'img',$extraPath);           }  
           elseif (is_array($docField) && in_array($colName,$docField)){
             $ele.=docColonna($data->$colName,$colName,$Id,$tipoColonna[$i],'doc',$data->Title);
           }
           elseif (is_array($fieldView) && in_array($colName,$fieldView)){
             
             $modalHtml=ma_helper_Modal(500);	
             $viewUrl=DIR_WS_CMS.FILENAME_VIEW.'.php?mode=view&amp;Id_sez='.$sezione.'&amp;Id_sub='.$Id_sub.'&amp;Id='.$Id.'&modal=1';
        
             $editLink=(is_file($Id_sez.'.php') && String::ma_not_null($Id_sez))?$Id_sez:'edit';

             if ($colName == 'ActivitiesData') {
             $ele.='<a href="'.$viewUrl.'"  '.$modalHtml.'><ol style="margin-bottom:0px">';
             $allDeadlinesData = stripslashes($data->$colName);

             $allDeadlines = explode('?',$allDeadlinesData);
             $i = 0;
             foreach($allDeadlines as $eachDeadline) {
                $deadlineData = explode('|',$eachDeadline);
                $x=0;
                foreach($complexFields as &$eacharray) { // per ogni scadenza genera la tabella ed i campi nascosti per calcolo automatico
                $component[$x]='';
                    if ($eacharray['show'] == '1' || $eacharray['show'] == '3') { // se il campo deve essere visualizzato, aggiunge alla string (in pratica solo attività)
                    // $eacharray['idResult']
                    $component[$x].= $deadlineData[$x];
                    } elseif ($eacharray['show'] == '2') {
                        $component[$x].= $eacharray[$deadlineData[$x]];
                    }
                $x++;
                }
             $details= '<li>'.$component[0].', '.$component[2].' '.strtolower($component[1]).' '.strtolower($component[3]).' ('.$component[4].');</li>';
             $ele.=$details;
             $i++;
             }
             $ele.='</ol></a>';
             } else {
             $ele.='<a href="'.$viewUrl.'"  '.$modalHtml.'>'.stripslashes($data->$colName).'</a>';             
             }
           }
           elseif (is_array($fieldEdit) && in_array($colName,$fieldEdit)){
                          $editLink=(is_file($Id_sez.'.php') && String::ma_not_null($Id_sez))?$Id_sez:'edit';             $ele.= '<a href="'.DIR_WS_CMS.$editLink.'.php?mode=edit&amp;Id_sez='.$sezione.'&amp;Id_sub='.$Id_sub.'&amp;Id='.$Id.'"  title="'.MSG_HELP_MODIFY.'">'.stripslashes($data->$colName).'</a>';          }
           else {$ele.=gestischiTipoColonna($data->$colName,$colName,$Id);}
               
	  $ele.='</td>';
       $i++;
	}     
	 
	 if($configDoc=="1"){
	 	    $viewUrl=DIR_WS_CMS.FILENAME_VIEW.'.php?mode=view&amp;Id_sez='.$sezione.'&amp;Id_sub='.$Id_sub.'&amp;Id='.$Id;
            $ele.= '<td class="col-sm-1 centered">';
	        $ele.= '<a href="'.$viewUrl.'" class="btn btn-sm btn-inverse" title="'.MSG_CONFIGURA_PDF.'" '.$modalHtml.'> <i class="icon-cog icon-white"></i> PDF conf. </a>';
            $ele.= '</td>';
            $ele.="\n";
	 }

      if($editButt==1){
       
        // verifico  se  esiste un  file  per  l'edit '
        $editLink=(is_file($Id_sez.'.php') && String::ma_not_null($Id_sez))?$Id_sez:'edit';
        // modifica
        $ele.= '<td style="text-align:center" class="col-sm-1">';
    	$ele.= '<a href="'.DIR_WS_CMS.$subEdit.$editLink.'.php?mode=edit&amp;Id_sez='.$sezione.'&amp;Id_sub='.$Id_sub.'&amp;Id='.$Id.$addAna.'"  title="'.MSG_HELP_MODIFY.'" class="btn btn-sm btn-primary">'.boostrapHtml::createFaButton('fa-copy').' '.MSG_HELP_MODIFY.'</a>';
        $ele.= '</td>';
        $ele.="\n";
    }
 
	 if($view=="1"){
	 	     if($viewModal){
	 	     	$modalHtml=ma_helper_Modal(500);
				$viewUrl=DIR_WS_CMS.FILENAME_VIEW.'.php?mode=view&amp;Id_sez='.$sezione.'&amp;Id_sub='.$Id_sub.'&amp;Id='.$Id.'&modal=1';
			 }
			 else {
			 	$viewUrl=DIR_WS_CMS.FILENAME_VIEW.'.php?mode=view&amp;Id_sez='.$sezione.'&amp;Id_sub='.$Id_sub.'&amp;Id='.$Id;
			 }
			 $ele.= '<td class="col-sm-1">';

			 
	         $ele.= '<a href="'.$viewUrl.'" class="btn btn-sm btn-success" title="'.MSG_HELP_VIEW.'" '.$modalHtml.'> <i class="icon-eye-open icon-white"></i> '.MSG_HELP_VIEW.' </a>';
	         $ele.= '</td>';
             $ele.="\n";
	}
	else if(String::ma_not_null($view)){
	 	     if($viewModal){
	 	     	$modalHtml=ma_helper_Modal(500);
				$viewUrl=DIR_WS_CMS.FILENAME_MODAL;
			 }
			 else {
			 	$viewUrl=DIR_WS_CMS.FILENAME_VIEW;
			 }
			 $ele.= '<td class="col-sm-1">';

			 
	         $ele.= '<a href="'.$viewUrl.'.php?mode=view&amp;Id_sez='.$sezione.'&amp;Id_sub='.$Id_sub.'&amp;Id='.$Id.'" class="btn primary" title="'.MSG_HELP_VIEW.'" '.$modalHtml.'><i class="icon-edit icon-white"></i>'.MSG_HELP_VIEW.'</a>';
	         $ele.= '</td>';
             $ele.="\n";
	}
    /* fine modifica*/
    if($copyButton==1){
        
        $ele.= '<td style="text-align:center" class="col-sm-1">';
        $ele.= '<a href="'.DIR_WS_CMS.'edit.php?mode=copia&amp;Id_sez='.$sezione.'&amp;Id_sub='.$Id_sub.'&amp;Id='.$Id.'" class="btn btn-sm btn-primary">&nbsp;'.boostrapHtml::createFaButton('fa-copy').' '.MSG_HELP_COPY.'</a>';
        $ele.= '</td>';
		
        $ele.="\n";
    }
	 if($delButton==1)$ele.='<td style="text-align:center" class="col-sm-1"><a href="#"  onclick="delItem(\''.$Id.'\');return false"  title="'.MSG_HELP_DELETE.'" class="btn btn-sm  btn-danger">'.boostrapHtml::createFaButton('fa-trash').' '.MSG_HELP_DELETE.'</a></td>';
 
	if($listShowHide==1)$ele.='<td></td>';

	$ele.="</tr>\n";
	$a++;
  }
  $ele.="</tbody>\n";
  $ele.='</table></div>';
}
else  {
  $msgNoItem=(defined('MSG_NO_'.strtoupper($Id_sez)))?constant('MSG_NO_'.strtoupper($Id_sez)):MSG_NOITEM;
  $ele='<center><br><br><div align="center" class="msgbox" ><font color="Red"><b>'.$msgNoItem.'</b></font><br></div></center><br>';
}
}
?>