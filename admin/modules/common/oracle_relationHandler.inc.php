<tr><td colspan=3>
<div id="realationBox">

  <?php echo $objForm->createForm($objSez,$mainTab);?> 



<div id="sub_header_<?php echo  $dl->a?>" class="utilityTools">
   <a href="#" onclick='$("sub_box_<?php echo  $dl->a?>").toggle(); return false'  class="acco_box"> <h3 class="title_<?php echo  $dl->a?>"><?php echo  CL_RELATION?></h3></a>  
</div>
<div id="sub_box_<?php echo  $dl->a?>" class="sub_box" style="sdisplay:none">
   <table sclass="tableForma">
   	<?
	    $i=1;
		$itemNum='';
	    foreach ($objSez->fieldspec as $chiave => $valore) {
	   	if($valore['lang']==1){
			$langTab=TABLE_SP_CATEGORYTREE_DESCRIZIONI;
			$langIdPage=($objSez->Data->Dominio)?$objSez->Data->Dominio:$Id_sez;
			$langField=$chiave;
			$langLabel=$valore['label'];
			$itemNum=(!$itemNum)?1:(int)$ObjLang->nLang*$i;
	    	$langObj= new HTMLLingueOra();
        	if($mode!='edit')$langObj->setWhere('Disable',0);
        	if($valore['type']=='text')$langObj->TetxAreaSize=' style="width:'.((int)$valore['size']-10).'px;height:'.((int)$valore['h']-50).'px" ';
			else $langObj->setFieldType('input');
        	$langObj->getLista(1);
			echo $langObj->createNote($valore['extraMsg']);
			echo $langObj->createHTML($langTab,$Id,$langField,$itemNum,$langIdPage,$dl->a,$langLabel);
		$i++;
		}
    }
	?>
  </table>
</div>
</div>
</td>
</tr>