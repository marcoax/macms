   <?php echo  CL_ALLEGATO."<br>".sprintf(MSG_HELP_MAX_FILE_SIZE,' 2 Mb')?>
   <div class="form-group">
   	   <label><?php echo  CL_TITLE?></label>
       <input type="text" name="myDocTitle"  id="myDocTitle" value="" class="form-control" />
   </div>
   <?php if($dObjLingue->nLang>1):?>
   <div class="form-group">
   	  <label><?php echo  CL_LANG?></label>
   	  <select id="myDocLang" name="myDocLang" class="form-control">
   	  	 <option value=''><?php echo MSG_SELECT?></option>		
   	  	 <?php echo $dObjLingue->_ma_combo_d($objSez->Data->Lang,$whereAdd);?>
   	  </select>
   </div>
   <?php endif?>
   <div class="form-groups">
	<label><?php echo  CL_FILE?></label><br>	
	<input type="hidden" name="MAX_FILE_SIZE" value="10000000"/>
	<input type="hidden" name="docType" value="doc"/>	
	<input type="file"  id="myDocFile" name="myDocFile"/>	
	<div class="mv15 form-inline">       
		<input type="text" name="myDocSort"  id="myDocSort" value="" class="small-input full-xs"/> 
		<label><?php echo  CL_SORT?></label>    
	</div>	
	<a  href="#" class="btn btn-primary btn-block" onclick="<?php echo $saveJs?>"> <?php echo boostrapHtml::createFaButton('fa-save')?> <?php echo  MSG_HELP_SAVE?> </a> 	 
   </div>
