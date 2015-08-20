<?php

class Server
{
    public static function pathInfo()
    {
        return self::get( 'PATH_INFO' );
    }

    public static function requestUri()
    {
        return self::get( 'REQUEST_URI' );
    }

    public static function requestMethod()
    {
        return self::get( 'HTTP_REQUEST_METHOD' );
    }

    public static function get( $property, $default = null )
    {
        if ( array_key_exists( $property, $_SERVER ) )
            return $_SERVER[ $property ];

        return $default;
    }
    
     //get ip 
  public  function get_ip()  {
        $ip = FALSE;
        // If HTTP_CLIENT_IP is set, then give it priority
        if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }
            
        // User is behind a proxy and check that we discard RFC1918 IP addresses
        // if they are behind a proxy then only figure out which IP belongs to the
        // user.  Might not need any more hackin if there is a squid reverse proxy
        // infront of apache.
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            
            // Put the IP's into an array which we shall work with shortly.
            $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
            if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
            
            for ($i = 0; $i < count($ips); $i++) {
                // Skip RFC 1918 IP's 10.0.0.0/8, 172.16.0.0/12 and 192.168.0.0/16
                if (!eregi ("^(10|172\.16|192\.168)\.", $ips[$i])) {
                    if (version_compare(phpversion(), "5.0.0", ">=")) {
                        if (ip2long($ips[$i]) != false) {
                            $ip = $ips[$i];
                            break;
                        }
                    } else {
                        if (ip2long($ips[$i]) != -1) {
                            $ip = $ips[$i];
                            break;
                        }
                    }
                }
             }
         }
        $Ip=($ip)? $ip : $_SERVER['REMOTE_ADDR'];
        return $Ip;
   }
      
 
   //return ip in number format
   function get_ipn(){
     return $Ipn = (float) sprintf("%u", ip2long($this->Ip));
   }
   
   
     
    
    /**
    * Get the server variable SERVER_NAME
    *
    * @return string server name
    */
    public static function getServerName()
    {
        if (isset($_SERVER['HTTP_X_FORWARDED_SERVER']) && $_SERVER['HTTP_X_FORWARDED_SERVER'])
            return $_SERVER['HTTP_X_FORWARDED_SERVER'];
        return $_SERVER['SERVER_NAME'];
    }

    /**
    * Get the server variable REMOTE_ADDR, or the first ip of HTTP_X_FORWARDED_FOR (when using proxy)
    *
    * @return string $remote_addr ip of client
    */
    public static function getRemoteAddr()
    {
        // This condition is necessary when using CDN, don't remove it.
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && (!isset($_SERVER['REMOTE_ADDR']) || preg_match('/^127\..*/i', trim($_SERVER['REMOTE_ADDR'])) || preg_match('/^172\.16.*/i', trim($_SERVER['REMOTE_ADDR'])) || preg_match('/^192\.168\.*/i', trim($_SERVER['REMOTE_ADDR'])) || preg_match('/^10\..*/i', trim($_SERVER['REMOTE_ADDR']))))
        {
            if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ','))
            {
                $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                return $ips[0];
            }
            else
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        return $_SERVER['REMOTE_ADDR'];
    }
	
	/**
	* Get the current domain Name ()
	*
	* @return string protocol
	*/
	
	public  static  function getCurrentDomain(){
		
			$host = $_SERVER['HTTP_HOST'];
			preg_match("/[^\.\/]+\.[^\.\/]+$/", $host, $matches);
			return $matches[0];
	}
	/**
	* Get the current url prefix protocol (https/http)
	*
	* @return string protocol
	*/
	public static function getCurrentUrlProtocolPrefix()
	{
		if (Tools::usingSecureMode())
			return 'https://';
		else
			return 'http://';
	}
	
	 /**
     * verifica se ip è gf
     *
     * 
     * 
     * @return  boolen
     */ 
    public static function isGF() {
        if($_SERVER['REMOTE_ADDR']=='80.91.51.18') return true;
        else   return false;
    }
    
}