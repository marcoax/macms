<?php if($novalidazione!=1):?><script language="JavaScript" src="<?php echo $jsValFile?>" type="text/javascript"></script><?php endif?>
<script type="text/javascript">
<script src="<?php echo  DIR_WS_CMS_JS?>vendor/jquery.uploadifive.min.js" type="text/javascript"></script>
   
         $( "#sortable" ).disableSelection();
         
         $( "#sortable").sortable({
  			   update: function( event, ui ) {
  				var sorted = $( "#sortable" ).sortable( "serialize");
  				$.ajax({
	                 url: urlAjaxHandler+"update/sortList", 
	                 data:sorted,
	                 type: "GET",
	                 cache: false,
	                 success: function(code){
                 	 }
           		});
  			 }
		 })
         
         
        
                        IdUserActionType:$('#IdUserActionType').val()
    
    
<script type="text/javascript">
	<?php $timestamp = time();?>
	$(function() {
		$('#file_upload').uploadifive({
			'auto'             : true,
			//'checkScript'      : 'check-exists.php',
			'queueID'          : 'queue',
			'uploadScript'     : 'uploadifive.php',
			'onAddQueueItem' : function(file) {
					this.data('uploadifive').settings.formData = { 
					   'timestamp' : '<?php echo  $timestamp;?>',
					   'token'     : '<?php echo  md5('unique_salt' . $timestamp);?>',
					   'Id'        :  $('#itemId').val(),
					   'myImgLang' : '<?php echo  md5('unique_salt' . $timestamp);?>',
					   'myImgType' :  $('#myImgType').val(),
        			};
			},
			'onUploadComplete' : function(file, data) { 
				$("#docListBody").load(urlAjaxHandler+"update/getImageList/"+ $('#itemId').val());
			}
		});
	});


	
<?php
 /* 
 
	if(CKEDITOR) {
		$(function() {
				
			 	CKEDITOR.replace('articoli_Descrizione', {
				  "filebrowserImageUploadUrl": "<?php echo DIR_WS_SITE?>ckeditor/plugins/imgupload/imgupload.php"
				});
				
				CKEDITOR.replace('articoli_Introsss', {
				  "filebrowserImageUploadUrl": "<?php echo DIR_WS_SITE?>ckeditor/plugins/imgupload/imgupload.php"
				});
		});
		
	
	}
	
	// ]]>
 */