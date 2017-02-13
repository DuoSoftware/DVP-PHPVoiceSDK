<?php

/**
 * @author achintha
 * @copyright 2014
 */

class RecordCall
{
   // private $file="TestRecord_1.wav";
    private $nexturl="http://192.168.1.195/IVR/end.php";
    private $app="";
    private $result="result_1234";
    private $params='{"Params_Test":"test"}';
    private $display="DEFAULT";
    private $limit="15";
    private $postUrl="";
    private $eventlog=false;
    private $name="test_call_record";
    
    
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
        
  public function SetLimit($targetLimit)
        {
        
            if( !empty( $targetLimit ) )
        
               $this->limit = $targetLimit;
        }
        
  public function SetPostUrl($targetPostUrl)
        {
        
            if( !empty( $targetPostUrl ) )
        
               $this->strip = $targetPostUrl;

        }

  public function SetEventLog($targetEventLog)
        {

            if( !empty( $targetEventLog ) )

                $this->eventlog = $targetEventLog;
        }
        
  public function SetName($targetName)
        {
        
            if( !empty( $targetName ) )
        
                $this->name = $targetName;
        }
 
    
  function GetResult()
  {
    try
    {
        $jsonStart='{';
        $jsonAction='"action": "recordcall",';
        $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
        $jsonApp='"app": "'.$this->app.'",';
        $jsonResult='"result": "'.$this->result.'",';
        $jsonParams='"params": '.$this->params.',';
        $jsonDisplay='"display": "'.$this->display.'",';
        $jsonlimit='"limit": "'.$this->limit.'",';
        $jsonPostUrl='"posturl": "'.$this->postUrl.'",';
        $jsonEventLog='"eventlog": "'.$this->eventlog.'",';
        $jsonName='"name": "'.$this->name.'"';
        $jsonEnd='}';
        
        return $jsonStart.$jsonAction.$jsonNextUrl.$jsonApp.$jsonResult.$jsonParams.$jsonDisplay.$jsonlimit.$jsonPostUrl.$jsonEventLog.$jsonName.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex;
    }
  }
    
}

?>