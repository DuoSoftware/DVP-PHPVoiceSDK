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
require_once("PHPVoiceLibrary/PlayFile.php");
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
/*
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
$wrtLg->WriteFile("Process.php \t calleridname \t - ".$calleridname." - ".date("Y-m-d H:i:s"));*/
$wrtLg->WriteFile("Process.php >>>>>>>>>>>>>>>>>>>>>>>> -  - ".date("Y-m-d H:i:s"));
 }
 catch(exception $ex)
 {
  $wrtLg->WriteFile("ProcessIVR \t catch \t -".$ex."  - ".date("Y-m-d H:i:s"));
 }
?>
