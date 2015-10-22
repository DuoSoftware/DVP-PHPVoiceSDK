<?php

/**
 * @author achintha
 * @copyright 2014
 */

class DialNumber
{
   // private $file="TestRecord_1.wav";
    private $nexturl="http://192.168.1.195/IVR/end.php";
    private $context="result_1234";
    private $dialplan="test.xml";
    private $callername="5";
    private $callernumber="10";
    private $number="10000";
    
     
        
  public function SetNextUrl($targetUrl)
        {
        
            if( !empty( $targetUrl ) )
        
                 $this->nexturl = $targetUrl;    
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
        $jsonContext='"context": "'.$this->context.'",';
        $jsonDialplan='"dialplan": "'.$this->dialplan.'",';
        $jsonCallerName='"callername": "'.$this->callername.'",';
        $jsonCallerNumber='"callernumber": "'.$this->callernumber.'",';
        $jsonNumber='"number": "'.$this->number.'"';
        $jsonEnd='}';
        
        return $jsonStart.$jsonAction.$jsonNextUrl.$jsonContext.$jsonDialplan.$jsonCallerName.$jsonCallerNumber.$jsonNumber.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex;
    }
    
  }
    
}

?>
