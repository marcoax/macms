<?php 
   $itemObj= new combo;
   $itemObj->setInv();
   $itemObj->setMode(4);
   $w_itemObj=$itemObj->makeSimpleCombo('5,10,20,30,40,50,100',$limit,'stringa');
   $dObjStatoDoc= new domini();
?>
<?php if(ma_get_page()==FILENAME_LISTA && ma_get_page()!=FILENAME_CALENDARIO):?>
<div id="actiontoolbar" class="container row-fluid">
 <ul class="nav nav-pills mid">
  <?php if($selbox==1):?>
    <li > <a href="#"  id="delSel_<?php echo $Id_sez?>" class="objDelSel nero"> <i class="icon-trash icon-white"></i> <?php echo MSG_HELP_DELETE_SELECTED_ITEM?></a> </li>
    <?php endif?>
    <li class="menuItem">
  	 <?php echo MSG_ITEM_PER_PAGE?>:
     <select name="limit" class="input-mini" onchange="document.forms[0].submit();return false"><?php echo $w_itemObj?></select>
    </li>
  <ul>
</div>
<?php endif?>	
<?php if(is_array($actionToolbar) && ma_not_null($actionToolbar[0])):?>
<div id="associaBox" class="associa">
	<ul class="itemList">
	<?php if(in_array('associa',$actionToolbar)):?>
		<li><?php echo MSG_HELP_ASSOCIA?></li>
		<li><select name="<?php echo $mainTab?>.AssAzione"  Id="<?php echo $mainTab?>.AssAzione"   class="short" onchange="commonAction(this.value,'AssAzione');return false">
	<option value''><?php echo MSG_SELECT_AZIONE?></option>
   		 <?php echo $htmlParent?>
	 </select>
		</li>
		
	<?php endif?>
</div>
<?php endif?>
<?php if(!$isUser):?>
<div id="aggiungiItem" class="aggiungi">
 <ul class="itemList">
 <?php if(in_array('aggiungi',$actionToolbar)&&$addButton==1000):?>
  <li class="buttonSmall"><a href="<?php echo FILENAME_EDIT?>.php?Id_sez=<?php echo $Id_sez?>&Id_sub=<?php echo $Id_sub?>&mode=up" class="red">&nbsp;<?php echo MSG_HELP_ADDNUOVO?></a></li>
 <?php endif?>
  <?php if(in_array('aggiungimessaggio',$actionToolbar)&&$addButton==1):?>
  <li><a href="<?php echo FILENAME_EDIT?>.php?Id_sez=messaggi&Id_sub=<?php echo $Id_sub?>&mode=up"><span class="red">  &raquo;</span>&nbsp;<?php echo MSG_HELP_ADD_MESSAGGIO?></a></li>
 <?php endif?>
 <?php if(in_array('aggiungiEvento',$actionToolbar)&&$addButton==1):?>
  <li><a href="<?php echo FILENAME_EDIT?>.php?Id_sez=evento&Id_sub=<?php echo $Id_sub?>&mode=up"><span class="red">  &raquo;</span>&nbsp;<?php echo MSG_HELP_ADD_IMPEGNO?></a></li>
<?php endif?>
 <?php if(in_array('vaiEventoList',$actionToolbar)):?>
  <li><a href="<?php echo FILENAME_LISTA?>.php?Id_sez=evento&Id_sub=<?php echo $Id_sub?>"><span class="red">  &raquo;</span>&nbsp;<?php echo MSG_HELP_VAI_IMPEGNO_LISTA?></a></li>
<?php endif?>
 <?php if(in_array('aggiungiAccordo',$actionToolbar)&& ma_getParameter('isAdmin')):?>
  <li><a href="<?php echo FILENAME_EDIT?>.php?Id_sez=<?php echo $Id_sez?>&Id_sub=<?php echo ID_ACCORDO?>&mode=up"><span class="red">  &raquo;</span>&nbsp;<?php echo MSG_HELP_ADD_ACCORDO?></a></li>
 <?php endif?>
 <?php if(in_array('aggiungiIntervento',$actionToolbar) && ma_getParameter('isAdmin')):?>
  <li><a href="<?php echo FILENAME_EDIT?>.php?Id_sez=<?php echo $Id_sez?>&Id_sub=<?php echo ID_INTERVENTO?>&mode=up"><span class="red">  &raquo;</span>&nbsp;<?php echo MSG_HELP_ADD_INTERVENTO?></a></li> 
<?php endif?>
 <?php if(in_array('aggiungiAttivita',$actionToolbar) && ma_getParameter('isAdmin')):?>
  <li><a href="<?php echo FILENAME_EDIT?>.php?Id_sez=<?php echo $Id_sez?>&Id_sub=<?php echo ID_ATTIVITA?>&mode=up"><span class="red">  &raquo;</span>&nbsp;<?php echo MSG_HELP_ADD_ATTIVITA?></a></li>
<?php endif?>
 <?php if(in_array('aggiungiAzione',$actionToolbar)&&$addButton==1):?>
<?php endif?>
</div>
<?php endif?>