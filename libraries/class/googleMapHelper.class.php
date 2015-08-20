<?php
class GoogleMapHelper {

  private $apiKey;  
  private $googleGeocoderUrl = 'http://maps.google.com/maps/geo?'; 
  public  $googleMapsUrl = 'http://maps.google.it/maps?';   
  public  $isLocalized;
  private $wasLocalized;

  public function __construct ($apiKey) {
    $this->apiKey = $apiKey;
  }
  
  public function ckLocalized ($lat,$lng) {
     if($lat!=0 or $lng!=0){
     	  $this->isLocalized = 1;
     }
     else {
        $this->msg=MA_EH_GOOGLE_NO_MAPPED;
     }
  }
  
  public function sethasLocalized ($state) {
     $this->wasLocalized=$state;
  }
   /************** utility  GOOGLE ******************/
  public function setZoomlevel($zoom) {
     $this->zoomLevel=$zoom;
  }
  
   public function createGetDir($saddr,$daddr=''){
         $this->createAddress($saddr);
         if($saddr->Citta)$getHTML.=$saddr->Citta;
         if($saddr->Indirizzo && strlen($saddr->Indirizzo)>3)$getHTML.=' '.$saddr->Indirizzo;
         if($saddr->Cap && strlen($saddr->Cap)>3)$getHTML.=' '.$saddr->Cap;
         if($saddr->Nazione)$getHTML.=' '.$saddr->Nazione;
         
         return $this->googleMapsUrl.'saddr='.urlencode($getHTML);
  }
  
  
  public function createAddress($saddr){
         if($saddr->Citta)$getHTML.=$saddr->Citta;
         if($saddr->Indirizzo && strlen($saddr->Indirizzo)>3)$getHTML.=' '.$saddr->Indirizzo;
         if($saddr->Cap && strlen($saddr->Cap)>3)$getHTML.=' '.$saddr->Cap;
         if($saddr->Nazione)$getHTML.=' '.$saddr->Nazione;
         
         return $this->addressGoogle=$getHTML;
  }
  
}

//  boh non sono capace
class GoogleMapException extends Exception {

  private $resultCode;
  public $messages = array (200 => "OK",
     400 => 'A directions request could not be successfully parsed',
     500 => 'A geocoding or directions request could not be successfully processed, yet the exact reason for the failure is not known.',
     601 => 'An empty address was specified as input.',
     602 => 'No corresponding geographic location could be found for the specified address. This may be due to the fact that the address is relatively new, or it may be incorrect.',
     603 => 'The geocode for the given address or the route for the given directions query cannot be returned due to legal or contractual reasons. ',
     610 => 'The given key is either invalid or does not match the domain for which it was given.',
     620 => 'The given key has gone over the requests limit in the 24 hour period.'
     );
   
    public function __construct ($resultCode) {
      parent::__construct ($messages[$resultCode]);
    }
}

class GoogleMapHtmlHelper  extends GoogleMapHelper{

  public function __construct ($db) {
    $this->db = $db;
  }
  
 
  
  
  /********************* UTILITY Visualizzazione ***********************/
  public function setShowAddress($state) {
     $this->showAddres=$state;
  }
  
   public function setShowLegend($state) {
     $this->showLegend=$state;
  }
  public function setLegendColor($color,$defVal=3) {
     $this->legendColor=$color;
     $this->defColor=$this->legendColor[$defVal];
  }
  
  public function setLegendField($value) {
     $this->legendField=$value;
  }
  
  public function getColor($value){
     $this->curColor=$this->defColor;//get  the  default  color   from array
     // init  the  array container
     if(!is_array($this->arrayValue))$this->arrayValue = array();
     if(!is_array($this->arrayColor))$this->arrayColor = array();
     
     if(!in_array($value,$this->arrayValue)){
          array_push($this->arrayValue,$value);
          $this->curColor=$this->legendColor[count($this->arrayValue)-1];
          if(!in_array($this->curColor,$this->arrayColor))array_push($this->arrayColor,$this->curColor);
     }
     else {
        $keyIndex=array_search($value,$this->arrayValue);
        $this->curColor=$this->legendColor[$keyIndex];
     }
     return $this->curColor;     
  }
  
  public function createLegend($dataLegenda){
    if($this->arrayValue){
      $i=0;
      $htmlLegend.="<ul class=\"legenda\">";
        foreach($this->arrayValue as $v){
            $htmlLegend.="<li style=\"border-left:11px solid ".$this->arrayColor[$i]."\">".$dataLegenda[$v]."</li>";
            $i++;
        }
       $htmlLegend.="</ul>";
    }
    return $htmlLegend;
  }
  
  } 
  
  
   /********************* UTILITY per localizzazione  punto ***********************/
  
  
  class GoogleMapLocalizelHelper  extends GoogleMapHelper{

  public function __construct ($db) {
    $this->db = $db;
  }
  
  // estraggo   country in  base  all'ip 
  public   function  getCountryByIp() {
    $ip=($this->ip)?$this->ip:ma_get_ip();
    $sql = 'SELECT 
              *
          FROM 
              ip2nation
          WHERE 
              ip < INET_ATON("'.$ip.'") 
          ORDER BY 
              ip DESC 
          LIMIT 0,1';
  
    $this->Data=$this->db->executeSel($sql);
	
  }
 
  
  // estraggo le  coordinate in  base alla  nazione
  public  function countryLocation ($isoCode){
  $this->isoCode=$isoCode;
	  
    $sqlLoc = 'SELECT 
            *
        FROM 
            ip2nationCountries 
        WHERE 
            code="'.$this->isoCode.'"
        ORDER BY 
             code DESC 
        LIMIT 0,1';
	   
	    $this->locationData=$this->db->get_row($sqlLoc);
  }
 
 

  
 
 
}
?>