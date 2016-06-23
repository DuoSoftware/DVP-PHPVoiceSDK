<?php

/**
 * @author achintha
 * @copyright 2014
 */

class Execute
{
   // private $file="TestRecord_1.wav";
    private $nexturl="http://192.168.1.195/IVR/end.php";
    private $app="";
    private $result="result_1234";
    private $application="";
    private $data="";
      
    
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
        
   public function SetApplication($targetApplication)
        {        
            if( !empty( $targetApplication ) )
        
               $this->app = $targetApplication;
        }
        
        
  public function SetData($targetData)
        {
        
            if( !empty( $targetData ) )
        
                $this->result = $targetData;
          
        }
        
      
  function GetResult()
  {
    try
    {
        $jsonStart='{';
        $jsonAction='"action": "execute",';
        $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
        $jsonApp='"app": "'.$this->app.'",';
        $jsonResult='"result": "'.$this->result.'",';
        $jsonApplication='"application": "'.$this->application.'",';
        $jsonData='"data": "'.$this->data.'"';
        $jsonEnd='}';
        
        return $jsonStart.$jsonAction.$jsonNextUrl.$jsonApp.$jsonResult.$jsonApplication.$jsonData.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex;
    }
  }
    
}

?>
