<?php

/**
 * @author achintha
 * @copyright 2014
 */

class VoiceMail
{
   // private $file="TestRecord_1.wav";
    private $nexturl="http://192.168.1.195/IVR/end.php";
    private $app="";
    private $result="result_1234";
    private $check="";
    private $authonly="";
    private $profile="";
    private $eventlog="false";
    private $domain="";
    private $id="";
    


    
    
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
        
  public function SetCheckAccount($targetCheckAccount)
        {
        
            if( !empty( $targetCheckAccount ) )
        
                $this->check = $targetCheckAccount;
        }
        
  public function SetAuthOnly($targetAuthOnly)
        {
        
            if( !empty( $targetAuthOnly ) )
        
                $this->authonly = $targetAuthOnly;

        }
        
  public function SetProfile($targetProfile)
        {
        
            if( !empty( $targetProfile) )
        
                $this->profile = $targetProfile;
        }
  public function SetEventLog($targetEventLog)
        {

            if( !empty( $targetEventLog ) )

                $this->eventlog = $targetEventLog;
        }
        
  public function SetDomain($targetDomain)
        {
        
            if( !empty( $targetDomain ) )
        
               $this->domain = $targetDomain;
        }
        
  public function SetVoiceMailId($targetVoiceMailId)
        {
        
            if( !empty( $targetVoiceMailId ) )
        
               $this->id = $targetVoiceMailId;
        }
        
        
  
    
  function GetResult()
  {
    try
    {
        $jsonStart='{';
        $jsonAction='"action": "voicemail",';
        $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
        $jsonApp='"app": "'.$this->app.'",';
        $jsonResult='"result": "'.$this->result.'",';
        $jsonCheck='"check": "'.$this->check.'",';
        $jsonAuthOnly='"authonly": "'.$this->authonly.'",';
        $jsonProfile='"profile": "'.$this->profile.'",';
	$jsonEventLog='"eventlog": "'.$this->eventlog.'",';
        $jsonDomain='"domain": "'.$this->domain.'",';
        $jsonId='"id": "'.$this->id.'"';
        $jsonEnd='}';
            
        return $jsonStart.$jsonAction.$jsonNextUrl.$jsonApp.$jsonResult.$jsonCheck.$jsonAuthOnly.$jsonProfile.$jsonEventLog.$jsonDomain.$jsonId.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex;
    }
  }
    
}

?>
