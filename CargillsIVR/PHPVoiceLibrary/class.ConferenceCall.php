<?php

/**
 * @author achintha
 * @copyright 2014
 */

class ConferenceCall
{
   // private $file="TestRecord_1.wav";
    private $nexturl="http://192.168.1.195/IVR/end.php";
    private $profile="conf";
    private $data="11111";
    
    
  public function SetNextUrl($targetUrl)
        {
        
            if( !empty( $targetUrl ) )
        
                $this->nexturl = $targetUrl;
       
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
        $jsonProfile='"profile": "'.$this->profile.'",';
        $jsonData='"data": "'.$this->data.'"';
        $jsonEnd='}';
        
        return $jsonStart.$jsonAction.$jsonNextUrl.$jsonProfile.$jsonData.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex;
    }
  }
    
}

?>