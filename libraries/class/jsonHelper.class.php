<?php
/*
 * 0 = JSON_ERROR_NONE
1 = JSON_ERROR_DEPTH
2 = JSON_ERROR_STATE_MISMATCH
3 = JSON_ERROR_CTRL_CHAR
4 = JSON_ERROR_SYNTAX
5 = JSON_ERROR_UTF8
 */
class jsonHelper extends Exception 

{
    public static function Encode($obj)
    {
        return json_encode($obj);
    }
    
    public static function Decode($json, $toAssoc = false)
    {
    	
		$result = json_decode($json, $toAssoc);
	    switch(json_last_error())
        {
            case JSON_ERROR_DEPTH:
                $error =  ' - Maximum stack depth exceeded';
                break;
			case JSON_ERROR_STATE_MISMATCH;
			    $error = ' - Unexpected control character found';
                break; 
            case JSON_ERROR_CTRL_CHAR:
                $error = ' - Mismacht error';
                break;
            case JSON_ERROR_SYNTAX:
                $error = ' - Syntax error, malformed JSON';
                break;
			case JSON_ERROR_UTF8:
                $error = ' - UTF8 error';
                break;
            case JSON_ERROR_NONE:
            default:
                $error = '';                    
        }
		if (!empty($error))
            throw new Exception('JSON Error: '.$error);        
        
        return $result;
    }
}




?>

