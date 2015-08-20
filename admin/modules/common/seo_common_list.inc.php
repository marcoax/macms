<?
foreach ($objSez->fieldspec as $chiave => $valore) {
	    	if(SEO_ENABLED==1) {
	    		if($valore['seo']==1){
	    			$langTab=TABLE_CATEGORYTREE_DESCRIZIONI;
	    			if($writeSeo==1){
	    				echo $seoTitle="<tr><td colspan=\"2\"><h3 class=\"title_".$dl->a."\">".SEO_TAGS."</h3></td></tr>";
	    				$writeSeo=0;
	    				 
	    			}
	    			$langIdPage=($objSez->Data->Dominio)?$objSez->Data->Dominio:$Id_sez;
	    			$langField=$chiave;
	    			$langLabel=$valore['label'];
	    			$itemNum=(!$itemNum)?1:(int)$ObjLang->nLang*$i;
	    			$langObj= new HTMLLingue();
	    			$langObj->cssStyle=$valore['cssClass'];
	    			$langObj->showCount=$valore['showCount'];
	    			if($mode!='edit')$langObj->setWhere('Disable',0);
	    			if($valore['type']=='text')$langObj->TetxAreaSize=' style="width:'.((int)$valore['size']-10).'px;height:'.((int)$valore['h']-50).'px" ';
	    			else $langObj->setFieldType('input');
	    			$langObj->getQuery();
	    			$langObj->extraMsg=$valore['extraMsg'];
	    			echo $langObj->createHTML($langTab,$Id,$langField,$itemNum,$langIdPage,$dl->a,$langLabel);
	    			$i++;
	    		}
		}
    }
?>