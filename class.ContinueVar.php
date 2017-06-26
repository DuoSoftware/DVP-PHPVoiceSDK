<?php

/**
 * @author achintha
 * @copyright 2014
 */


class SetVar
{
   // private $file="TestRecord_1.wav";
    private $nexturl="http://localhost/IVR/end.php";
    private $result="result";
    private $params='{"Params_Test":"test"}';
    private $key="";
    private $attribute="";
      
    
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
		
     
  function GetResult()
  {
    try
    {
    $jsonStart='{';
    $jsonAction='"action": "continue",';
    $jsonNextUrl='"nexturl": "'.$this->nexturl.'",';
    $jsonResult='"result": "'.$this->result.'",';
    $jsonParams='"params": '.$this->params.',';
    $jsonKey='"key": "'.$this->key.'",';
	$jsonAttribute='"attribute": "'.$this->attribute.'"';
    $jsonEnd='}';
    
    return $jsonStart.$jsonAction.$jsonNextUrl.$jsonResult.$jsonParams.$jsonKey.$jsonAttribute.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex; 
    }
  }
    
}

?>