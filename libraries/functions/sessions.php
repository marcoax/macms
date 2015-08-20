<?php

 if (STORE_SESSIONS == 'db4') {
    if (!$SESS_LIFE = get_cfg_var('session.gc_maxlifetime')) {
      $SESS_LIFE = 1440;
    }
    function _sess_open($save_path, $session_name) {
      return true;
    }
    function _sess_close() {
      return true;
    }

    function _sess_read($key) {

      global $db;
      $value = $db->get_results("select value
                             from " . TABLE_SESSIONS . " 
                             where sesskey = '" . ma_db_input($key) . "'
                             and expiry > '" . time() . "'");

      if ($value->fields['value']) {
        return $value->fields['value'];
      }

      return false;
    }

    function _sess_write($key, $val) {
      global $SESS_LIFE, $db;
      $expiry = time() + $SESS_LIFE;
      $value = $val;

       $total = $db->get_var("select count(*) as total
                             from " . TABLE_SESSIONS . "
                             where sesskey = '" . ma_db_input($key) . "'");

      if ($total > 0) {
        return $db->get_results("update " . TABLE_SESSIONS . "
                             set expiry = '" . ma_db_input($expiry) . "',
                                 value = '" . ma_db_input($value) . "'
                             where sesskey = '" . ma_db_input($key) . "'");
      } else {
        return $db->get_results("insert into " . TABLE_SESSIONS . "
                             values ('" . ma_db_input($key) . "', '" . ma_db_input($expiry) . "',
                                     '" . ma_db_input($value) . "')");
      }
    }

    function _sess_destroy($key) {
      global $db;
      return $db->get_results("delete from " . TABLE_SESSIONS . "
                           where sesskey = '" . ma_db_input($key) . "'");
    }

    function _sess_gc($maxlifetime) {
      global $db;
      $db->get_results("delete from " . TABLE_SESSIONS . " where expiry < '" . time() . "'");

      return true;
    }

    session_set_save_handler('_sess_open', '_sess_close', '_sess_read', '_sess_write', '_sess_destroy', '_sess_gc');
  }

  function ma_session_start() {
    return session_start();
  }

  function ma_session_register($variable) {
    return session_register($variable);
  }

  function ma_session_is_registered($variable) {
    return session_is_registered($variable);
  }

  function ma_session_unregister($variable) {
    return session_unregister($variable);
  }

  function ma_session_id($sessid = '') {
     if ($sessid != '') {
      return session_id($sessid);
    } else {
      return session_id();
    }
  }

  function ma_session_name($name = '') {
    if ($name != '') {
      return session_name($name);
    } else {
      return session_name();
    }
  }

  function ma_session_close() {
    if (function_exists('session_close')) {
      return session_close();
    }
  }

  function ma_session_destroy() {
     if (!isset($_SESSION)) return session_destroy();
  }

  function ma_session_save_path($path = '') {
    if ($path != '') {
      return session_save_path($path);
    } else {
      return session_save_path();
    }
  }
  
  
  function  set_cookie() {
    if($_SESSION['rememberme']==1 && ma_not_null($_SESSION['Email'])){
   	 setcookie(APP_TITLE.'_Email',$_SESSION['Email'],  time() + 1*24*60*60);
     setcookie(APP_TITLE.'_Pwd',$_SESSION['Pwd'],  time() + 1*24*60*60);
	}
	else if(String::ma_not_null($_SESSION['Email'])){
   	 setcookie(APP_TITLE.'_Email',' ',  time() - 1*24*60*60);
     setcookie(APP_TITLE.'_Pwd',' ',  time() - 1*24*60*60);
	}
}
