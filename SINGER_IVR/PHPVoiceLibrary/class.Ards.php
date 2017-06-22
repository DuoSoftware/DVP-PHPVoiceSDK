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
    private $skill="3";
    private $skillDisplay="3";
    private $display="";
    private $profile="TEST";
    private $priority="0";
    private $company="3";
    private $tenant="1";
    private $eventlog=false;
    private $note="note";
      
    
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

  public function SetDisplay($targetDisplay)
        {

            if( !empty( $targetDisplay ) )

                $this->display = $targetDisplay;

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
   public function SetEventLog($targetEventLog)
        {

            if( !empty( $targetEventLog ) )

                $this->eventlog = $targetEventLog;
        }

   public function SetNote($targetNote)
        {

            if( !empty( $targetNote ) )

                $this->note = $targetNote;

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
    $jsonSkill='"skill": "'.$this->skill.'",';
    $jsonSkillDisplay='"skilldisplay": "'.$this->skillDisplay.'",';
    $jsonDisplay='"display": "'.$this->display.'",';
    $jsonProfile='"profile": "'.$this->profile.'",';
    $jsonPriority='"priority": "'.$this->priority.'",';
    $jsonCompany='"company": "'.$this->company.'",';
    $jsonTenant='"tenant": "'.$this->tenant.'",';
    $jsonEventLog='"eventlog": '.$this->eventlog.',';
    $jsonNote='"note": "'.$this->note.'"';
    $jsonEnd='}';
    
    return $jsonStart.$jsonAction.$jsonNextUrl.$jsonPostUrl.$jsonResult.$jsonSkill.$jsonSkillDisplay.$jsonDisplay.$jsonProfile.$jsonPriority.$jsonCompany.$jsonTenant.$jsonEventLog.$jsonNote.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex; 
    }
  }
    
}

?>
