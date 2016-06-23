<?php

/**
 * @author achintha
 * @copyright 2014
 */

class ConferenceCall
{
   // private $file="TestRecord_1.wav";
    private $nexturl="http://192.168.1.195/IVR/end.php";
    private $app="";
    private $result="result_1234";
    private $profile="conf";
    private $data="11111";
    
    
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
             
  public function SetProfile($targetProfile)
        {
        
            if( !empty( $targetProfile ) )
        
               $this->profile = $targetProfile;
          
        }
        
  public function SetData($targetData)
        {
        
            if( !empty( $targetData ) )
        
                $this->data = $targetData;
          
        }
        
        
  
    
  function GetResult()
  {
   try
    { 
        $jsonStart='{';
        $jsonAction='"action": "conference",';
        $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
        $jsonApp='"app": "'.$this->app.'",';
        $jsonResult='"result": "'.$this->result.'",';
        $jsonProfile='"profile": "'.$this->profile.'",';
        $jsonData='"data": "'.$this->data.'"';
        $jsonEnd='}';
        
        return $jsonStart.$jsonAction.$jsonNextUrl.$jsonApp.$jsonResult.$jsonProfile.$jsonData.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex;
    }
  }
    
}

?>