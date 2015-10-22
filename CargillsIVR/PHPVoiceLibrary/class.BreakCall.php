<?php

/**
 * @author achintha
 * @copyright 2014
 */

class BreakCall
{
   // private $file="TestRecord_1.wav";
    private $nexturl="http://192.168.1.195/IVR/end.php";
    private $cause="timeout";
      
    
  public function SetNextUrl($targetUrl)
        {
        
            if( !empty( $targetUrl ) )
        
                $this->nexturl = $targetUrl;
       
        }
        
        
  public function SetBreakCause($targetBreakCause)
        {
        
            if( !empty( $targetBreakCause ) )
        
                $this->cause = $targetBreakCause;
      
        }
        
      
  function GetResult()
  {
    try
    {
    $jsonStart='{';
    $jsonAction='"action": "break",';
    $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
    $jsonCause='"cause": "'.$this->cause.'"';
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