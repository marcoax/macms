<?php include(DIR_FS_CMS_MODULES."common/userTodoListHandler.inc.php");
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
      <button class="btn" id="addAllButton" type="button"  onclick="addActionToAllUser('simpleList','<?php echo  $Id?>','IdTodoList');return false " class="nero" data-loading-text="....wait I'm adding users to this list"> <i class="icon-user"></i> <?php echo MSG_ADD_ALL_USER_TODOLIST?> .....</button>	
<hr/>
<div id="shareAddBox" >
   <div class="input-append">
   <input class="span3" name="shareUser" id="shareUser" placeholder="<?php echo MSG_HELP_INSERISCI_USER_TODOLIST?>" size="16" type="text">
        <button class="btn"  type="button" onclick="addActionToUser('simpleList','<?php echo  $Id?>','IdTodoList');return false " data-loading-text=".wait." id="addButton"><?php  echo CL_ADD?></button>
       </div>
       <input class="span3" name="shareUserList" id="shareUserList" type="hidden">
        <input class="span3" name="IdUserActionType" id="IdUserActionType" type="hidden"   value="IdTodoList">
	

</div>
<ul class="simpleList" ><?php if($mode!="up")echo $userList?></ul>	
    
    <?php endif ?> 


</div>