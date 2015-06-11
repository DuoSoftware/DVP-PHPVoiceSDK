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
    private $app="";
    private $result="result_1234";        
      
    
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
        
  public function SetApp($targetApp)
        {        
            if( !empty( $targetApp ) )
        
               $this->app = $targetApp;
        }
        
        
  public function SetResult($targetResult)
        {
        
            if( !empty( $targetResult ) )
        
                $this->result = $targetResult;
          
        }                
        
      
  function GetResult()
  {
    try
    {
        $jsonStart='{';
        $jsonAction='"action": "setdtmf",';
        $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
        $jsonCause='"dtmftype": "'.$this->DTMFtype.'",';
        $jsonApp='"app": "'.$this->app.'",';
        $jsonResult='"result": "'.$this->result.'"';        
        $jsonEnd='}';
        
        return $jsonStart.$jsonAction.$jsonNextUrl.$jsonCause.$jsonApp.$jsonResult.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex;
    }
  }
    
}

?>
