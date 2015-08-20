<?php

 include(DIR_FS_CMS_MODULES."common/reminder_userListHandler.inc.php");
?>
<div id="reminderBox">
<h3 class="separatoreTop"><?php echo  CL_REMINDER?></h3>
</div>

<h3></h3>
<div id="reminderBoxList">
	
	<?php echo  $reminderList?>
</div>
<div id="reminderBox">
	<ul class="nav nav-list">
	<li><a href="#" onclick="addReminder('addReminder','reminderBoxList','<?php echo  $_SESSION['uid']?>');"/><i class="icon-plus"></i> <?php echo  MSG_HELP_ADD_REMINDER?></a></li>
    </ul>
</div>
