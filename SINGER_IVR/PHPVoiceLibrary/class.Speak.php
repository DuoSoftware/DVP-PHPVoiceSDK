<?php

/**
 * @author achintha
 * @copyright 2014
 */

class Speak
{
    private $file="Duo_IVR_Menu_1.wav";
    private $nexturl="http://192.168.1.195/IVR/end.php";
    private $app="";
    private $result="result_1234";
    private $errorFile="";
    private $digitTimeOut="5";
    private $inputTimeOut="10";
    private $loops="3";
    private $engine="";
    private $voice="English";
    private $terminator="*";
    private $strip="*";
    private $digits="9";
    private $maxdigits="";
    
     
    
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
        
  public function SetLoops($targetLoops)
        {
        
            if( !empty( $targetLoops ) )
        
               $this->loops = $targetLoops;
  
        }
  
  public function SetEngine($targetEngine)
        {
        
            if( !empty( $targetEngine ) )
        
               $this->engine = $targetEngine;
  
        }
        
  public function SetVoice($targetVoice)
        {
        
            if( !empty( $targetVoice ) )
        
                $this->voice = $targetVoice;
        }
        
        
  public function SetTerminator($targetTerminator)
        {
        
            if(!empty( $targetTerminator ) )
        
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
        $jsonAction='"action": "speak",';
        $jsonFile='"file": "'.$this->file.'",';
        $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
        $jsonApp='"app": "'.$this->app.'",';
        $jsonResult='"result": "'.$this->result.'",';
        $jsonErrorFile='"errorfile": "'.$this->errorFile.'",';
        $jsonDigitTimeOut='"digittimeout": "'.$this->digitTimeOut.'",';
        $jsonInputTimeOut='"inputtimeout": "'.$this->inputTimeOut.'",';
        $jsonLoops='"loops": "'.$this->loops.'",';
        $jsonEngine='"engine": "'.$this->engine.'",';
        $jsonVoice='"voice": "'.$this->voice.'",';
        $jsonTerminator='"terminator": "'.$this->terminator.'",';
        $jsonStrip='"strip": "'.$this->strip.'",';
        $jsonMaxDigits='"maxdigits": "'.$this->maxdigit.'",';
        $jsonDigits='"digits": "'.$this->digits.'"';
        $jsonEnd='}';
        
        return $jsonStart.$jsonAction.$jsonFile.$jsonNextUrl.$jsonApp.$jsonResult.$jsonErrorFile.$jsonDigitTimeOut.$jsonInputTimeOut.$jsonLoops.$jsonEngine.$jsonVoice.$jsonTerminator.$jsonStrip.$jsonDigits.$jsonMaxDigits.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex;
    }
  }
    
}

?>