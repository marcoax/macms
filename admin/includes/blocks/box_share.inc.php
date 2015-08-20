<div id="shareBox">
	
	<div id="errorBoxShare" class="alert alert-danger fade in hide">
    	  <button type="button" class="close" onclick="$('#errorBoxShare').hide()">x</button>
          <span id="errorBoxShareTxt">Email o  password  errate prego  riporvare</span>
    </div>
<h3 class="separatoreTop"><?php echo  CL_PAGE_TITLE_SHARE?></h3>
</div>

<h3></h3>

<div id="shareAddBox">
	<form name="share" id="share">
		<div class="input-append">
        <input class="span2" name="shareEmail" id="shareEmail" placeholder="<?php echo MSG_HELP_INSERISCI_EMAIL?>" size="16" type="text">
            <button class="btn"  type="button" onclick="validateShareRelation('shareEmail','<?php echo  $_SESSION['IdUser']?>');return false "><?php  echo CL_ADD?></button>
       </div>
		
	</form>
</div>

<div id="shareEmailList">
	<?
	 $objRel->dataRelation=relation::ma_getFastRelation('shareEmail',$_SESSION['IdUser']);
     echo ma_helper_list_relation ($objRel->dataRelation,1,1);
	?>
</div>
