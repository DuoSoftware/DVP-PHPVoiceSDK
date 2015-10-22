<?php

/**
 * @author achach
 * @copyright 2015
 */

 try
 {
    

 
include_once("WriteLog.php");
require_once("PHPVoiceLibrary/class.DialNumber.php");
require_once("PHPVoiceLibrary/class.DialExtension.php");
require_once("PHPVoiceLibrary/class.PlayFile.php");
//require_once("PHPVoiceLibrary/class.VoiceMail.php");
//require_once("PHPVoiceLibrary/class.RecordCall.php");
//require_once("PHPVoiceLibrary/class.UploadFile.php");
//require_once("PHPVoiceLibrary/class.RecordVoiceMessage.php");
//require_once("class.HolidayCalander.php");

$wrtLg = new WriteLog();
$objDialPbxNum = new DialPbxNumber();
//$objHolidayCalander = new HolidayCalander();

$calldata = json_decode($HTTP_RAW_POST_DATA,true);
$wrtLg->WriteFile("Dial.php  >>>>>>>>>>>321321>>>>>>>>>>>>> - ".$HTTP_RAW_POST_DATA." - ".date("Y-m-d H:i:s"));

$result= $calldata["result"];
$session = $calldata["session"];
$ani=$calldata["ani"];
$dnis=$calldata["dnis"];
$callerdirection=$calldata["direction"];
$calleridname=$calldata["name"];

$wrtLg->WriteFile("Dial.php \t result \t - ".$result." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("Dial.php \t session \t - ".$session." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("Dial.php \t ani \t - ".$ani." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("Dial.php \t dnis \t - ".$dnis." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("Dial.php \t callerdirection \t - ".$callerdirection." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("Dial.php \t calleridname \t - ".$calleridname." - ".date("Y-m-d H:i:s"));



$wrtLg->WriteFile("Dial.php >>>>>>>>>>>>>>>>>>>>>>>> -  - ".date("Y-m-d H:i:s"));
//print('{"action": "dial","context": "TestInternalPbx", "nexturl": "http://45.55.142.207:3333/IVR/Hangup.php", "dialplan": "XML", "callername": "1000", "callernumber" : "1000", "number" : "pbx/TestInternalPbx/2001"}');

$time= date("H.i");
/*if( (9.00<$time) && ($time<20.30))
{
    print(date("H:i:s"));
}
*/

$result = $objDialPbxNum->ProcessDigits($result,$session,$ani,$dnis,$callerdirection,$calleridname,$time);
$wrtLg->WriteFile("DialPbxNumber \t Dial.php \t -".$result."  - ".date("Y-m-d H:i:s"));
print ($result);

 }
 catch(exception $ex)
 {
  $wrtLg->WriteFile("DialPbxNumber \t catch \t -".$ex."  - ".date("Y-m-d H:i:s"));  
 }

//ExceptionThrower::stop();

Class DialPbxNumber
{   
 
  
    function ProcessDigits($result,$session,$ani,$dnis,$callerdirection,$calleridname,$time)
        { 
            $wrtLg = new WriteLog();
                       
            try
            {
             
               
               /////////////////////////////////////////start point/////////////////////////
               
                 switch ($result)
                        {
                            case 0:
                                //$string = $this->PlayVoiceFilevoice("cargills/ivr-transferoperator.wav","http://45.55.142.207:3333/cargillsIVR/Dial.php",$result);
                                //$wrtLg->WriteFile("ProcessIVR>>>>>>>>>>>case 0 >>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                                //return $string;
                                
                                $string = $this->DirectDialExtension("http://45.55.142.207:3333/cargillsIVR/end.php","136_143_Cargills","XML",$ani,$ani,"700");
                                $wrtLg->WriteFile("Dial>>>>>>>>>>>case 0 >>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                                return $string;
                               // $string = $this->DirectDial("http://45.55.142.207:3333/cargillsIVR/end.php","155_156_lf","XML",$ani,$ani,"0112699557");        
                               //$wrtLg->WriteFile("ProcessIVR>>>>>>>>>>>case 0 >>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                              //
                            
                            break;
                            
                           
                            
                            default:
                               // $string = $this->DialExtension("http://45.55.142.207:3333/cargillsIVR/end.php","136_143_Cargills","XML",$ani,$ani,$result);
                                $wrtLg->WriteFile("Dial>>>>>>>>>>>case 0 >>>>>>>>> - Default  - ".date("Y-m-d H:i:s"));
                               // return $string;
                        }
                               
            }
            catch(exception $ex)
            {
                $wrtLg->WriteFile("ProcessIVR>>>>>>>>>>> catch ----  >>>>>>>>> -".$ex."  - ".date("Y-m-d H:i:s"));
                return $ex;
            }
            
        }
    
    
    function DirectDialExtension($nexturl,$context,$dialplan,$callername,$callernumber,$number)
        {
            try
             {
                $dialNum = new DialExtension();
                
                $dialNum->SetNextUrl($nexturl);
                $dialNum->SetContext($context);
                $dialNum->SetDialplan($dialplan);
                $dialNum->SetCallerName($callername);
                $dialNum->SetCallerNumber($callernumber);
                $dialNum->SetNumber($number);
                 
                $result = $dialNum->GetResult();
                return $result;
             
             }
            catch(exception $ex)
             {
                return $ex;
             }         
        }
        
  
    
}


?>

