<?php

/**
 * @author achintha
 * @copyright 2014
 */

class PauseCall
{
   // private $file="TestRecord_1.wav";
    private $nexturl="http://192.168.1.195/IVR/end.php";
    private $app="";
    private $result="result_1234";
    private $errorFile="";
    private $digitTimeOut="5";
    private $inputTimeOut="10";
    private $milliSeconds="5000";
    private $terminator="*";
    private $strip="*";
    private $digits="9";
    private $maxdigits="";
       
        
        
public function SetNextUrl($targetUrl)
        {
        
            if(!empty( $targetUrl ) )        
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
        
  public function SeteErorfile($targetErrorFile)
        {
        
            if( !empty( $targetErrorFile ) )
        
               $this->errorFile = $targetErrorFile;              
        }
        
  public function SetDigitTimeOut($targetDigitTimeOut)
        {
        
            if( !empty( $targetDigitTimeOut ) )
 
              $this->digitTimeOut = $targetDigitTimeOut;       
        }
        
  public function SetInputTimeOut($targetInputTimeOut)
        {
        
            if( !empty( $targetInputTimeOut ) )
        
               $this->inputTimeOut = $targetInputTimeOut;            
        }
        
  public function SetMilliSeconds($targetMilliSeconds)
        {
        
            if( !empty( $targetMilliSeconds ) )

               $this->milliSeconds = $targetMilliSeconds;
                
        }
        
  public function SetTerminator($targetTerminator)
        {
        
            if( !empty( $targetTerminator ) )

                $this->terminator = $targetTerminator;               
        }
        
   public function SetStrip($targetStrip)
        {
        
            if( !empty( $targetStrip ) )
        
                $this->strip = $targetStrip;
               
        }
        
   public function SetDigits($targetDigits)
        {
        
            if( !empty( $targetDigits ) )
 
               $this->digits = $targetDigits;            
        }
 
   public function SetMaxDigits($targetMaxDigits)
        {       
            if( !empty( $targetMaxDigits ) )
        
                $this->maxdigits = $targetMaxDigits;
        }
 
    
 function GetResult()
  {
    try
    {
        $jsonStart='{';
        $jsonAction='"action": "pause",';
        $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
        $jsonApp='"app": "'.$this->app.'",';
        $jsonResult='"result": "'.$this->result.'",';
        $jsonErrorFile='"errorfile": "'.$this->errorFile.'",';
        $jsonDigitTimeOut='"digittimeout": "'.$this->digitTimeOut.'",';
        $jsonInputTimeOut='"inputtimeout": "'.$this->inputTimeOut.'",';
        $jsonMilliSeconds='"milliseconds": "'.$this->milliSeconds.'",';
        $jsonTerminator='"terminator": "'.$this->terminator.'",';
        $jsonStrip='"strip": "'.$this->strip.'",';
        $jsonMaxDigits='"maxdigits": "'.$this->maxdigit.'",';
        $jsonDigits='"digits": "'.$this->digits.'"';
        $jsonEnd='}';
        
        return $jsonStart.$jsonAction.$jsonNextUrl.$jsonApp.$jsonResult.$jsonErrorFile.$jsonDigitTimeOut.$jsonInputTimeOut.$jsonMilliSeconds.$jsonTerminator.$jsonStrip.$jsonDigits.$jsonMaxDigits.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex;
    }
  }
    
}

?>