<?php

/**
 * @author achintha
 * @copyright 2014
 */

class PlayFileAndGetDigits
{
    private $file="Duo_IVR_Menu_1.wav";
    private $nexturl="http://192.168.1.195/IVR/end.php";
    private $app="";
    private $result="result_1234";
    private $params="Params_Test";
    private $errorFile="";
    private $digitTimeOut="5";
    private $inputTimeOut="10";
    private $loops="3";
    private $terminator="*";
    private $strip="*";
    private $maxdigit="";
    private $digits="9";
    private $skillDisplay="DEFAULT";
    
    
     
    
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
        
   public function SetMaxDigits($targetMaxDigits)
        {       
            if( !empty( $targetMaxDigits ) )
        
                $this->maxdigit = $targetMaxDigits;
        }
   public function SetDigits($targetDigits)
        {
            if( !empty( $targetDigits ) )
        
                $this->digits = $targetDigits;
        }
        
   public function SetSkillDisplay($targetSkillDisplay)
        {

            if( !empty( $targetSkillDisplay ) )

                $this->skillDisplay = $targetSkillDisplay;

        }

        
 
    
  function GetResult()
  {
    try
    { 
        $jsonStart='{';
        $jsonAction='"action": "playandgetdigits",';
        $jsonFile='"file": "'.$this->file.'",';
        $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
        $jsonApp='"app": "'.$this->app.'",';
        $jsonResult='"result": "'.$this->result.'",';
        $jsonParams='"params": '.$this->params.',';
        $jsonErrorFile='"errorfile": "'.$this->errorFile.'",';
        $jsonDigitTimeOut='"digittimeout": "'.$this->digitTimeOut.'",';
        $jsonInputTimeOut='"inputtimeout": "'.$this->inputTimeOut.'",';
        $jsonLoops='"loops": "'.$this->loops.'",';
        $jsonTerminator='"terminator": "'.$this->terminator.'",';
        $jsonStrip='"strip": "'.$this->strip.'",';
        $jsonMaxDigits='"maxdigits": "'.$this->maxdigit.'",';
        $jsonSkillDisplay='"skilldisplay": "'.$this->skillDisplay.'",';
        $jsonDigits='"digits": "'.$this->digits.'"';
        
        $jsonEnd='}';
        
        return $jsonStart.$jsonAction.$jsonFile.$jsonNextUrl.$jsonApp.$jsonResult.$jsonParams.$jsonErrorFile.$jsonDigitTimeOut.$jsonInputTimeOut.$jsonLoops.$jsonTerminator.$jsonStrip.$jsonSkillDisplay.$jsonMaxDigits.$jsonDigits.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex;
    }    
  }
    
}

?>
