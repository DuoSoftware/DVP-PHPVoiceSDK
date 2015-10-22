<?php

/**
 * @author achintha
 * @copyright 2014
 */
include 'DBHandler.php';
include_once("WriteLog.php");

class ProcessIVR
{
   
    //var $digit;
    
    function ProcesssIVR($digit,$sessionid,$ani,$dnis,$callerdirection,$calleridname)
        {
            $dbh= new DBHandler();
            $wrtLg = new WriteLog();
          try
          {
            
       /*     if($digit='invalid')
            {
                
               $hangup ='{"action": "hangup","cause": "NORMAL_CLEAN","nexturl": "http://localhost/IVR/hangup.json"}';
               $wrtLg->WriteFile("start-ProcessIVR--IF---- - ".$hangup." - ".date("Y-m-d H:i:s"));
               return $hangup;
            }
            */
        
        
        switch ($digit) 
            { 
                //id, sessionid, ani, dnis, callerdirection, calleridname, floor, floorlocation
              case "*":
              $sql="select `sessionid`,`floorlocation` from `ivrfloor` where `sessionid`='".$sessionid."'";
                $val=$dbh->getResult($sql);
                if($val)
                {
                    //read xml and return value
                    
                  // print_r($val."<br/>");
                    
                    $sessionid=$val[0]['sessionid'];
                    $location = $val[0]['floorlocation'];
                    $level=explode('_',$location);
                    $count=count(explode('_',$val[0]['floorlocation']));
                    // print($count."<br/>");
                    //print_r($level."<br/>");
                    //$level=substr($level[$count],1)-1;
        //------------------------------------remove last element of level for 2 times [L1,D1,L2,D2]----------------------
                    if ($count>3)
                    {
                        array_pop($level);
                        array_pop($level);
                        //print_r($level);
                        
                        $node=implode("_",$level);
                        //print("<br/>".$node);
            //----------------------------------READ XML AND RETURN JSON OBJECT-----------------------
                        $xml = simplexml_load_file('ivr.XML');
                        $nodeVal= $xml->$node;
                        $json = json_encode($nodeVal);
                        //print($json);
                        return $json;
                    }
                    else
                    {
                        //print("invalide node");
                        
                        $hangup =' {"action": "hangup","cause": "NORMAL_CLEAN","nexturl": "http://localhost/IVR/hangup.json"}';
                        //$startValAry=explode(",",$str);

                        //$object = (object) $startValAry;
                       //return json_encode($object);
                       return $hangup;
                    }
               
                    
                }
              
              
              break;
              
              case "#":
              break;


             default:

                $sql="select `sessionid`,`floorlocation` from `ivrfloor` where `sessionid`='".$sessionid."'";
                $val=$dbh->getResult($sql);
                if($val)
                {
                    //read xml and return value
                    
                    print_r($val."<br/>");
                    
                    $sessionid=$val[0]['sessionid'];
                    $location = $val[0]['floorlocation'];
                    $level=explode('_',$location);
                    $count=count(explode('_',$val[0]['floorlocation']))-2;
                    // print($count."<br/>");
                    //print_r($level."<br/>");
                    $level=substr($level[$count],1)+1;
                    //print($level);
                    $floorlocation =$location."_L".$level."_D";
                    $checkNodeValue=$this->checkNodeInIVRFile($floorlocation,$digit);
                    
                    
                  //  print($location."<br/>");
                  //  print($floorlocation."<br/>"); 
                  // print($checkNodeValue);
                  //-------------------------------------------get values from XML |conf file  ------------------------------------------------------------------
        
                    if($checkNodeValue!="")
                    {
                      // $json = json_encode($checkNodeValue);
                   //////////////////////////////////////////////////////   
                       //print($json);
                   //put floorlocation for the DB    
                        $sql="UPDATE ivrfloor SET floor='".$location."_L".$level."_D".$digit."', floorlocation='".$location."_L".$level."_D".$digit."' WHERE sessionid='".$sessionid."'";
                        $result=$dbh->execute($sql);
                       // print($result);
                      // return $json;
                      
                        $wrtLg->WriteFile("ProcessIVR - ".$checkNodeValue." - ".date("Y-m-d H:i:s"));
                        
                      return $checkNodeValue;
                    }
                    else
                    {
                        //print("play wrong digit");
                        $hangup =' {"action": "hangup","cause": "NORMAL_CLEAN","nexturl": "http://localhost/IVR/hangup.json"}';
                        //$startValAry=explode(",",$str);

                        //$object = (object) $startValAry;
                        //return json_encode($object);

                        $wrtLg->WriteFile("ProcessIVR - ".$hangup." - ".date("Y-m-d H:i:s"));
                        return $hangup;
                    }
                   
                    }
                else
                {
                    $checkNodeValue=$this->checkNodeInIVRFile('L1_D',$digit);
                    if($checkNodeValue!="")
                    {
                     // $json = json_encode($checkNodeValue);
                     
                     /////////////////////////////////////////////////
                      //print($json);  
                     //put floorlocation for the DB   
                     
                     $date=date("Y-m-d H:i:s");
                     
                     
                     
                        $sql="insert into `ivrfloor` (`sessionid`, `ani`, `dnis`, `callerdirection`, `calleridname`, `floor`, `floorlocation`,`starttime`) values ('".$sessionid."','".$ani."','".$dnis."','". $callerdirection."','". $calleridname."','L1_D".$digit."','L1_D".$digit."','".$date."')";
                      //  $wrtLg = new WriteLog();
                        $wrtLg->WriteFile("SQLLLLLL - ".$sql." - ".date("Y-m-d H:i:s"));
                        
                        $val = $dbh->execute($sql);
                      if($val>0)
                      {
                        //print($json);
                        //return $json;
                        $wrtLg->WriteFile("---------------VAL------------- - ".$val." - ".date("Y-m-d H:i:s"));
                        $wrtLg->WriteFile("ProcessIVR - ".$checkNodeValue." - ".date("Y-m-d H:i:s"));
                        
                        return $checkNodeValue;
                      }  
                    }
                    else
                    {
                        //print("play wrong digit");
                        $hangup =' {"action": "hangup","cause": "NORMAL_CLEAN","nexturl": "http://localhost/IVR/hangup.json"}';
                       // $startValAry=explode(",",$str);

                        $wrtLg->WriteFile("ProcessIVR - ".$hangup." - ".date("Y-m-d H:i:s"));
                        
                        //$object = (object) $startValAry;
                        //return json_encode($object);
                        return $hangup;
                    }
                   
                }
   
            }
         }
         catch (Exception $ex)
       {
          
        //$dbc->rollbackTransaction();
        $result=0;
        
         $wrtLg->WriteFile("Catch Error - ".$ex." - ".date("Y-m-d H:i:s"));
       }
    }
    
    
  private function checkNodeInIVRFile($Node,$digit)
    {
        $wrtLg = new WriteLog();
       try
       {
         
       
         $xml = simplexml_load_file('ivr.XML');
         $startLocation=$Node.$digit;
         $wrtLg->WriteFile(">>>>>XML>>>>>> - ".$startLocation." - ".date("Y-m-d H:i:s"));
         $wrtLg->WriteFile(">>>>>XML>>>>>> - ".$Node.$digit." - ".date("Y-m-d H:i:s"));
         $val= $xml->$startLocation;
            if($val)
            {
                $wrtLg->WriteFile(">>>>>XML<<<<IF >>>>>> - ".$startLocation." - ".date("Y-m-d H:i:s"));
                $wrtLg->WriteFile(">>>>>XML<<<<IF >>>>>> - ".$val." - ".date("Y-m-d H:i:s"));
             return $val;   
            }
            else
            {
             return "";   
            }
       }
       catch(Exception $ex)
       {
        $wrtLg->WriteFile("Catch Error - ".$ex." - ".date("Y-m-d H:i:s"));
       }
        
    }
}


?>