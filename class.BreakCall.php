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
    private $app="";
    private $result="result_1234";
      
    
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