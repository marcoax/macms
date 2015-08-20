<?php
error_reporting(E_ALL ^ (E_NOTICE | E_STRICT | E_DEPRECATED));
session_start();
include_once("../config/configure.php");
include_once(DIR_FS_CMS."cms_edit.php");
