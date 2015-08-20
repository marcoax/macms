<?php

class Request
{
   
    
   /**
    * Get a value from $_POST / $_GET
    * if unavailable, take a default value
    *
    * @param string $key Value key
    * @param mixed $default_value (optional)
    * @return mixed Value
    */
    public static function getValue($key, $default_value = false)
    {
        if (!isset($key) || empty($key) || !is_string($key))
            return false;
        $ret = (isset($_POST[$key]) ? $_POST[$key] : (isset($_GET[$key]) ? $_GET[$key] : $default_value));

        if (is_string($ret) === true)
            $ret = urldecode(preg_replace('/((\%5C0+)|(\%00+))/i', '', urlencode($ret)));
        return !is_string($ret)? $ret : stripslashes($ret);
    }

    public static function getIsset($key)
    {
        if (!isset($key) || empty($key) || !is_string($key))
            return false;
        return isset($_POST[$key]) ? true : (isset($_GET[$key]) ? true : false);
    }
	
	
	
	
   public static function ma_getParameter($parameter_name){
	   if( isset($_GET[$parameter_name]) )
			return $_GET[$parameter_name];
		else if( isset($_POST[$parameter_name]) )
			return $_POST[$parameter_name];
		else if( isset($_SESSION[$parameter_name]))
			return $_SESSION[$parameter_name];
		else
			return false;
   }
   
   public static function ma_hasParameter($parameter_name){
		if( isset($_GET[$parameter_name]) )
			return true;
		else if( isset($_POST[$parameter_name]) )
			return true;
		else if( isset($_SESSION[$parameter_name]))
			return true;
		else
			return false;
  }
  
  public static function ma_setParam($parameter_name,$parameter_value,$stringa){
		switch($stringa){
			case 'post':
				$_POST[$parameter_name] = $parameter_value;
				break;
			case 'get':
				$_GET[$parameter_name] = $parameter_value;
				break;
	
			case 'session':
				$_SESSION[$parameter_name] = $parameter_value;
				break;
   		}
  }
}