<?php
class DateUtil {
    
    static $dayNames = array(
       'en'=> array( 'Domenica', 'Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato' ),
       'it'=> array( 'Domenica', 'Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato' ),
       'fr'=> array( "Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi" ),
       'es'=> array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"),
    );
  
    /*
        The labels to display for the months of the year. The first entry in this array
        represents Gennaio.
    */
  
 
	static $monthNames = array(
         'en'=> array("January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"),
         'it'=> array("Gennaio","Febbraio", "Marzo", "Aprile", "Maggio", "Giugno","Luglio", "Agosto", "Settembre", "Ottobre", "Novembre","Dicembre"),
         'fr'=> array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre") ,
         'es'=> array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"),
    );
	
	    
    /**
     * Coverte la data da  formato italiano a  US/UK e vicerversa
     *
     * 
     *
     * @param string $data. stringa  con la data da invertire
     * @param string $sep. Optional  separatore
     * 
     * @return string  
     */    

    public static function invDate( $date, $sepa='-',$format="d-m-y" )
    {
        $curDate=$date;
        if(!empty($curDate)){
            $arr = explode($sepa,$curDate);
            if($format=="d-m-y")$curDate=$arr[2].$sepa.$arr[1].$sepa.$arr[0];
            elseif($format=="m-y")$curDate=$arr[1].$sepa.$arr[0];
            $curDate=($curDate=="00-00-0000" or trim($curDate=='--' ))?'': $curDate;
        }
        return $curDate;
    }
    
    
    /**
     * Coverte la data e lìora da  formato italiano a  US/UK e vicerversa
     *
     * 
     *
     * @param string $dataetime stringa  con la data e lora da invertire
     * @param string $sep. Optional  separatore
     * 
     * @return string  
     */   
    
    public static function invDateTime( $date, $sepa='-',$showTime=0 )
    {
        $curDateArray=explode(" ",$date);
        if(!empty( $curDateArray[0])){
            if($showTime==0) return DateUtil::invDate($curDateArray[0],$sepa);
            else  return DateUtil::invDate($curDateArray[0],$sepa).' '.$curDateArray[1];  
        } 
    }
    
    
    /**
     * Coverte la data nel formato voluto e converte la strinfa mese in Italiano
     *
     * 
     *
     * @param string $date. stringa  con la data convertire
     * @param string $formato data   tipo  D-M-Y  (23-7-2014) ritorna 23 Luglio 2014
     * @param string $sep. Optional  separatore
     * 
     * @return string  
     */ 
    
    public static function formatDate($date,$format,$sep=' ',$lang='it'){
     
        $dataHtml   = '';
        $date       = DateUtil::invDate($date);
        $dataFormat = explode('-',$format);
        $dataArray  = explode('-',$date);
		if(in_array('D',$dataFormat))$dataHtml.= $dataArray[0].' '.$sep;
        if(in_array('m',$dataFormat))$dataHtml.= $dataArray[1].' '.$sep;
        if(in_array('M',$dataFormat))$dataHtml.= DateUtil::$monthNames[$lang][(int)$dataArray[1]-1].' '.$sep;
        if(in_array('y',$dataFormat))$dataHtml.= date($dataArray[2],'y').' '.$sep;
        if(in_array('Y',$dataFormat))$dataHtml.= $dataArray[2].' '.$sep;
        $dataHtml;
        return $dataHtml;
    }
	
	
    
    
    public static function sanitizeDate($curDate)
    {
        $date  =str_replace('/', '-',$curDate);
        $dateArray=explode('-',$date);
        if($dateArray[0]=='') return '';
        else  return  $date = strftime('%Y-%m-%d',strtotime($dateArray[2].'-'.$dateArray[1].'-'.$dateArray[0]));
    }
    
    
    public static function sanitizeDateTime($curDateTime)
    {
        $curDate    = explode(' ',$curDateTime);
        $date       = str_replace('/', '-',$curDate[0]);
        $dateArray  = explode('-',$date);
        if($dateArray[0]=='') return '';
        else  return  $date = strftime('%Y-%m-%d',strtotime($dateArray[2].'-'.$dateArray[1].'-'.$dateArray[0]));
    }
    
    public static function validateDate($date, $sepa='-')   
    {
        $arr = explode($sepa,$date);
        return checkdate($arr[1],$arr[0],$arr[2]); 
    }

}