<?php

/**
 * @author achintha
 * @copyright 2014
 */

class RecordVoiceMessage
{
    private $file="TestRecord_1.wav";
    private $nexturl="http://192.168.1.195/IVR/end.php";
    private $result="result_1234";
    private $errorFile="";
    private $digitTimeOut="5";
    private $inputTimeOut="10";
    private $limit="30";
    private $terminator="*";
    private $strip="*";
    private $postUrl="";
    private $digits="9";
    
    
     
    
  public function SetFile($targetFile)
        {
        
            if( !empty( $targetFile ) )
        
              $this->file = $targetFile;

        }
        
        
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
        
  public function SetErrorFile($targetErrorFile)
        {
        
            if( !empty( $targetErrorFile ) )
        
                $this->errorFile = $targetErrorFile;

        }
        
  public function SetDigitTimeout($targetDigitTimeOut)
        {
        
            if( !empty( $targetDigitTimeOut ) )
        
               $this->digitTimeOut = $targetDigitTimeOut;

        }
        
  public function SetInputTimeout($targetInputTimeOut)
        {
        
            if( !empty( $targetInputTimeOut ) )
        
              $this->inputTimeOut = $targetInputTimeOut;
 
        }
        
  public function SetLimit($targetLimit)
        {
        
            if( !empty( $targetLimit ) )
        
               $this->limit = $targetLimit;

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
        
    public function SetPostUrl($targetPostUrl)
        {
        
            if( !empty( $targetPostUrl ) )
        
               $this->postUrl = $targetPostUrl;

        }
        
   public function SetDigits($targetDigits)
        {
        
            if( !empty( $targetDigits ) )
        
               $this->digits = $targetDigits;
        }
 
    
  function GetResult()
  {
    try
    {
        $jsonStart='{';
        $jsonAction='"action": "record",';
        $jsonFile='"file": "'.$this->file.'",';
        $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
        $jsonResult='"result": "'.$this->result.'",';
        $jsonErrorFile='"errorfile": "'.$this->errorFile.'",';
        $jsonDigitTimeOut='"digittimeout": "'.$this->digitTimeOut.'",';
        $jsonInputTimeOut='"inputtimeout": "'.$this->inputTimeOut.'",';
        $jsonLimit='"limit": "'.$this->limit.'",';
        $jsonTerminator='"terminator": "'.$this->terminator.'",';
        $jsonStrip='"strip": "'.$this->strip.'",';
        $jsonPostUrl='"posturl": "'.$this->postUrl.'",';
        $jsonDigits='"digits": "'.$this->digits.'"';
        $jsonEnd='}';
        
        return $jsonStart.$jsonAction.$jsonFile.$jsonNextUrl.$jsonResult.$jsonErrorFile.$jsonDigitTimeOut.$jsonInputTimeOut.$jsonLimit.$jsonTerminator.$jsonStrip.$jsonPostUrl.$jsonDigits.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex;
    }
  }
    
}

?>