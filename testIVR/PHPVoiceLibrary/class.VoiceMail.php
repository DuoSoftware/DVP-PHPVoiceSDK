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
    private $params="Params_Test";
    private $check="";
    private $authonly="";
    private $profile="";
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
  
 public function SetParams($targetParams)
        {
            if( !empty( $targetParams ) )

               $this->params = $targetParams;
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
        $jsonParams='"params": '.$this->params.',';
        $jsonCheck='"check": "'.$this->check.'",';
        $jsonAuthOnly='"authonly": "'.$this->authonly.'",';
        $jsonProfile='"profile": "'.$this->profile.'",';
        $jsonDomain='"domain": "'.$this->domain.'",';
        $jsonId='"id": "'.$this->id.'"';
        $jsonEnd='}';
            
        return $jsonStart.$jsonAction.$jsonNextUrl.$jsonApp.$jsonResult.$jsonParams.$jsonCheck.$jsonAuthOnly.$jsonProfile.$jsonDomain.$jsonId.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex;
    }
  }
    
}

?>