
 	<h3 class="borderBox"></h3>
 	<a href="#" onclick="$('#boxDocAjax').toggle(); return false" class="nounder">
 		<h3><span class="red">[+]</span> &nbsp;<?php echo  strtoupper(CL_TASK)?></h3>
 	</a>
 	<div id="boxTask">
 		<div class="input-append">	
 			<input class="span7" name="todolistTask" id="todolistTask" placeholder="<?php echo MSG_HELP_INSERISCI_TASK_TODOLIST?>" size="16" type="text">
            <button class="btn"  type="button" onclick="addTaskRelation('todolistTask','<?php echo  $Id?>','IdTodoList',true);return false " data-loading-text=".wait." id="addButton"><?php  echo CL_ADD?></button>
       </div>
 	</div>
 	<hr/>
 	<div id="todolistTaskList" class="row">
 	<?php 
 	   $objRel->dataRelation=relation::ma_getFastRelation('todolistTask',$Id);
       echo ma_helper_list_relation ($objRel->dataRelation,1,1,'sortable');
      	
 	?>
    </div>
