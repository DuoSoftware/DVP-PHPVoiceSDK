<?php

/**
 * @author achintha
 * @copyright 2014
 */


class GetVar
{
    private $nexturl="http://localhost/IVR/end.php";
    private $name="3";
    private $permanent="1";
      
    
  public function SetNextUrl($targetUrl)
        {
        
            if( !empty( $targetUrl ) )
        
                $this->nexturl = $targetUrl;
       
        }
   
  public function SetName($targetName)
        {
        
            if( !empty( $targetName ) )
        
                $this->name = $targetName;
      
        }
  
   public function SetPermanent($targetPermanent)
        {
        
            if( !empty( $targetPermanent ) )
        
                $this->permanent = $targetPermanent;
      
        }
        
      
  function GetResult()
  {
    try
    {
    $jsonStart='{';
    $jsonAction='"action": "getvar",';
    $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
    $jsonName='"name": "'.$this->name.'",';
    $jsonPermanent='"permanent": "'.$this->permanent.'"';
    $jsonEnd='}';
    
    return $jsonStart.$jsonAction.$jsonNextUrl.$jsonName.$jsonPermanent.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex; 
    }
  }
    
}

?>
