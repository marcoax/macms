<?php

include_once("../config/configure.php");
include_once(DIR_FS_CMS_INCLUDES."common.inc.php");
?>
<body>
<!-- header -->
<!-- container -->
<div class="container">
	<?php require_once(DIR_FS_CMS_INCLUDES."template_".$objPage->Template.".inc.php");?>
</div>
<!-- /container -->
<!-- footer-->
<?php include_once(DIR_FS_CMS_INCLUDES."footer.inc.php");?>
</body>
</html>