<?php
  global  $Id_sub;
  $dObjCatParent= new articoli();
  $dObjCatParent->debug = 0;
  $dObjCatParent->TopOnly = ( $this->valore['TopOnly'] ) ? $this->valore['TopOnly'] : false;
  if($this->valore['disableDomain']!='')$dObjCatParent->Dominio='articoli';
  else if($this->valore['Domain']!="")  {
  		/*
  	$dObjCatParent->Dominio=$this->valore['Domain'];
  	$dObjParent= new articoli();
    $dObjParent->debug=1;
  	$dObjParent->ma_getByPageCode($dObjCatParent->Dominio);
  	$IdParentStart=($dObjParent->Data->Id)?$dObjParent->Data->Id:$this->valore['IdParentStart'];
  	$category='';
		 * */
   $dObjCatParent->Dominio=$this->valore['Domain'];
  }
  else  {
    $IdParentStart= ( $this->valore['IdParentStart'] )? $this->valore['IdParentStart'] :"";
  	$category     = ( $this->valore['category'] ) ? $this->valore['category'] : $Id_sub;
 
  }
  if($this->valore['disablePub']==1)$dObjCatParent->disablePub=1;
  if($this->valore['multiple']==1){
  	 $dataList=explode(',',$this->data);
	 $HTMLParent=$dObjCatParent->_ma_combo_parent($dataList,$IdParentStart,'Name','','intro',1,$category);
  }
   else  $HTMLParent=$dObjCatParent->_ma_combo_parent($this->data,$IdParentStart,'Name','','intro',1,$category);
?>
<div class="form-group">
  <label><?php echo  $this->valore['label']?></label>
   <select name="<?php echo  $mainTab?>.<?php echo  $this->formElement?><?php if($this->valore['multiple']):?>[]<?php endif?>"              
			id="<?php echo  $mainTab?>_<?php echo  $this->formElement?>" 
			class="form-control <?php echo  $this->valore['cssClass']?>"          
			style="wwidth:<?php echo  $this->valore['size']?>px; 			          
			<?php if($this->valore['multiple']):?>height:<?php echo  $this->valore['h']?>px <?php endif?>"
 		    <?php if($this->valore['multiple']):?>multiple="<?php echo  $this->valore['multiple']?>"<?php endif?>>
 		   	<?php if($this->valore['hideSelectNull']!=1):?><option value=''><?php echo MSG_SELECT?></option><?php endif?>
 			<?php echo  $HTMLParent?>
 	</select> 
    </label>
</div>