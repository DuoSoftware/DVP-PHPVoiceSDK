<?php

/**
 * @author achintha
 * @copyright 2014
 */

class Execute
{

   // private $file="TestRecord_1.wav";
    private $nexturl="http://192.168.1.195/IVR/end.php";
    private $result="result_1234";
    private $params='{"Params_Test":"test"}';
    private $display="DEFAULT";
    private $application="";
    private $eventlog=false;
    private $data="";
      
    
  public function SetNextUrl($targetUrl)
        {
        
            if( !empty( $targetUrl ) )
        
               $this->nexturl = $targetUrl;
       
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
        
   public function SetApplication($targetApplication)
        {        
            if( !empty( $targetApplication ) )
        
               $this->application = $targetApplication;
        }
        
   public function SetEventLog($targetEventLog)
        {

            if( !empty( $targetEventLog ) )

                $this->eventlog = $targetEventLog;
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
        $jsonAction='"action": "execute",';
        $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
        $jsonResult='"result": "'.$this->result.'",';
        $jsonParams='"params": '.$this->params.',';
        $jsonDisplay='"display": "'.$this->display.'",';
        $jsonApplication='"application": "'.$this->application.'",';
        $jsonEventLog='"eventlog": "'.$this->eventlog.'",';
        $jsonData='"data": "'.$this->data.'"';
        $jsonEnd='}';
        
        return $jsonStart.$jsonAction.$jsonNextUrl.$jsonResult.$jsonParams.$jsonDisplay.$jsonApplication.$jsonEventLog.$jsonData.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex;
    }
  }
    
}

?>
