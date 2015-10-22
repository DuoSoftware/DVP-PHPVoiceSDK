<?php

/**
 * @author achintha
 * @copyright 2014
 */

class SetDTMF
{
   // private $file="TestRecord_1.wav";
    private $nexturl="http://192.168.1.195/IVR/end.php";
    private $DTMFtype="inband";
      
    
  public function SetNextUrl($targetUrl)
        {
        
            if( !empty( $targetUrl ) )
        
               $this->nexturl = $targetUrl;
       
        }
        
        
  public function SetDTMFType($targetDTMFType)
        {
        
            if( !empty( $targetDTMFType ) )
        
                $this->DTMFtype = $targetDTMFType;
          
        }
        
      
  function GetResult()
  {
    try
    {
        $jsonStart='{';
        $jsonAction='"action": "setdtmf",';
        $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
        $jsonCause='"dtmftype": "'.$this->DTMFtype.'"';
        $jsonEnd='}';
        
        return $jsonStart.$jsonAction.$jsonNextUrl.$jsonCause.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex;
    }
  }
    
}

?>
