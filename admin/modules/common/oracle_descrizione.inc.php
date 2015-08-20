<div id="langBox">
<?php if($ObjLang->nLang>1):
   foreach($ObjLang->dataList as $dl){
?>
 <?php if($ObjLang->nLang>0):$classSub=' class="sub_box" '?>
  		<div id="sub_header_<?php echo  $dl->a?>" class="utilityTools">
     			<a href="#" onclick='$("#sub_box_<?php echo  $dl->a?>_<?php echo  $isModal?>").toggle(); return false'  class="acco_box">
     			<h3 class="title_<?php echo  $dl->a?>"><?php echo  $dl->b?></h3></a>
     		</div><?php endif ?>
     		<div id="sub_box_<?php echo  $dl->a?>_<?php echo  $isModal?>" <?php echo  $classSub?>  style="display:none">
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
			$langObj->cssStyle=$valore['cssClass'];
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
<?php 
}
endif ?>
</div>