<?php
   include(DIR_FS_CMS_MODULES."common/userListHandler.inc.php");
?>
<hr/>
<h3>Users</h3> 
<div class="boxContainer">
	
	<?php if( $msgWarning && $mode=='up'):?>
		<div id="msgBoxContainerWarning" class="alert alert-info big">
			<a class="close " data-dismiss="alert" href="#">×</a>
			<?php echo  $msgWarning?>
	    </div>    
    <?php else :?>
	<button class="btn" id="addAllButton" type="button"  onclick="addItemToAllUser('simpleList','<?php echo  $Id?>');return false " class="nero" data-loading-text="....wait I'm adding users to this folder"> <i class="icon-user"></i> <?php echo MSG_ADD_ALL_USER?> .....</button>	
	<hr/>
	<div id="shareAddBox" >
	   	<div class="input-append">
	   		<input class="span3" name="shareUser" id="shareUser" placeholder="<?php echo MSG_HELP_INSERISCI_USER?>" size="16" type="text">
	    	<button class="btn"  type="button" onclick="addItemToUser('simpleList','<?php echo  $Id?>');return false " data-loading-text=".wait." id="addButton"><?php  echo CL_ADD?></button>
		</div>
		<input class="span3" name="shareUserList" id="shareUserList" type="hidden">
	</div>
	<ul class="simpleList" ><?php if($mode!="up")echo $userList?></ul>	  
    <?php endif ?> 
</div>