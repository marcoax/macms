<div id="footer" class="<?php echo  $curPage?> <?php if(ma_get_page()!='index') echo 'footerbottom'; ?>">
<script src="<?php echo  DIR_WS_CMS_JS?>localize.<?php echo  LANG_PRE?>.js"></script>
 if(file_exists(DIR_FS_CMS_INCLUDES.$curPage."_header_js.inc.php")){
?>