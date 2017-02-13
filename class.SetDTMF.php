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
    private $params='{"Params_Test":"test"}';
    private $display="DEFAULT";
    private $eventlog=false;
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
   public function SetEventLog($targetEventLog)
        {

            if( !empty( $targetEventLog ) )

                $this->eventlog = $targetEventLog;
        }
        
  public function SetApp($targetApp)
        {        
            if( !empty( $targetApp ) )
        
               $this->app = $targetApp;
        }
  
  
 public function SetParams($targetParams)
        {
            if( !empty( $targetParams ) )

               $this->params = $targetParams;
        }

  public function SetDisplay($targetDisplay)
        {

            if( !empty( $targetDisplay ) )

                $this->display = $targetDisplay;

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
        $jsonParams='"params": '.$this->params.',';
        $jsonDisplay='"display": "'.$this->display.'",';
        $jsonEventLog='"eventlog": "'.$this->eventlog.'",';
        $jsonResult='"result": "'.$this->result.'"';        
        $jsonEnd='}';
        
        return $jsonStart.$jsonAction.$jsonNextUrl.$jsonCause.$jsonApp.$jsonParams.$jsonDisplay.$jsonEventLog.$jsonResult.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex;
    }
  }
    
}

?>
