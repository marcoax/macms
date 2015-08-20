<?php
  $dObjCat= new categorytree();  
  $dObjCat->debug=0;  
  //$dObjCat->setCurId($objSez->Data->IdCategory);  $HTMLParent=$dObjCat->_ma_combo_parent($objSez->Data->IdCategory,'','',"ct.IdParent,ct.Label");  ?>
<div class="form-group">
  <label><?php echo  $this->valore['label']?></label>
  	  <select name="<?php echo  $mainTab?>.<?php echo  $this->formElement?><?php if($this->valore['multiple']):?>[]<?php endif?>"
  	   	 	id="<?php echo  $mainTab?>.<?php echo  $this->formElement?>"    
  	   	 	class="form-control <?php echo  $this->valore['cssClass']?>"          
			style="width:<?php echo  $this->valore['size']?>px; 		
  	   	 	<?php if($this->valore['multiple']):?>height:<?php echo  $this->valore['h']?>px 
  	   	 	<?php endif?>"
  	   	 	<?php if($this->valore['multiple']):?>multiple="<?php echo  $this->valore['multiple']?>"<?php endif?>>          
  	   	 	<?php if ($Id_sub==''):?><option value=''><?php echo MSG_SELECT?></option><?php endif?>
  	   	 	<?php echo $HTMLParent?>    
  	 </select>

</div>