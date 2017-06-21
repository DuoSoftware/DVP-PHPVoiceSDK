<?php

/**
 * @author achintha
 * @copyright 2014
 */

class Say
{
    private $file="Duo_IVR_Menu_1.wav";
    private $nexturl="http://192.168.1.195/IVR/end.php";
    private $app="";
    private $result="result_1234";
    private $params='{"Params_Test":"test"}';
    private $display="DEFAULT";
    private $errorFile="";
    private $digitTimeOut="5";
    private $inputTimeOut="10";
    private $loops="3";
    private $language="english";
    private $type="English";
    private $method="";
    private $gender="";
    private $terminator="*";
    private $strip="*";
    private $digits="9";
    private $eventlog=false;
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
        
  public function SetErrorFile($targetErrorFile)
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
        
  public function SetLoops($targetLoops)
        {
        
            if( !empty( $targetLoops ) )
        
                $this->loops = $targetLoops;
        }
  
  public function SetLanguage($targetLanguage)
        {
        
            if( !empty( $targetLanguage ) )
        
                $this->language = $targetLanguage;
  
        }
        
  public function SetType($targetType)
        {
        
            if( !empty( $targetType ) )
        
                $this->type = $targetType;
  
        }
        
   public function SetMethod($targetMethod)
        {
        
            if( !empty( $targetMethod ) )
        
                $this->method = $targetMethod;
  
        }
        
    public function SetGender($targetGender)
        {
        
            if( !empty( $targetGender ) )
        
                $this->gender = $targetGender;

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
        
   public function SetEventLog($targetEventLog)
        {

            if( !empty( $targetEventLog ) )

                $this->eventlog = $targetEventLog;
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
        $jsonAction='"action": "say",';
        $jsonFile='"file": "'.$this->file.'",';
        $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
        $jsonApp='"app": "'.$this->app.'",';
        $jsonParams='"params": '.$this->params.',';
        $jsonDisplay='"display": "'.$this->display.'",';
        $jsonResult='"result": "'.$this->result.'",';
        $jsonErrorFile='"errorfile": "'.$this->errorFile.'",';
        $jsonDigitTimeOut='"digittimeout": "'.$this->digitTimeOut.'",';
        $jsonInputTimeOut='"inputtimeout": "'.$this->inputTimeOut.'",';
        $jsonLoops='"loops": "'.$this->loops.'",';
        $jsonLanguage='"language": "'.$this->language.'",';
        $jsonType='"type": "'.$this->type.'",';
        $jsonMethod='"method": "'.$this->method.'",';
        $jsonGender='"gender": "'.$this->gender.'",';
        $jsonTerminator='"terminator": "'.$this->terminator.'",';
        $jsonStrip='"strip": "'.$this->strip.'",';
        $jsonMaxDigits='"maxdigits": "'.$this->maxdigit.'",';
        $jsonEventLog='"eventlog": "'.$this->eventlog.'",';
        $jsonDigits='"digits": "'.$this->digits.'"';
        $jsonEnd='}';
        
        return $jsonStart.$jsonAction.$jsonFile.$jsonNextUrl.$jsonApp.$jsonParams.$jsonDisplay.$jsonResult.$jsonErrorFile.$jsonDigitTimeOut.$jsonInputTimeOut.$jsonLoops.$jsonLanguage.$jsonType.$jsonMethod.$jsonGender.$jsonTerminator.$jsonStrip.$jsonEventLog.$jsonMaxDigits.$jsonDigits.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex;
    }
  }
    
}

?>
