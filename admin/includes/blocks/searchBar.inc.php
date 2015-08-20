<?php   $dObjStatoDoc= new dominio();  $dObjStatoDoc->sa='Valore';  $dObjTipoDoc= new dominio();  $dObjTipoDoc->sa='Valore';?><div class="subnav mb5" id="toolbar_cerca" >
<?php if(!in_array('nolibera',$searchToolbar) &&$searchfields==1):?> 
  <?php if(in_array('statodocumenti',$searchToolbar)):?> 
    <select name="IdStato" class="span2 form-inverse select-searchbar" onchange="document.forms[0].page.value=1;document.forms[0].Id.value='';document.forms[0].submit();return false">
    <option value=''><?php echo CL_STATO_SACADENZE?></option>
    <?php echo $dObjStatoDoc->_ma_combo_p(ma_getParameter("IdStato"),'statoscadenze');?>
    </select>
  <?php endif?>
	<?php if(in_array('data',$searchToolbar)):?>
		<input type="text" style="visibility:hidden;width:1px;float:left">
		<div class="form-group">
			<span class="add-on form-inverse input-searchbar"><?php echo  CL_FROM?></span>
			<input type="text" size="15" name="DataFrom" id="date-froms"  placeholder="" class="form-control" value="<?php echo $_REQUEST['DataFrom']?>"/>
		</div>
		<div class="form-group">
			<span class="add-on form-inverse input-searchbar"><?php echo  CL_AL?></span>
			<input type="text" size="15" name="DataTo" id="date-to" value="<?php echo $_REQUEST['DataTo']?>"  placeholder="" class="form-control" value="<?php echo $_REQUEST['DataFrom']?>"/>
		</div>
	<?php endif?>
	<?php if(in_array('tag',$searchToolbar)):?> 		<div class="form-group"> 
			<input type="text" size="15" name="<?php echo $mainTab?>.Tag" id="<?php echo $mainTab?>.Tag" class="form-control" value="<?php echo ma_getParameter($mainTab.'_Tag')?>">
		</div>	<?php endif?>     
	<div class="form-group">
		<input type="text" size="15" name="parola" id="parolaRicerca" placeholder="<?php echo  $searchMsg?>" class="form-control" value="<?php echo $parolaRicerca?>">
	</div>
	<a href="#" class="btn btn-primary btn-full" onClick="document.forms[0].page.value=1;document.forms[0].Id.value='';document.forms[0].submit();return false"><?php echo CL_FIND?></a><span style="visibility:hidden">.</span>
<?php endif?>         
</div>