<div id="langBox">
<?php if(SEO_ENABLED==1):
 foreach($ObjLang->dataList as $dl){
?>
<?php if($ObjLang->nLang>1 && $dl->a==$objSez->Data->Lang):?>
<div id="sub_header_<?php echo  $dl->a?>" class="utilityTools">
   <a href="#" onclick='$("sub_box_<?php echo  $dl->a?>").toggle(); return false'  class="acco_box"> <h3 class="title_<?php echo  $dl->a?>"><?php echo  SEO_TAGS?></h3></a>  
</div>
<?php endif ?>
<div id="sub_box_<?php echo  $dl->a?>" class="sub_box" style="sdisplay:none">
   <table class="tableForma">
   	<?
   	$i=1;
   	$itemNum='';
   	$writeSeo=0;
   	include(DIR_FS_MODULES.'common/seo_common_list.inc.php');
	?>
  </table>
</div>
<?php 

}
endif ?>
</div>