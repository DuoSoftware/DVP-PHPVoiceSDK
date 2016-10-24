<?php

/**
 * @author achintha
 * @copyright 2014
 */

class DialNumber
{
   // private $file="TestRecord_1.wav";
    private $nexturl="http://192.168.1.195/IVR/end.php";
    private $app="";
    private $result="result_1234";
    private $context="result_1234";
    private $params='{"Params_Test":"test"}';
    private $dialplan="test.xml";
    private $callername="5";
    private $callernumber="10";
    private $number="10000";
    
     
        
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
        
  public function SetContext($targetContext)
        {
        
            if( !empty( $targetContext ) )
        
                $this->context = $targetContext;
          
        }
        
  public function SetDialplan($targetDialplan)
        {
        
            if( !empty( $targetDialplan ) )
        
                $this->dialplan = $targetDialplan;
          
        }
        
  public function SetCallerName($targetCallername)
        {
        
            if( !empty( $targetCallername ) )
        
                $this->callername = $targetCallername;

        }
        
  public function SetCallerNumber($targetCallerNumber)
        {
        
            if( !empty( $targetCallerNumber ) )
        
                $this->callernumber = $targetCallerNumber;
 
        }
        
  public function SetNumber($targetNumber)
        {
        
            if( !empty( $targetNumber ) )

             $this->number = $targetNumber;
          
        }
        
  
    
  function GetResult()
  {
    try
    {
        //directdial
        //dialextention
        $jsonStart='{';
        $jsonAction='"action": "dial",';
        $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
        $jsonApp='"app": "'.$this->app.'",';
        $jsonResult='"result": "'.$this->result.'",';
        $jsonParams='"params": '.$this->params.',';
        $jsonContext='"context": "'.$this->context.'",';
        $jsonDialplan='"dialplan": "'.$this->dialplan.'",';
        $jsonCallerName='"callername": "'.$this->callername.'",';
        $jsonCallerNumber='"callernumber": "'.$this->callernumber.'",';
        $jsonNumber='"number": "'.$this->number.'"';
        $jsonEnd='}';
        
        return $jsonStart.$jsonAction.$jsonNextUrl.$jsonApp.$jsonResult.$jsonParams.$jsonContext.$jsonDialplan.$jsonCallerName.$jsonCallerNumber.$jsonNumber.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex;
    }
    
  }
    
}

?>
