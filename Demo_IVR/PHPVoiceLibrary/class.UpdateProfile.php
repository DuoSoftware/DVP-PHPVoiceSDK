<?php

/**
 * @author achintha
 * @copyright 2014
 */


class UpdateProfile
{
   // private $file="TestRecord_1.wav";
    private $nexturl="http://localhost/IVR/end.php";
    private $result="result";
    private $params='{"Params_Test":"test"}';
    private $display="";
    private $key="";
    private $attribute="";
	private $value="";
    private $eventlog="false";
    private $company="103";
    private $tenant="1";
      
    
  public function SetNextUrl($targetUrl)
        {
        
            if( !empty( $targetUrl ) )
        
                $this->nexturl = $targetUrl;
       
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
		
   public function SetKey($targetKey)
        {

            if( !empty( $targetKey ) )

                $this->key = $targetKey;

        }
		
  
   public function SetAttribute($targetAttribute)
        {
        
            if( !empty( $targetAttribute ) )
        
                $this->attribute = $targetAttribute;
      
        }
   public function SetValue($targetValue)
        {
        
            if( !empty( $targetValue ) )
        
                $this->value = $targetValue;
      
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
    $jsonAction='"action": "updateprofile",';
    $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
    $jsonResult='"result": "'.$this->result.'",';
    $jsonParams='"params": '.$this->params.',';
    $jsonDisplay='"display": "'.$this->display.'",';
    $jsonKey='"key": "'.$this->key.'",';
    $jsonAttribute='"attribute": "'.$this->attribute.'",';
	$jsonValue='"value": "'.$this->value.'",';
    $jsonEventLog='"eventlog": "'.$this->eventlog.'",';
    $jsonCompany='"company": "'.$this->company.'",';
    $jsonTenant='"tenant": "'.$this->tenant.'"';
    $jsonEnd='}';
    
    return $jsonStart.$jsonAction.$jsonNextUrl.$jsonResult.$jsonParams.$jsonDisplay.$jsonKey.$jsonAttribute.$jsonValue.$jsonEventLog.$jsonCompany.$jsonTenant.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex; 
    }
  }
    
}

?>
