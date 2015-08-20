<?php
 ?>
<div class="controls controls-row"/><label class="<?php echo  $this->valore['cssClass']?>"><?php echo  $this->valore['label']?>
 <div id="<?php echo  $this->formElement?>Campo">
  <textarea type="text" 
     name="<?php echo  $mainTab?>.<?php echo  $this->formElement?>" 
     id="<?php echo  $mainTab?>.<?php echo  $this->formElement?>" class="campoNoeditor" 
	 style="width:<?php echo  $this->valore['size']?>px;height:<?php echo  $this->valore['h']?>px" ><?php echo $this->data?></textarea><br/>
   <?php echo  $this->valore['extraMsg']?>
  </div>
  </label>
 </div>