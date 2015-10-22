<?php

/**
 * @author achintha
 * @copyright 2014
 */
 
//ExceptionThrower::start();
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
$objProcesIvr = new ProcessIVR();
//$objHolidayCalander = new HolidayCalander();

$calldata = json_decode($HTTP_RAW_POST_DATA,true);
$wrtLg->WriteFile("Process.php  >>>>>>>>>>>321321>>>>>>>>>>>>> - ".$HTTP_RAW_POST_DATA." - ".date("Y-m-d H:i:s"));

$result= $calldata["result"];
$session = $calldata["session"];
$ani=$calldata["ani"];
$dnis=$calldata["dnis"];
$callerdirection=$calldata["direction"];
$calleridname=$calldata["name"];

$wrtLg->WriteFile("Process.php \t result \t - ".$result." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("Process.php \t session \t - ".$session." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("Process.php \t ani \t - ".$ani." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("Process.php \t dnis \t - ".$dnis." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("Process.php \t callerdirection \t - ".$callerdirection." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("Process.php \t calleridname \t - ".$calleridname." - ".date("Y-m-d H:i:s"));



$wrtLg->WriteFile("Process.php >>>>>>>>>>>>>>>>>>>>>>>> -  - ".date("Y-m-d H:i:s"));
//print('{"action": "dial","context": "TestInternalPbx", "nexturl": "http://172.20.112.9/IVR/Hangup.php", "dialplan": "XML", "callername": "1000", "callernumber" : "1000", "number" : "pbx/TestInternalPbx/2001"}');

$time= date("H.i");
/*if( (9.00<$time) && ($time<20.30))
{
    print(date("H:i:s"));
}
*/

$result = $objProcesIvr->ProcessDigits($result,$session,$ani,$dnis,$callerdirection,$calleridname,$time);
$wrtLg->WriteFile("ProcessIVR \t Process.php \t -".$result."  - ".date("Y-m-d H:i:s"));
print ($result);

 }
 catch(exception $ex)
 {
  $wrtLg->WriteFile("ProcessIVR \t catch \t -".$ex."  - ".date("Y-m-d H:i:s"));  
 }

//ExceptionThrower::stop();

Class ProcessIVR
{   
 
  
    function ProcessDigits($result,$session,$ani,$dnis,$callerdirection,$calleridname,$time)
        { 
            $wrtLg = new WriteLog();
                       
            try
            {
             
               
               /////////////////////////////////////////start point/////////////////////////
               
                if(strlen($result)==1)
                {       
                    switch ($result)
                        {
                            case 0:
                                $string = $this->PlayVoiceMessageFile("cargills/ivr-transferoperator.wav","http://45.55.142.207:3333/cargillsIVR/Dial.php",$result);
                                $wrtLg->WriteFile("ProcessIVR>>>>>>>>>>>case 0 >>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                                return $string;
                                
                                //$string = $this->DirectDial("http://172.20.112.9/PremadasaGemsIVR/end.php","155_156_lf","XML",$ani,$ani,"0112699557");        
                                //$wrtLg->WriteFile("ProcessIVR>>>>>>>>>>>case 0 >>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                                //return $string;
                            
                            break;
                            
                                                        
                            default:
                                $string = $this->PlayVoiceMessageFile("cargillsIVR/ivr-cargills_invalid_extension.wav","","");
                                $wrtLg->WriteFile("ProcessIVR>>>>>>>>>>>extension num count != 1 >>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                                return $string;
                        }
                    
                   

                }
                elseif(strlen($result)==3)
                {
                    if( substr_compare($result,7,0,1) == 0)
                    {
                        // $string = $this->PlayVoiceFilevoice("cargills/ivr-transferextension.wav","http://172.20.112.9/cargillsIVR/Dial.php",$result);
                        $string = $this->DialExtension("http://45.55.142.207:3333/cargillsIVR/end.php","136_143_Cargills","XML",$ani,$ani,$result);
                        $wrtLg->WriteFile("ProcessIVR>>>>>>>>>>>extension >>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                        return $string;
                    }
                    else
                    {
                        $string= '{"action": "hangup","cause": "NORMAL_CLEAN","nexturl": "http://45.55.142.207:3333/cargillsIVR/end.php"}';
                        $wrtLg->WriteFile("ProcessIVR>>>>>>>>>>>extension is not 7XX >>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                        return $string;
                    }
                }
                    
                else
                {
                    //$string = $this->PlayFile("http://172.20.112.9/DuoIVR/end.php","TestInternalPbx","XML","1000","1000",$result);
                    $string= '{"action": "hangup","cause": "NORMAL_CLEAN","nexturl": "http://45.55.142.207:3333/cargillsIVR/end.php"}';
                    $wrtLg->WriteFile("ProcessIVR>>>>>>>>>>>extension num count != 3 >>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                     //   $filename=$ani."_".$dnis."-".$d."-".$time.".wav";
                      //  $string = $this->RecordMessage("filename.wav","http://172.20.112.9/DuoIVR/end.php","result_12","","5","10","3000","","","http://172.20.112.9/DuoIVR/upload.php","9");
                      //  $wrtLg->WriteFile("ProcessIVR>>>>>>>>>>> case 3 ---- else >>RecordMessage>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                     //   $wrtLg->WriteFile("ProcessIVR>>>>>>>>>>> case 3 ---- else >>RecordMessage>>>>>>> ".date("Y-m-d H:i:s"));
                            // return '{"action": "hangup","cause": "NORMAL_CLEAN","nexturl": ""}';
                        return $string;
                } 
               
            }
            catch(exception $ex)
            {
                $wrtLg->WriteFile("ProcessIVR>>>>>>>>>>> catch ----  >>>>>>>>> -".$ex."  - ".date("Y-m-d H:i:s"));
                return $ex;
            }
            
        }
      
           
     function PlayVoiceMessageFile($file,$nexturl,$result) 
        {
        try
            {
                $playFile = new PlayFile();
                $playFile->SetFile($file);
                $playFile->SetNextUrl($nexturl);
                $playFile->SetResult($result);
                
                $result= $playFile->GetResult();
                return $result;
            }
        catch (exception $ex)
            {
               return $ex; 
            }
       }   
    
     function DialExtension($nexturl,$context,$dialplan,$callername,$callernumber,$number)
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
