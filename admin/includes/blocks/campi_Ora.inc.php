<?php
  global $objSez;

  $objSez->Data->DateStart=($objSez->Data->DateStart)?invDate::initInvDate($objSez->Data->DateStart):date('d-m-Y');
  
/*   old   30 minutes  code a
  $timeHtm='';
  $options = array(); 
  if($this->valore['oraType']=='full')$min30=array('00');
  else $min30=array('00','30');
  foreach (range(0,23) as $fullhour) {
        $parthour = $fullhour > 12 ? $fullhour - 12 : $fullhour;
		//echo $fullhour.":".$int."<br>";
        foreach($min30 as $int){
      			$selected=($this->data==$fullhour.":".$int.":00")?"selected":"";
				if($selected=='')$selected=($this->data=='0'.$fullhour.":".$int.":00")?"selected":"";
			 //echo $fullhour.":".$int."<br>";
            if($fullhour > 11){
                $options[$fullhour.".".$int]=$parthour.":".$int." PM";
				$timeHtm.="<option value='".$fullhour.":".$int."' $selected>".$parthour.":".$int." PM</option>\n";
            }else{
                if($fullhour == 0){$parthour='12';}
                $options[$fullhour.".".$int]=$parthour.":".$int." AM" ;
				$timeHtm.="<option value='".$fullhour.":".$int."' $selected>".$fullhour.":".$int." AM</option>\n";
            }
        }
   }
  
  */

 
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
	
	<span id="span-Datestart" class="control-group">
		<label for="Datestart" class="span2">
			<span id="txt-Datestart"><?php echo CL_DATE?></span><span id="_extraMsg" class="help-inline small">(<?php echo  CL_DATE_FORMAT?>)</span> 
		     <br><input type="text" name="<?php echo $mainTab?>.DateStart" value="<?php echo  $objSez->Data->DateStart?>"  class="span2  dp"/>
        </label>
     </span>
     <span id="span-Ora" class="control-group hidden">
     	<label for="PwdOra" class="span3">
     		<span id="txtPwdOra"><?php echo  $this->valore['label']?></span>
            <br> <select name="<?php echo  $mainTab?>.<?php echo  $this->formElement?><?php if($this->valore['multiple']):?>[]<?php endif?>"   
           id="<?php echo  $mainTab?>.<?php echo  $this->formElement?>"
           style="width:<?php echo  $this->valore['size']?>px; 
		   <?php if($this->valore['multiple']):?>height:<?php echo  $this->valore['h']?>px <?php endif?>"
		   <?php if($this->valore['multiple']):?>multiple="<?php echo  $this->valore['multiple']?>"<?php endif?>>
           <?php if($this->valore['hideSelectNull']!=1):?><option value=''><?php echo MSG_SELECT?></option><?php endif?>
           <?php echo  $timeHtmL?>
    </select>
        </label>
     </span>
     <input type="hidden" name="<?php echo $mainTab?>.Pwd" value="<?php echo $objSez->Data->Pwd?>"  />
</div>




