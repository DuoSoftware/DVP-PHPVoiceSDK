<?php

/**
 * @author achintha
 * @copyright 2014
 */

class HangupCall
{
   // private $file="TestRecord_1.wav";
    private $nexturl="http://192.168.1.195/IVR/end.php";
    private $app="";
    private $result="result_1234";
    private $cause="timeout";
      
    
  public function SetNextUrl($targetUrl)
        {
        
            if( !empty( $targetUrl ) )
        
               $this->nexturl = $targetUrl;
       
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
        
  public function SetHangupCause($targetHangupCause)
        {
        
            if( !empty( $targetHangupCause ) )
        
                $this->cause = $targetHangupCause;
          
        }
        
      
  function GetResult()
  {
    try
    {
        $jsonStart='{';
        $jsonAction='"action": "hangup",';
        $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
        $jsonApp='"app": "'.$this->app.'",';
        $jsonResult='"result": "'.$this->result.'",';
        $jsonCause='"cause": "'.$this->cause.'"';
        $jsonEnd='}';
        
        return $jsonStart.$jsonAction.$jsonNextUrl.$jsonApp.$jsonResult.$jsonCause.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex;
    }
  }
    
}

?>