<div class="form-group">
	
	<span id="span-PwdCambia" class="control-group">
		<label for="PwdCambia">
			<span id="txt-PwdCambia"><?php echo CL_PWD?></span><span id="_extraMsg" class="help-inline small">(<?php echo  CL_PWD_FILL_ONLY?>)</span> 
		 </label> 
		<input type="text" name="<?php echo $mainTab?>.PwdCambia" value=""  class="form-control"/>
       
     </span>
     <span id="span-PwdConferma" class="control-group">
     	<label for="PwdConferma" >
     		<span id="txtPwdConferma"><?php echo CL_PWD_COMFERMA?></span>
            
        </label>
        <input type="text" name="<?php echo $mainTab?>.PwdConferma" value=""  class="form-control"/>
     </span>
     <input type="hidden" name="<?php echo $mainTab?>.Pwd" value="<?php echo $objSez->Data->Pwd?>"  />
</div>



