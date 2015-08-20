<?php
// doc  lang  upload handler
$Azienda=($Azienda)?$Azienda:'smi';$objCont= new dominio();$objCont->debug=0;$objCont->_ma_combo_d('','tipoimmagine','no','dv.Label',$Azienda);$objCont->makeCombo('');

?>
<br>
<?php echo CL_IMAGE_UPLOAD." - ".MSG_HELP_MAX_FILE_SIZE?>
<br>
<?php if($dObjLingue->nLang>1 && $objSez->showImageLang==1):?>
<div class="form-group">
	<label><?php echo  CL_LANG?></label>
	<select id="myImgLang" name="myImgLang" class="form-control mid-input full-xs">
		<option value=''><?php echo MSG_SELECT?></option>
		<?php echo $dObjLingue->_ma_combo_d($objSez->Data->Lang,$whereAdd);?>
	</select>
</div>
<?php endif?>
<?php if( $objSez->showImageType==1):?>
<div class="form-group">
	<label><?php echo  CL_TIPO_IMMAGINE?></label>
	<select id="myImgType" name="myImgType" class="form-control mid-input full-xs">
		<option value=''><?php echo MSG_SELECT?></option>
		<?php echo  $objCont->w_cData?>
	</select>
</div>
<?php endif?>



<hr/>

<fieldset class="alert alert-info">
<input id="file_upload" name="file_upload" type="file" multiple="true">
<div>
	<div id="queue">oppure  trascina  qui i file da  caricare  solo formati png - gif - jpg  </div>
</div>
</fieldset>
<a style="position: relative; top: 8px;" href="javascript:$('#file_upload').uploadifive('upload')" class="btn btn-primary">
	<?php echo boostrapHtml::createFaButton('fa-download')?> <?php echo CL_UPLOAD_FILES?></a>
<hr/>









    
    
