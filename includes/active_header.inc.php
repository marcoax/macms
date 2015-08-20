<?php
  //lista  categorie
  include_once(DIR_FS_APPLICATION_CMS."newsletteruser.class.php");
  $ac      =  ma_getParameter('ac');
  $objUser = new newsletteruser;
  $objUser->activateUser($ac);
  $isNewsletterActived = 1;
?>