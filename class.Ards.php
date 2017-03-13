<?php

/**
 * @author achintha
 * @copyright 2014
 */


class Ards
{
   // private $file="TestRecord_1.wav";
    private $nexturl="http://localhost/IVR/end.php";
    private $posturl="http://localhost/IVR/end.php";
    private $result="result";
    private $params='{"Params_Test":"test"}';
    private $display="DEFAULT";
    private $skill="3,10";
	private $skillDisplay="DEFAULT";
    private $profile="TEST";
	private $priority="0";
    private $eventlog=false;
    private $company="3";
    private $tenant="1";
      
    
  public function SetNextUrl($targetUrl)
        {
        
            if( !empty( $targetUrl ) )
        
                $this->nexturl = $targetUrl;
       
        }
   
   public function SetPostUrl($targetPostUrl)
        {        
            if( !empty( $targetPostUrl ) )
        
               $this->posturl = $targetPostUrl;
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
        
  public function SetSkill($targetSkill)
        {
        
            if( !empty( $targetSkill ) )
        
                $this->skill = $targetSkill;
      
        }
		
  public function SetSkillDisplay($targetSkillDisplay)
        {

            if( !empty( $targetSkillDisplay ) )

                $this->skillDisplay = $targetSkillDisplay;

        }

  
   public function SetProfile($targetProfile)
        {
        
            if( !empty( $targetProfile ) )
        
                $this->profile = $targetProfile;
      
        }
		
	   public function SetPriority($targetPriority)
        {
        
            if( !empty( $targetPriority ) )
        
                $this->priority = $targetPriority;
      
        }
        
   public function SetEventLog($targetEventLog)
        {

            if( !empty( $targetEventLog ) )

                $this->eventlog = $targetEventLog;
        }
  
   public function SetCompany($targetCompany)
        {
        
            if( !empty( $targetCompany ) )
        
                $this->company = $targetCompany;
      
        }
  
   public function SetTenant($targetTenant)
        {
        
            if( !empty( $targetTenant ) )
        
                $this->tenant = $targetTenant;
      
        }
        
      
  function GetResult()
  {
    try
    {
    $jsonStart='{';
    $jsonAction='"action": "ards",';
    $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
    $jsonPostUrl='"posturl": "'.$this->posturl.'",';
    $jsonResult='"result": "'.$this->result.'",';
    $jsonParams='"params": '.$this->params.',';
    $jsonDisplay='"display": "'.$this->display.'",';
    $jsonSkill='"skill": "'.$this->skill.'",';
	$jsonSkillDisplay='"skilldisplay": "'.$this->skillDisplay.'",';
    $jsonProfile='"profile": "'.$this->profile.'",';
	$jsonPriority='"priority": "'.$this->priority.'",';
    $jsonEventLog='"eventlog": "'.$this->eventlog.'",';
    $jsonCompany='"company": "'.$this->company.'",';
    $jsonTenant='"tenant": "'.$this->tenant.'"';
    $jsonEnd='}';
    
    return $jsonStart.$jsonAction.$jsonNextUrl.$jsonPostUrl.$jsonResult.$jsonParams.$jsonDisplay.$jsonSkill.$jsonSkillDisplay.$jsonProfile.$jsonPriority.$jsonEventLog.$jsonCompany.$jsonTenant.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex; 
    }
  }
    
}

?>