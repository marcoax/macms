<?php 
     $itemObjRem= new domini();
     $itemObjRem->sa='Valore';
    $itemObjRem->Order='Sort';
    $ObjReminder= new reminder();
   if($Id){
   	 
     $ObjReminder->getList($Id,$_SESSION['uid']);
	   $ObjReminder->Order='Id';
     $ObjReminder->getData();
	}
   if($ObjReminder->Data){
     
      foreach($ObjReminder->Data as $d){
      	   $reminderList.="<div class=\"controls controls-row\" id=\"IdRowReminder_".$d->Id."\">";
          $reminderList.=" <input type=\"text\" class=\"span1\" style=\"width:20px\" value=\"".stripslashes($d->Valore)."\" 
                               name=\"remValore[".$d->Id."]\" 
                               id=\"remValore_".$d->Id."\"
                               onchange=\"settaReminder('".$d->Id."',this);return false\">";
           
		   $reminderList.=" <select 
		                      name=\"remUnit[".$d->Id."]\"
		                      id=\"remiUnit_".$d->Id."\"
		                      class=\"span2\" 
		                      onchange=\"settaReminder('".$d->Id."',this);return false\">\n";
		        $reminderList.=$itemObjRem->_ma_combo_p(stripslashes($d->Unit),'tiporeminder');
           $reminderList.="</select>\n";
		  $reminderList.="&nbsp;&nbsp;<a href=\"#\" onclick=\"removeReminderFromList('".$d->Id."');return false\"> X </a>\n";
          $reminderList.="</div>";
      
      }
     
    }
    else $reminderList=MSG_NO_REMINDER;
?>




