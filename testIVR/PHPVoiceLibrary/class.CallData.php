<?php

/**
 * @author achintha
 * @copyright 2014
 */

class ContinueCall
{
   // private $file="TestRecord_1.wav";
    private $session="";
    private $direction="";
    private $ani="";
    private $dnis="";
    private $name="";
    private $result="result_1234";
    private $params='{"Params_Test":"test"}';

    
  public function SetSession($targetSession)
        {
        
            if( !empty( $targetSession ) )
        
               $this->session = $targetSession;
       
        }
   
  public function SetDirection($targetDirection)
        {        
            if( !empty( $targetDirection ) )
        
               $this->direction = $targetDirection;
        }
        
  public function SetAni($targetAni)
        {        
            if( !empty( $targetAni ) )
        
               $this->ani = $targetAni;
        }
        
  public function SetDnis($targetDnis)
        {        
            if( !empty( $targetDnis ) )
        
               $this->dnis = $targetDnis;
        }
        
  public function SetName($targetName)
        {        
            if( !empty( $targetName ) )
        
               $this->name = $targetName;
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
         
      
  function GetResult()
  {
    try
    {
        $jsonStart='{';
        $jsonSession='"session": "'.$this->session.'",';
        $jsonDirection='"direction": "'.$this->direction.'",';
        $jsonAni='"ani": "'.$this->ani.'",';
        $jsonDnis='"dnis": "'.$this->dnis.'",';
        $jsonName='"name": "'.$this->name.'",';
        $jsonParams='"params": '.$this->params.',';
        $jsonResult='"result": "'.$this->result.'"';
        $jsonEnd='}';
        
        return $jsonStart.$jsonSession.$jsonDirection.$jsonAni.$jsonDnis.$jsonName.$jsonParams.$jsonResult.$jsonEnd;
    }
    catch(exception $ex)
    {
        return $ex;
    }
  }
    
}

?>