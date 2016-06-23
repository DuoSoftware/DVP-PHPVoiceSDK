<?php
 
//ExceptionThrower::start();
 try
 {
    
	include_once("WriteLog.php");
	require_once("config.php");
	require_once("PHPVoiceLibrary/class.DialNumber.php");
	//require_once("PHPVoiceLibrary/class.DialExtension.php");
	require_once("PHPVoiceLibrary/class.PlayFile.php");
	require_once("PHPVoiceLibrary/class.PlayFileAndGetDigits.php");
	require_once("PHPVoiceLibrary/class.Ards.php");
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
	
	$wrtLg->WriteFile("ProcessStartMenu.php \t result \t - ".$result." - ".date("Y-m-d H:i:s"));
	$wrtLg->WriteFile("ProcessStartMenu.php \t session \t - ".$session." - ".date("Y-m-d H:i:s"));
	$wrtLg->WriteFile("ProcessStartMenu.php \t ani \t - ".$ani." - ".date("Y-m-d H:i:s"));
	$wrtLg->WriteFile("ProcessStartMenu.php \t dnis \t - ".$dnis." - ".date("Y-m-d H:i:s"));
	$wrtLg->WriteFile("ProcessStartMenu.php \t callerdirection \t - ".$callerdirection." - ".date("Y-m-d H:i:s"));
	$wrtLg->WriteFile("ProcessStartMenu.php \t calleridname \t - ".$calleridname." - ".date("Y-m-d H:i:s"));



	$wrtLg->WriteFile("ProcessStartMenu.php >>>>>>>>>>>>>>>>>>>>>>>> -  - ".date("Y-m-d H:i:s"));


	$time= date("H.i");
/*if( (9.00<$time) && ($time<20.30))
{
    print(date("H:i:s"));
}
*/

	$folder=substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'],"/")+1);
	$nextPath="http://".$GLOBALS['host'].":".$GLOBALS['port'].$folder;
	$context=$GLOBALS['context'];



	$result = $objProcesIvr->ProcessDigits($result,$session,$ani,$dnis,$callerdirection,$calleridname,$time,$nextPath,$context);
	$wrtLg->WriteFile("ProcessIVR \t ProcessStartMenu.php \t -".$result."  - ".date("Y-m-d H:i:s"));
	print ($result);

 }
 catch(exception $ex)
 {
	$wrtLg->WriteFile("ProcessStartMenuIVR \t catch \t -".$ex."  - ".date("Y-m-d H:i:s"));  
 }

//ExceptionThrower::stop();

Class ProcessIVR
{   
 
  
    function ProcessDigits($result,$session,$ani,$dnis,$callerdirection,$calleridname,$time,$nextPath,$context)
        { 
            $wrtLg = new WriteLog();
			                       
            try
            {
			               
                if(strlen($result)==1)
                {       
                    switch ($result)
                        {
                            case 1:
				// CLIENT SUPPORT
	                        $nextFile="Hangup.php";
                                $string = $this-> SetArds($nextFile,"http://localhost/IVR/end.json","result","34","HOLD_1","3","1");
				//$string = $this-> SetArds($nextFile,"http://localhost/IVR/end.json","result","ATTRIBUTE_ID","HOLD_MUSIC_NAME","VAR_1","VAR_2");
                                //$string = $this->DirectDial($nextFile,$context,"XML",$ani,$ani,"2002");
		                $wrtLg->WriteFile("ProcessStartMenuIVR>>>>>>>>>>>case 1 >>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
		                return $string;
                            break;
                            
                            case 2:
				//PROJECT AND IMPLEMENTATION		
        	                $nextFile="Hangup.php";
                                //$string = $this->DirectDial($nextFile,$context,"XML",$ani,$ani,"2001");
                                $string = $this->SetArds($nextFile,"http://localhost/IVR/end.json","result","34","HOLD_1","3","1");        
                                $wrtLg->WriteFile("ProcessStartMenuIVR>>>>>>>>>>>case 2 >>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                                return $string;
                            break;
                            
                            case 3:
				//SALSE AND MARKETING	
	                        $nextFile="Hangup.php";
//                              $string = $this->DirectDial($nextFile,$context,"XML",$ani,$ani,"0812385561");        
    				$string = $this->SetArds($nextFile,"http://localhost/IVR/end.json","result","35","HOLD_1","3","1");
                                $wrtLg->WriteFile("ProcessStartMenuIVR>>>>>>>>>>>case 3 >>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                                return $string;
                            
                            break;
                            
                            case 4:
                            	//HR
				$nextFile="Hangup.php";
//                              $string = $this->DirectDial($nextFile,$context,"XML",$ani,$ani,"0812220633");        
				$string = $this->SetArds($nextFile,"http://localhost/IVR/end.json","result","3","HOLD_1","3","1");    
                                $wrtLg->WriteFile("ProcessStartMenuIVR>>>>>>>>>>>case 4 >>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                                return $string;
                            break;
							
  			    case 5:
                            	//FINANCE
				$nextFile="Hangup.php";
                                $string = $this->DirectDial($nextFile,$context,"XML",$ani,$ani,"0812220632");        
                                $wrtLg->WriteFile("ProcessIVR>>>>>>>>>>>case 0 >>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                                return $string;
                            break;

                            case 6:
                                //CEO OFFICE
                                $nextFile="Hangup.php";
                                $string = $this->DirectDial($nextFile,$context,"XML",$ani,$ani,"0812220632");
                                $wrtLg->WriteFile("ProcessIVR>>>>>>>>>>>case 0 >>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                                return $string;
                            break;

                            
                            default:
                                $string = $this->PlayVoiceFilevoice("ivr-invalid_extension.wav");
                                return $string;
                        }
                                       
                }
                else
                {
                    $string= '{"action": "hangup","cause": "NORMAL_CLEAN","nexturl": "'.$nextFile.'"}';
                    return $string;
                } 
               
            }
            catch(exception $ex)
            {
                $wrtLg->WriteFile("ProcessStartMenuIVR>>>>>>>>>>> catch ----  >>>>>>>>> -".$ex."  - ".date("Y-m-d H:i:s"));
                return $ex;
            }
            
        }
    
	function DirectDial($nexturl,$context,$dialplan,$callername,$callernumber,$number)
        {
            try
             {
                $dialNum = new DialNumber();
                
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
		
	function SetRBT($nexturl,$rbtapplication,$rbtdata)
        {
            try
             {
                $exeRBT = new Execute();
                
                $exeRBT->SetNextUrl($nexturl);
                $exeRBT->SetApplication($rbtapplication);
                $exeRBT->SetData($rbtdata);
                
                 
                $result = $exeRBT->GetResult();
                return $result;
             
             }
            catch(exception $ex)
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
        
	function SetArds($nexturl,$posturl,$result,$skill,$profile,$company,$tenant)
        {
//$wrtLg->WriteFile("ProcessIVR>>>>SetArds>>>>>".$nexturl."--".$posturl."--".$skill.">>case 0 >>>>>>>>> -".$profile."  - ".date("Y-m-d H:i:s"));
            try
             {
                $ards = new Ards();
                
                $ards->SetNextUrl($nexturl);
                $ards->SetPostUrl($posturl);
                $ards->SetResult($result);
                $ards->SetSkill($skill);
                $ards->SetProfile($profile);
                $ards->SetCompany($company);
                $ards->SetTenant($tenant); 

		$result = $ards->GetResult();

        //        $wrtLg->WriteFile("ProcessIVR>>>>SetArds>>>>>".$result."-- - ".date("Y-m-d H:i:s"));
                $result = $ards->GetResult();
                return $result;
             
             }
            catch(exception $ex)
             {
                return $ex;
             }         
        }
        
           
	function PlayVoiceFilevoice($file) 
        {
        try
            {
                $playFile = new PlayFile();
                $playFile->SetFile($file);
            }
        catch (exception $ex)
            {
               return $ex; 
            }
       }   
 
    
}






?>
