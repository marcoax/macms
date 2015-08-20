<?php
include_once("../config/configure.php");
include_once(DIR_FS_CMS_INCLUDES."common.inc.php");

?>

<body id="page-edit">
<!-- header -->
<?php include_once(DIR_FS_CMS_INCLUDES."header.inc.php");?>
<!-- container -->
<div class="container mb25" id="boxContenuto" style="padding-bottom: 50px">
	<div class="row mt25">
    	<div class="col-sm-12">
       		<ul class="breadcrumb mf0">
		      	<?php echo  $objPage->bc_titoloItem?>            	
	            <li class="pull-right hidden">ultima modifica:<?php echo $invDate->invDateTime($objSez->Data->LastModified)?>
		         <?php if($objSez->Data->lastUser>1):?> - <?php echo  user::getUserById($objSez->Data->lastUser)?><?php endif?>
		        </li>
         	</ul>
         	<div id="msgBox">
	  	     <?php if(String::ma_not_null($msgBox)):?>
       	     <div id="msgBoxContainer" class="hidden"><?php echo  $msgBox?></div>
        	<?php endif?>
      		</div>
   		</div>
   </div><!--/row header page-->
   <div class="row">
        <?php if($isModal!=1):?>
	    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="edit" id="edit" onsubmit="validazione('<?php echo $mainTab?>');" enctype="multipart/form-data">
             <?php else:?>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="moadalEdit" id="modalEdit" enctype="multipart/form-data">
        <?php endif?>
	    <?php if(file_exists(DIR_FS_CMS_INCLUDES."/template_".$objPage->Template.".inc.php"))include_once(DIR_FS_CMS_INCLUDES."/template_".$objPage->Template.".inc.php");
	             else include_once(DIR_FS_CMS_INCLUDES."/template_".$curPage.".inc.php")
	    ?>
	    <?php include(DIR_FS_CMS_BLOCKS."common_field.inc.php");?>
    </div><!--/row containers-->
 	 
  
    <div class="row">
             <div clas="toolBox" class="col-sm-12"><?php require(DIR_FS_CMS_BLOCKS."tools.inc.php")?></div>
     </div><!--/row tools-->
</div><!-- /container -->
<!-- Example row of columns -->
<!-- footer-->
<?php include_once(DIR_FS_CMS_INCLUDES."footer.inc.php");?>
<div id="info" class="hide"></div>
</body>
</html>