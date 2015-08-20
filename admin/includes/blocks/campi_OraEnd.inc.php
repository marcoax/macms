<?php
  global $objSez;

  $objSez->Data->DateStop=($objSez->Data->DateStop)?invDate::initInvDate($objSez->Data->DateStop):date('d-m-Y');
  


 
  for ($i = 0; $i <= 23; $i++){
 	 for ($j = 0; $j <= 55; $j+=5){
	    //inside the inner loop
	    $time=echo_datelist($i, $j, $day, $month, $year);
		$selected=($this->data==$time.":00")?"selected":"";
		$timeHtmL.="<option value='".$time."' $selected>".$time."</option>\n";
	  }
	  //inside the outer loop
}
?>
<div class="controls controls-row">
	
	<span id="span-DateStop" class="control-group">
		<label for="DateStop" class="span2">
			<span id="txt-Datestart"><?php echo CL_DATE_END?></span><span id="_extraMsg" class="help-inline small">(<?php echo  CL_DATE_FORMAT?>)</span> 
		     <br><input type="text" name="<?php echo $mainTab?>.DateStop" value="<?php echo  $objSez->Data->DateStop?>"  class="span2  dp"/>
        </label>
     </span>
     <span id="span-Ora hidden" class="control-group hidden">
     	<label for="PwdOra" class="span3">
     	<span id="txtPwdOra"><?php echo  $this->valore['label']?></span>
           <br> <select name="<?php echo  $mainTab?>.<?php echo  $this->formElement?><?php if($this->valore['multiple']):?>[]<?php endif?>"   
           id="<?php echo  $mainTab?>.<?php echo  $this->formElement?>"
           style="width:<?php echo  $this->valore['size']?>px; 
		   <?php if($this->valore['multiple']):?>height:<?php echo  $this->valore['h']?>px <?php endif?>				  "
		   <?php if($this->valore['multiple']):?>multiple="<?php echo  $this->valore['multiple']?>"<?php endif?>>
           <?php if($this->valore['hideSelectNull']!=1):?><option value=''><?php echo MSG_SELECT?></option><?php endif?>
           <?php echo  $timeHtmL?>
    </select>
        </label>
     </span>
    
</div>




