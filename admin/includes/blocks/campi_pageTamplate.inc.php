<?php $dObjStatoDoc= new template();?>
<div class="form-group">
	<label><?php echo  $this->valore['label']?></label>
	<select name="<?php echo  $mainTab?>.<?php echo  $this->formElement?>" 
		id="<?php echo  $mainTab?>.<?php echo  $this->formElement?>"  
		class="form-control"
		style="width:<?php echo  $this->valore['size']?>px;"
	>
	<?php if($this->valore['hideSelectNull']!=1):?>
		<option value='1000'><?php echo MSG_SELECT?></option>
	<?php endif?>
	<!-- estraggo solo le provincie italiane -->
	<?php echo  $dObjStatoDoc->_ma_combo_p($objSez->Data->Code,'template');?>
	</select>
</div>
