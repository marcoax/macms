<?php    global $db;   //$objCountry= new GoogleMapLocalizelHelper($db);   //$objCountry->getCountryByIp($db);   $this->valore['default_value']=($objCountry->Data->country)?strtoupper($objCountry->Data->country):'IT';   $ObjNazione= new nazioni();   $objSez->Data->IdCountry=($objSez->Data->IdCountry)?$objSez->Data->IdCountry:$this->valore['default_value'];?><div class="form-group">	<label><?php echo  $this->valore['label']?></label>   <select name="<?php echo  $mainTab?>.<?php echo  $this->formElement?>"              id="<?php echo  $mainTab?>.<?php echo  $this->formElement?>"           class="form-control <?php echo  $this->valore['cssClass']?>"          		   style="width:<?php echo  $this->valore['size']?>px;" 		   >           <?php if($this->valore['hideSelectNull']!=1):?><option value='1000'><?php echo MSG_SELECT?></option><?php endif?>    <!-- estraggo solo le provincie italiane -->    <?php echo  $ObjNazione->_ma_combo_d($objSez->Data->IdCountry);?>  </select></div>