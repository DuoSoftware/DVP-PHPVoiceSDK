<?php

/**
 * @author achintha
 * @copyright 2014
 */

require_once("PHPVoiceLibrary/class.PlayFileAndGetDigits.php");
require_once("config.php");
include_once("WriteLog.php");


$objPlayFile = new PlayFileAndGetDigits();
$wrtLg = new WriteLog();
$wrtLg->WriteFile("menu");

//$objPlayFile->
$calldata = json_decode($HTTP_RAW_POST_DATA,true);
$wrtLg->WriteFile("menu \t - ".$HTTP_RAW_POST_DATA." - ".date("Y-m-d H:i:s"));

$result= $calldata["result"];
$session = $calldata["session"];
$ani=$calldata["ani"];
$dnis=$calldata["dnis"];
$callerdirection=$calldata["direction"];
$calleridname=$calldata["name"];


$wrtLg->WriteFile("menu \t  result  \t - ".$result." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("menu \t  session \t - ".$session." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("menu \t  ani \t - ".$ani." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("menu \t  dnis \t - ".$dnis." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("menu \t  callerdirection  \t - ".$callerdirection." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("menu \t  calleridname \t - ".$calleridname." - ".date("Y-m-d H:i:s"));
//{"action": "playandgetdigits","file": "Duo_IVR_Menu.wav","nexturl": "http://192.168.1.195/IVR/Process.php","result": "result","errorfile": "","digittimeout": "20","inputtimeout": "100","loops": "2","terminator": "#","strip": "#","maxdigits"3""digits": "1"}
//{"action": "playandgetdigits","file": "Duo_IVR_Menu.wav","nexturl": "http://192.168.1.195/IVR/ivrProcess.php","result": "result","errorfile": "","digittimeout" : 20,"inputtimeout" : 100,"loops" : 2,"terminator" : "#","strip" : "#","maxdigits" : "2","digits" : 1}';

$folder=substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'],"/")+1);
$nextFile="Process.php";
//$nextURL="http://".$GLOBALS['host'].":".$GLOBALS['port'].$folder.$nextFile;
//print ("MMMMMM--".$nextURL);
$nextURL="Process.php";

//$objPlayFile->SetFile("ivr-menu.wav");
$objPlayFile->SetFile("LassanaFlora1.wav");
$objPlayFile->SetNextUrl($nextURL);
$objPlayFile->SetResult("result");
$objPlayFile->SetErrorFile("");
$objPlayFile->SetDigitTimeout("20");
$objPlayFile->SetInputTimeout("5000");
$objPlayFile->SetLoops("3");
$objPlayFile->SetTerminator("#");
$objPlayFile->SetStrip("#");
$objPlayFile->SetMaxDigits(3);
$objPlayFile->SetDigits(1);


//$objPlayFile->GetResult();
$wrtLg->WriteFile("menu \t callString  \t - ".$objPlayFile->GetResult()." - ".date("Y-m-d H:i:s"));
print($objPlayFile->GetResult());

?>
