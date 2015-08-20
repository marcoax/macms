<?php
include_once("../config/configure.php");
include_once(DIR_FS_CMS_INCLUDES."common.inc.php");
?>
<body>
<!-- header -->
<?php include_once(DIR_FS_CMS_INCLUDES."header.inc.php");?>
<!-- container -->
<div class="container" id="boxContenuto" style="padding-bottom:50px;">
	<div class="row">
    	<div class="col-sm-12">
       		<ul class="breadcrumb mid">
	      	<?php echo  $titoloItem?>            	
            <li class="pull-right hidden">ultima modifica:<?php echo $invDate->invDateTime($objSez->Data->LASTMODIFIED)?>
	         <?php if($objSez->Data->lastUser>1):?> - <?php echo  user::getUserById($objSez->Data->lastUser)?><?php endif?>
	        </li>
         	</ul>
         	
   		</div>
   </div><!--/row header page-->
   <div class="row">
    
	    <?php if(file_exists(DIR_FS_CMS_INCLUDES."/template_".$objPage->Template.".inc.php"))include_once(DIR_FS_CMS_INCLUDES."/template_".$objPage->Template.".inc.php");
	          else include_once(DIR_FS_CMS_INCLUDES."/template_".$curPage.".inc.php")
	    ?>

    </div><!--/row containers-->

</div><!-- /container -->
<!-- Example row of columns -->
<!-- footer-->
<?php include_once(DIR_FS_CMS_INCLUDES."footer.inc.php");?>
<div id="info" class="hide"></div>
</body>
</html>