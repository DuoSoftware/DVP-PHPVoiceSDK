<?php

/**
 * @author achintha
 * @copyright 2014
 */

class QueueCall
{
   // private $file="TestRecord_1.wav";
    private $nexturl="http://192.168.1.195/IVR/end.php";
    //private $posturl="http://192.168.1.195/IVR/end.php";
    private $result="result_1234";
    private $skill="";
    private $profile="";
    
      
  /* "action": "ards",
  "nexturl": "http://localhost/IVR/end.json",
  "posturl": "http://localhost/IVR/end.json",
  "result": "result",
  "skill" : "123456",
  "profile": "TEST"
    
    */
    
  public function SetNextUrl($targetUrl)
        {
        
            if( !empty( $targetUrl ) )
        
                $this->nexturl = $targetUrl;
       
        }
   
   public function SetProfile($targetProfile)
        {        
            if( !empty( $targetProfile ) )
        
               $this->profile = $targetProfile;
        }
             
  public function SetResult($targetResult)
        {
        
            if( !empty( $targetResult ) )
        
               $this->result = $targetResult;
     
        }     
        
  public function SetSkill ($targetSkill)
        {
        
            if( !empty( $targetSkill ) )
        
                $this->skill = $targetSkill;
      
        }
        
      
  function GetResult()
  {
    try
    {
    $jsonStart='{';
    $jsonAction='"action": "ards",';
    $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
    $jsonProfile='"profile": "'.$this->profile.'",';
    $jsonResult='"result": "'.$this->result.'",';
    $jsonSkill='"skill": "'.$this->skill.'"';
    $jsonEnd='}';
    
    return $jsonStart.$jsonAction.$jsonNextUrl.$jsonProfile.$jsonResult.$jsonSkill.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex; 
    }
  }
    
}

?>