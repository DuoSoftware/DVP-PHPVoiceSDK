<?php

/**
 * @author achintha
 * @copyright 2014
 */

require_once("PHPVoiceLibrary/class.SetDTMF.php");
require_once("config.php");
include_once("WriteLog.php");


$objSetDTMF = new SetDTMF();
$wrtLg = new WriteLog();

//$objPlayFile->
$calldata = json_decode($HTTP_RAW_POST_DATA,true);
$wrtLg->WriteFile("start \t - ".$HTTP_RAW_POST_DATA." - ".date("Y-m-d H:i:s"));

$result= $calldata["result"];
$session = $calldata["session"];
$ani=$calldata["ani"];
$dnis=$calldata["dnis"];
$callerdirection=$calldata["direction"];
$calleridname=$calldata["name"];

$wrtLg->WriteFile("start \t  result  \t - ".$result." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("start \t  session \t - ".$session." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("start \t  ani \t - ".$ani." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("start \t  dnis \t - ".$dnis." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("start \t  callerdirection  \t - ".$callerdirection." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("start \t  calleridname \t - ".$calleridname." - ".date("Y-m-d H:i:s"));
//{"action": "playandgetdigits","file": "Duo_IVR_Menu.wav","nexturl": "http://192.168.1.195/IVR/Process.php","result": "result","errorfile": "","digittimeout": "20","inputtimeout": "100","loops": "2","terminator": "#","strip": "#","maxdigits"3""digits": "1"}
//{"action": "playandgetdigits","file": "Duo_IVR_Menu.wav","nexturl": "http://192.168.1.195/IVR/ivrProcess.php","result": "result","errorfile": "","digittimeout" : 20,"inputtimeout" : 100,"loops" : 2,"terminator" : "#","strip" : "#","maxdigits" : "2","digits" : 1}';



$folder=substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'],"/")+1);
$nextFile="menu.php";
//$nextURL="http://".$GLOBALS['host'].":".$GLOBALS['port'].$folder.$nextFile;
$nextURL="menu.php";
//print("DDDDDDDDDD---".$nextURL);
$objSetDTMF->SetDTMFType("inband");
$objSetDTMF->SetNextUrl($nextURL);
//$objPlayFile->GetResult();
$wrtLg->WriteFile("start \t callString  \t - ".$objSetDTMF->GetResult()." - ".date("Y-m-d H:i:s"));

print($objSetDTMF->GetResult());

?>
