<?php
    // *** nullify any existing autoloads ***/
    spl_autoload_register(null, false);
    /*** specify extensions that may be loaded ***/
    spl_autoload_extensions('.php, .class.php, .lib.php');
    /*** class Loader ***/
    function classLoader($class)
    {
        $filename = strtolower($class) . '.class.php';
        $file 	  = DIR_FS_APPLICATION_CLASS. $filename;
        if (!file_exists($file))
        {
             	
			$filename = $class . '.class.php';
            $file 	  =  DIR_FS_APPLICATION_CLASS . $filename;
			if (!file_exists($file))
        	{ 
               return false;
            } 
            
           include_once( $file );
        }
        include_once( $file );
    }

    function libLoader($class)
    {
        $filename = strtolower($class) . '.class.php';
        $file     = DIR_FS_COMMONLIB_CLASSES . $filename;
		
        if (!file_exists($file))
        {
          
            $filename =  $class . '.class.php';
	        $file = DIR_FS_COMMONLIB_CLASSES. $filename;
	        if (!file_exists($file))
	        { 
	            
	            return false;
	        }
        	include_once( $file );	
           
        }
        include_once( $file );
    }
	
	
	
	

    /*** register the loader functions ***/
    spl_autoload_register('classLoader');
    spl_autoload_register('libLoader');
	

?>