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
    private $skill="3,10";
	private $skillDisplay="DEFAULT";
    private $profile="TEST";
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
    $jsonSkill='"skill": "'.$this->skill.'",';
	$jsonSkillDisplay='"skilldisplay": "'.$this->skillDisplay.'",';
    $jsonProfile='"profile": "'.$this->profile.'",';
    $jsonCompany='"company": "'.$this->company.'",';
    $jsonTenant='"tenant": "'.$this->tenant.'"';
    $jsonEnd='}';
    
    return $jsonStart.$jsonAction.$jsonNextUrl.$jsonPostUrl.$jsonResult.$jsonSkill.$jsonSkillDisplay.$jsonProfile.$jsonCompany.$jsonTenant.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex; 
    }
  }
    
}

?>