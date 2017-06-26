<?php
 /**
 * @author achintha
 * @copyright 2016
 */
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
	require_once("PHPVoiceLibrary/class.VoiceMail.php");
	require_once("PHPVoiceLibrary/class.Say.php");
        require_once("PHPVoiceLibrary/class.Execute.php");
	//require_once("PHPVoiceLibrary/class.RecordVoiceMessage.php");
	require_once("class.HolidayCalander.php");

	$wrtLg = new WriteLog();
	$objProcesIvr = new ProcessIVR();
	$objHolidayCalander = new IsHolyday();

	$calldata = json_decode($HTTP_RAW_POST_DATA,true);
	$wrtLg->WriteFile("Process.php  >>>>>>>>>>>321321>>>>>>>>>>>>> - ".$HTTP_RAW_POST_DATA." - ".date("Y-m-d H:i:s"));
	
if($calldata['result'] == "none")
{
	$wrtLg->WriteFile("SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS");
	$result= $calldata["dev_params"]["LastDigit"];
	$wrtLg->WriteFile("ProcessMenu.php \t sdadadasdasdadasfaf \t - ".$calldata["dev_params"]["LastDigit"]);
}
else
{
        $result= $calldata['result'];
}	

//check Hollydays
//IsVoicemail($date,$holydayFile,$startTime,$endTime)
$date=$d=date("Y-m-d");
$result = $objHolidayCalander->IsVoicemail($date,"myCSVFile.csv","18:00","23:00");
if($result=true)
{
 // forward to voicemail
}

$objHolidayCalander->IsVoicemail(

//////

//	$result= $calldata['result'];
	$params = $calldata["dev_params"];
	$session = $calldata["session"];
	$ani=$calldata["ani"];
	$dnis=$calldata["dnis"];
	$callerdirection=$calldata["direction"];
	$calleridname=$calldata["name"];

	$wrtLg->WriteFile("ProcessMenu.php \t result \t - ".$result." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("ProcessMenu.php \t dev_params \t - ".$params["FirstMenu"]." - ".date("Y-m-d H:i:s"));
	$wrtLg->WriteFile("ProcessMenu.php \t Tag \t - ".$params["tags"][0]." - ".date("Y-m-d H:i:s"));
	$wrtLg->WriteFile("ProcessMenu.php \t session \t - ".$session." - ".date("Y-m-d H:i:s"));
	$wrtLg->WriteFile("ProcessMenu.php \t ani \t - ".$ani." - ".date("Y-m-d H:i:s"));
	$wrtLg->WriteFile("ProcessMenu.php \t dnis \t - ".$dnis." - ".date("Y-m-d H:i:s"));
	$wrtLg->WriteFile("ProcessMenu.php \t callerdirection \t - ".$callerdirection." - ".date("Y-m-d H:i:s"));
	$wrtLg->WriteFile("ProcessMenu.php \t calleridname \t - ".$calleridname." - ".date("Y-m-d H:i:s"));



	$wrtLg->WriteFile("ProcessMenu.php >>>>>>>>>>>>>>>>>>>>>>>> -  - ".date("Y-m-d H:i:s"));


	$time= date("H.i");
     /*if( (9.00<$time) && ($time<20.30))
        {
           print(date("H:i:s"));
        }
     */

	$folder=substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'],"/")+1);
	$nextPath="http://".$GLOBALS['host'].":".$GLOBALS['port'].$folder;
	$context=$GLOBALS['context'];

//$priority = "0";

//if ($params["tags"][0] == "VVIP")
//{
//	$priority = "6";
//}
/*
if ($params["tags"][0] == "VVIP"){
                        $priority = "6";
                }
        elseif ($params["tags"][0] == "VIP"){
                        $priority = "10";
                }
        elseif ($params["tags"][0] == "Priority"){
                        $priority = "8";
                }
*/

	$result = $objProcesIvr->ProcessDigits($result,$params,$session,$ani,$dnis,$callerdirection,$calleridname,$time,$nextPath,$context,$priority);
	$wrtLg->WriteFile("Return String---- \t ProcessMenu.php \t -".$result."  - ".date("Y-m-d H:i:s"));
	print ($result);

 }
 catch(exception $ex)
 {
	$wrtLg->WriteFile("ProcessMenuIVR \t catch \t -".$ex."  - ".date("Y-m-d H:i:s"));  
 }

//ExceptionThrower::stop();

Class ProcessIVR
{   
    public $ProcessLevelStart="Flow_";
   
    function ProcessDigits($result,$params,$session,$ani,$dnis,$callerdirection,$calleridname,$time,$nextPath,$context)
        { 
            $wrtLg = new WriteLog();
			
                                   
            try
            {
		if(array_key_exists("FunctionRepeat",$params))
		{
			if($params["FunctionRepeat"] == "true")
			{
			$funcRpt="true";
			}
			else
			{
			$funcRpt="false";
			}
		}
		else
		{
			$funcRpt="false";
		}
			               
                if(strlen($result)==1)
                {       
                    switch ($result)
                        {
                            case 1:
                                if(array_key_exists("ProcessLevel",$params))
                                {
					if($params["ProcessLevel"] != "Flow_")
					{	
						if($funcRpt== "true")
						{
						$nextFunction=$params["ProcessLevel"];
						}
						else
						{
                                    		$nextFunction=$params["ProcessLevel"]."_".$result;
						}
 $string = $this->$nextFunction($funcRpt,$result,$params,$session,$ani,$dnis,$callerdirection,$calleridname,$time,$nextPath,$context,$nextFunction,$wrtLg);
                                    		return $string;
                                	}
					else
	                                {
                                          $nextFile = "ProcessMenu.php";
                                          $dev_params = '{"FirstMenu":"'.$params["FirstMenu"].'","ProcessLevel":"'.$this->ProcessLevelStart.$result.'"}';
              $string = $this->PlayFileAndGetDigits("DFCC_Welcome2.wav",$nextFile,"FirstDigit",$dev_params,"","20","5000","1","#","#","1","1");
  //$string = $this->PlayFileAndGetDigits("DFCC_Welcome2.wav",$nextFile,"FirstDigit",'{"FirstMenu":"1","ProcessLevel":"Flow_1"}',"","20","5000","1","#","#","1","1");
	                                    $wrtLg->WriteFile("ProcessDigits>>>>>>>>>>>case 1 >ELSE>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
        	                            return $string;
                	                }

				}
                                else
                                {
                                    $nextFile = "ProcessMenu.php";
                                    $dev_params = '{"FirstMenu":"'.$params["FirstMenu"].'","ProcessLevel":"'.$this->ProcessLevelStart.$result.'"}';
				    $eventlog=true;

 $string = $this->PlayFileAndGetDigits("SingerMenuEng.wav",$nextFile,"FirstDigit",$dev_params,"","5000","5000","1","#","#","1","1","Eng_Menu_1","English",true);
                                    $wrtLg->WriteFile("ProcessDigits>>>>>>>>>>>case 1 >ELSE>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                                    return $string;
                                }
                               
                            break;
                           
                             case 2:
                                if(array_key_exists("ProcessLevel",$params))
                                {
                                        if($params["ProcessLevel"] != "Flow_")
                                        {
                                                if($funcRpt== "true")
                                                {
                                                $nextFunction=$params["ProcessLevel"];
                                                }
                                                else
                                                {
                                                $nextFunction=$params["ProcessLevel"]."_".$result;
                                                }
       $string = $this->$nextFunction($funcRpt,$result,$params,$session,$ani,$dnis,$callerdirection,$calleridname,$time,$nextPath,$context,$nextFunction,$wrtLg);
                                                return $string;
                                        }
                                        else
                                        {
                                            $nextFile = "ProcessMenu.php";
                                            $dev_params = '{"FirstMenu":"'.$params["FirstMenu"].'","ProcessLevel":"'.$this->ProcessLevelStart.$result.'"}';
                                            $string = $this->PlayFileAndGetDigits("SingerMenuSin.wav",$nextFile,"FirstDigit",$dev_params,"","20","5000","1","#","#","1","1");
                                          
                                            $wrtLg->WriteFile("ProcessDigits>>>>>>>>>>>case 1 >ELSE>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                                            return $string;
                                        }
                                }
                                else
                                {
                                    $nextFile = "ProcessMenu.php";
                                    $dev_params = '{"FirstMenu":"'.$params["FirstMenu"].'","ProcessLevel":"'.$this->ProcessLevelStart.$result.'"}';
//                                    $string = $this->PlayFileAndGetDigits("Sin_Vehicle_Selection.wav",$nextFile,"FirstDigit",$dev_params,"","20","5000","1","#","#","1","1");
				  //  $eventlog=true;
				//	 $string = $this-> SetArds($nextFile,"http://localhost/IVR/end.json","FirstDigit","1","Tamil","Tamil","poc_queue_hold",$priority,"1","1",$eventlog);
	                            $string = $this->PlayFileAndGetDigits("SingerMenuSin.wav",$nextFile,"FirstDigit",'{"FirstMenu":"2","ProcessLevel":"Flow_2"}',"","5000","5000","1","#","#","1","1","SinhalaMenu","Sinhala",true);

                                    $wrtLg->WriteFile("ProcessDigits>>>>>>>>>>>case 2 >ELSE>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                                    return $string;
                                }
                               
                            break;
                            
                             case 3:
                                if(array_key_exists("ProcessLevel",$params))
                                {
                                        if($params["ProcessLevel"] != "Flow_")
                                        {
                                                $nextFunction=$params["ProcessLevel"]."_".$result;
                                                $string = $this->$nextFunction($funcRpt,$result,$params,$session,$ani,$dnis,$callerdirection,$calleridname,$time,$nextPath,$context,$nextFunction,$wrtLg);
                                                return $string;
                                        }
                                        else
                                        {
                                            $nextFile = "ProcessMenu.php";
                                            $dev_params = '{"FirstMenu":"'.$params["FirstMenu"].'","ProcessLevel":"'.$this->ProcessLevelStart.$result.'"}';
                                    $string = $this->PlayFileAndGetDigits("SingerMenuTam.wav",$nextFile,"FirstDigit",$dev_params,"","20","5000","1","#","#","1","1");
                                           
                                            $wrtLg->WriteFile("ProcessDigits>>>>>>>>>>>case 1 >ELSE>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                                            return $string;
                                        }


                                }
                                else
                                {
                                    $nextFile = "ProcessMenu.php";
                                    $dev_params = '{"FirstMenu":"'.$params["FirstMenu"].'","ProcessLevel":"'.$this->ProcessLevelStart.$result.'"}';
//                                    $string = $this->PlayFileAndGetDigits("Tam_Vehicle_Selection.wav",$nextFile,"FirstDigit",$dev_params,"","20","5000","1","#","#","1","1");

				    $eventlog=true;
                                    $string = $this->PlayFileAndGetDigits("SingerMenuTam.wav",$nextFile,"FirstDigit",'{"FirstMenu":"2","ProcessLevel":"Flow_2"}',"","5000","5000","1","#","#","1","1","Eng_Menu_2","English",true);
				    $wrtLg->WriteFile("ProcessDigits>>>>>>>>>>>case 3 >ELSE>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                                    return $string;
                                }
                               
                            break;

                            default:
                                $string = $this->PlayVoiceFilevoice("ivr-invalid_extension.wav");
                                return $string;
                        }

                }
                else
                {
                    $nextFile="Hangup.php";
                    $string= '{"action": "hangup","cause": "NORMAL_CLEAN","nexturl": "'.$nextFile.'"}';
                    return $string;
                } 
               
            }
            catch(exception $ex)
            {
                $wrtLg->WriteFile("ProcessIVR>>>>>>>>>>> catch ----  >>>>>>>>> -".$ex."  - ".date("Y-m-d H:i:s"));
                return $ex;
            }
            
        }
/*function getPriority($params){
	if ($params["tags"][0] == "VVIP"){
        		$priority1 = "6";
			return $priority1;
		}
	elseif ($params["tags"][0] == "VIP"){
        		$priority1 = "10";
			return $priority1;
		}
	elseif ($params["tags"][0] == "Priority"){
        		$priority1 = "8";
			return $priority1;
		}
}*/


   
    function Flow_1_1($funcRpt,$result,$params,$session,$ani,$dnis,$callerdirection,$calleridname,$time,$nextPath,$context,$ProcessLevel,$wrtLg)
    {
        $nextFile = "end.php";
        $dev_params = '{"FirstMenu":"'.$params["FirstMenu"].'","ProcessLevel":"'.$ProcessLevel.'"}';
	$priority = $this-> getPriority($params["tags"][0]);
	$eventlog = true;
        $string = $this-> SetArds($nextFile,"http://localhost/IVR/end.json","FirstDigit","2","English","English","poc_queue_hold",$priority,"1","1",$eventlog);
        $wrtLg->WriteFile($ProcessLevel.">>>>>>>>>>>>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
        return $string;
    }

    function Flow_1_2($funcRpt,$result,$params,$session,$ani,$dnis,$callerdirection,$calleridname,$time,$nextPath,$context,$ProcessLevel,$wrtLg)
    {
        $nextFile = "ProcessMenu.php";
        $dev_params = '{"FirstMenu":"'.$params["FirstMenu"].'","ProcessLevel":"'.$ProcessLevel.'"}';
	$string = $this->PlayFileAndGetDigits("Eng_Docs.wav",$nextFile,"Digit",$dev_params,"","20","5000","1","#","#","1","1");
        $wrtLg->WriteFile($ProcessLevel.">>>>>>>>>>>>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
        return $string;
        
    }
    function Flow_2_1($funcRpt,$result,$params,$session,$ani,$dnis,$callerdirection,$calleridname,$time,$nextPath,$context,$ProcessLevel,$wrtLg)
    {
        $nextFile = "ProcessMenu.php";
        $dev_params = '{"FirstMenu":"'.$params["FirstMenu"].'","ProcessLevel":"'.$ProcessLevel.'"}';
        //$dev_params = '{"FirstMenu":"1","ProcessLevel":"'.$ProcessLevel.'"}';
        $string = $this->PlayFileAndGetDigits("Sin_Docs.wav",$nextFile,"Digit",$dev_params,"","20","5000","1","#","#","1","1");
        $wrtLg->WriteFile($ProcessLevel.">>>>>>>>>>>>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
        return $string;
        
    }
    function Flow_2_2($funcRpt,$result,$params,$session,$ani,$dnis,$callerdirection,$calleridname,$time,$nextPath,$context,$ProcessLevel,$wrtLg)
    {
        $nextFile = "ProcessMenu.php";
        $dev_params = '{"FirstMenu":"'.$params["FirstMenu"].'","ProcessLevel":"'.$ProcessLevel.'"}';
        //$dev_params = '{"FirstMenu":"1","ProcessLevel":"'.$ProcessLevel.'"}';
        $string = $this->PlayFileAndGetDigits("Sin_Docs.wav",$nextFile,"Digit",$dev_params,"","20","5000","1","#","#","1","1");
        $wrtLg->WriteFile($ProcessLevel.">>>>>>>>>>>>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
        return $string;
        
    }
    function Flow_2_3($funcRpt,$result,$params,$session,$ani,$dnis,$callerdirection,$calleridname,$time,$nextPath,$context,$ProcessLevel,$wrtLg)
    {
        $nextFile = "ProcessMenu.php";
        $dev_params = '{"FirstMenu":"'.$params["FirstMenu"].'","ProcessLevel":"'.$ProcessLevel.'"}';
        //$dev_params = '{"FirstMenu":"1","ProcessLevel":"'.$ProcessLevel.'"}';
        $string = $this->PlayFileAndGetDigits("Sin_Docs.wav",$nextFile,"Digit",$dev_params,"","20","5000","1","#","#","1","1");
        $wrtLg->WriteFile($ProcessLevel.">>>>>>>>>>>>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
        return $string;
        
    }
    function Flow_3_1($funcRpt,$result,$params,$session,$ani,$dnis,$callerdirection,$calleridname,$time,$nextPath,$context,$ProcessLevel,$wrtLg)
    {
         $nextFile = "ProcessMenu.php";
        $dev_params = '{"FirstMenu":"'.$params["FirstMenu"].'","ProcessLevel":"'.$ProcessLevel.'"}';
        //$dev_params = '{"FirstMenu":"1","ProcessLevel":"'.$ProcessLevel.'"}';
        $string = $this->PlayFileAndGetDigits("Tam_Docs.wav",$nextFile,"Digit",$dev_params,"","20","5000","1","#","#","1","1");
        $wrtLg->WriteFile($ProcessLevel.">>>>>>>>>>>>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
        return $string;
    }
    function Flow_3_2($funcRpt,$result,$params,$session,$ani,$dnis,$callerdirection,$calleridname,$time,$nextPath,$context,$ProcessLevel,$wrtLg)
    {
         $nextFile = "ProcessMenu.php";
        $dev_params = '{"FirstMenu":"'.$params["FirstMenu"].'","ProcessLevel":"'.$ProcessLevel.'"}';
        //$dev_params = '{"FirstMenu":"1","ProcessLevel":"'.$ProcessLevel.'"}';
        $string = $this->PlayFileAndGetDigits("Tam_Docs.wav",$nextFile,"Digit",$dev_params,"","20","5000","1","#","#","1","1");
        $wrtLg->WriteFile($ProcessLevel.">>>>>>>>>>>>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
        return $string;

    }
    function Flow_3_3($funcRpt,$result,$params,$session,$ani,$dnis,$callerdirection,$calleridname,$time,$nextPath,$context,$ProcessLevel,$wrtLg)
    {
         $nextFile = "ProcessMenu.php";
        $dev_params = '{"FirstMenu":"'.$params["FirstMenu"].'","ProcessLevel":"'.$ProcessLevel.'"}';
        //$dev_params = '{"FirstMenu":"1","ProcessLevel":"'.$ProcessLevel.'"}';
        $string = $this->PlayFileAndGetDigits("Tam_Docs.wav",$nextFile,"Digit",$dev_params,"","20","5000","1","#","#","1","1");
        $wrtLg->WriteFile($ProcessLevel.">>>>>>>>>>>>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
        return $string;

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
    
function Execute($nexturl,$result,$dev_params,$display,$application,$eventLog,$data)
	{
	     try
             {
                $exec = new Execute();

                $exec->SetNextUrl($nexturl);
                $exec->SetResult($result);
                $exec->SetParams($dev_params);
                $exec->SetDisplay($display);
                $exec->SetApplication($application);
                $exec->SetEventLog($eventLog);
                $exec->SetData($data);

                $result = $exec->GetResult();
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
        
function SetArds($nexturl,$posturl,$result,$skill,$skillDisplay,$displayNode,$profile,$priority,$company,$tenant,$eventlog)
        {
//$wrtLg->WriteFile("ProcessIVR>>>>SetArds>>>>>".$nexturl."--".$posturl."--".$skill.">>case 0 >>>>>>>>> -".$profile."  - ".date("Y-m-d H:i:s"));
            try
             {
                $ards = new Ards();
                
                $ards->SetNextUrl($nexturl);
                $ards->SetPostUrl($posturl);
                $ards->SetResult($result);
                $ards->SetSkill($skill);
                $ards->SetSkillDisplay($skillDisplay);
		$ards->SetDisplay($displayNode);
                $ards->SetProfile($profile);
                $ards->SetPriority($priority);
                $ards->SetCompany($company);
                $ards->SetTenant($tenant); 
		$ards->SetEventLog($eventlog);

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
//		PlayFileAndGetDigits("DFCC_Welcome2.wav",$nextFile,"FirstDigit",$dev_params,"","20","5000","1","#","#","1","1");

function PlayFileAndGetDigits($file,$nextUrl,$result,$params,$errorFile,$digitTimeout,$inputTimeout,$loops,$terminator,$strip,$maxDigits,$digits,$display,$skillDisplay,$eventlog)
        {
        try
          {
               $objPlayFile = new PlayFileAndGetDigits();
                        //$nextFile="ProcessStartMenu.php";
                        //$nextURL="ProcessStartMenu.php";
                        $objPlayFile->SetFile($file);
                        $objPlayFile->SetNextUrl($nextUrl);
                        $objPlayFile->SetResult($result);
                        $objPlayFile->SetParams($params);
                        $objPlayFile->SetErrorFile($errorFile);
                        $objPlayFile->SetDigitTimeout($digitTimeout);
                        $objPlayFile->SetInputTimeout($inputTimeout);
                        $objPlayFile->SetLoops($loops);
                        $objPlayFile->SetTerminator($terminator);
                        $objPlayFile->SetStrip($strip);
                        $objPlayFile->SetMaxDigits($maxDigits);
                        $objPlayFile->SetDigits($digits);
			$objPlayFile->SetDisplay($display);
                        $objPlayFile->SetSkillDisplay($skillDisplay);
			$objPlayFile->SetEventLog($eventlog);

                        $result = $objPlayFile->GetResult();
                        return $result;
                }
                catch (exception $ex)
                {
                        return $ex;
                }
        }

function getPriority($customerCategory){

	switch ($customerCategory) 
		{
		case "VVIP":
			$priority = "6";
		break;

		case "VIP":
                        $priority = "4";
                break;
		
		default:
			$priority = "0";
		}
		return $priority;
}

function setBOCBalanceCheckParams($number,$wrtLg)
{
    $date = date("Ymd");
    $w = new XMLWriter;

      $w->openMemory();
      $w->setIndent(true);$w->startElement('boc');$w->startElement('header');
      $w->writeElement("mobileno", "number");
      $w->writeElement("txncode", "3440000");
      $w->writeElement("tkn", "BOC9999999");
      $w->writeElement("pdate", "$date");
      $w->writeElement("seqno", "9999");
      $w->writeElement("prefix", "3");
      $w->writeElement("msgtype", "0200");
      $w->writeElement("sendto", "QueueName");
      $w->writeElement("replyto", "QueueName");
      $w->endElement();
	$w->endElement();
$d = '"<?xml version="1.0"?>'.$w->outputMemory().'"';
//$d = $w->outputMemory();

//$wrtLg->WriteFile("kkkkkkkk ".$d);

//	$url= 'http://127.0.0.1/BOC/decodeXml.php';
//	$url= 'http://192.168.4.7/DVP-PHPVoiceSDK/BOC/decodeXml.php';
        $url= 'http://192.168.4.7/DVP-PHPVoiceSDK/BOC/decodeXml.php?xmlData='.$number;
//        $url= 'http://192.168.4.7/DVP-PHPVoiceSDK/BOC/decodeXml.php?xmlData='.$d;
//	$url= 'http://requestb.in/u1z3l8u1??xmlData="'.$d.'"';
/*	$url= 'http://192.168.4.7/DVP-PHPVoiceSDK/BOC/decodeXml.php?xmlData="<?xml version="1.0"?><boc><header><mobileno>'.$number.'</mobileno><txncode>3440000</txncode><tkn>BOC9999999</tkn><pdate>20170308</pdate><seqno>9999</seqno><prefix>3</prefix><msgtype>0200</msgtype><sendto>QueueName</sendto><replyto>QueueName</replyto></header></boc>"';*/
$wrtLg->WriteFile($url);
//Get Url data From file_get_content
	$data = file_get_contents($url);
$wrtLg->WriteFile("gggggggggggggggg".$data);
/*
$ch = curl_init();
	
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FAILONERROR,1);
    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);	
	curl_setopt($ch, CURLOPT_TIMEOUT, 15);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/xml'));
	$data = curl_exec($ch);
	$str = curl_error($ch);
$info = curl_getinfo($ch);
curl_close($ch);
*///////
////XML to Object content
	$xml = simplexml_load_string($data);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        return $array; 
}


function Say($file,$nexturl,$app,$result,$params,$display,$errorFile,$digitTimeOut,$inputTimeOut,$loops,$language,$type,$method,$gender,$terminator,$strip,$digits,$eventlog,$maxdigits)
        {
//$wrtLg->WriteFile("ProcessIVR>>>>SetArds>>>>>".$nexturl."--".$posturl."--".$skill.">>case 0 >>>>>>>>> -".$profile."  - ".date("Y-m-d H:i:s"));
            try
             {
                $say = new Say();

                $say->SetFile($file);
                $say->SetNextUrl($nexturl);
                $say->SetApp($app);
                $say->SetResult($result);
                $say->SetParams($params);
                $say->SetDisplay($display);
                $say->SetErrorFile($errorFile);
                $say->SetDigitTimeOut($digitTimeOut);
                $say->SetInputTimeOut($inputTimeOut);
                $say->SetLoops($loops);
                $say->SetLanguage($language);
                $say->SetType($type);
                $say->SetMethod($method);
                $say->SetGender($gender);
                $say->SetTerminator($terminator);
                $say->SetStrip($strip);
                $say->SetDigits($digits);
                $say->SetEventLog($eventlog);
                $say->SetMaxDigits($maxdigits);

                $result = $say->GetResult();

        //        $wrtLg->WriteFile("ProcessIVR>>>>SetArds>>>>>".$result."-- - ".date("Y-m-d H:i:s"));
               // $result = $ards->GetResult();
                return $result;

             }
            catch(exception $ex)
             {
                return $ex;
             }
        }
}
?>
