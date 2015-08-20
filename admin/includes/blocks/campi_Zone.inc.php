<?php  // global $Id_sez;  $ObjRegioni= new regioni();?>
<tr>  
	<td  align="right" class="txtsmall"><b><?php echo  $this->valore['label']?></b></td>  
	<td colspan="5"  class="txtsmall">   
		<select name="<?php echo  $mainTab?>.<?php echo  $this->formElement?>"              
			id="<?php echo  $mainTab?>.<?php echo  $this->formElement?>"           
			style="width:<?php echo  $this->valore['size']?>px">           
			<?php if($this->valore['hideSelectNull']!=1):?><option value='1000'><?php echo MSG_SELECT?></option><?php endif?>           
				<!-- estraggo solo le provincie italiane -->           
			<?php echo  $ObjRegioni->_ma_combo_d($objSez->Data->IdRegione,'IdCountry=50')?>
		</select>
		</td>
</tr>

