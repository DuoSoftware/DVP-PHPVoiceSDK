<?php
/**
 * @author achintha
 * @copyright 2014
 */

require_once("PHPVoiceLibrary/class.ContinueVar.php");
require_once("config.php");
include_once("WriteLog.php");


$objSetVar = new SetVar();
$wrtLg = new WriteLog();
$wrtLg->WriteFile("setLang");

//$objPlayFile->
$calldata = json_decode($HTTP_RAW_POST_DATA,true);
$wrtLg->WriteFile("setLang \t - ".$HTTP_RAW_POST_DATA." - ".date("Y-m-d H:i:s"));
//$calldata = json_decode('{"session":"db61dbd3-4ea5-4615-88bd-f5943f71d8a4","direction":"inbound","ani":"1000","dnis":"0777334900","name":"1000","result":"1","dev_params":{"FirstMenu":"1","tags":{},"Params_Test":"test","result":"1","ProcessLevel":"Flow_1","FirstDigit":"2"}}',true);

$result= $calldata["result"];
$session = $calldata["session"];
$ani=$calldata["ani"];
$dnis=$calldata["dnis"];
$callerdirection=$calldata["direction"];
$calleridname=$calldata["name"];


$wrtLg->WriteFile("setLang \t  result  \t - ".$result." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("setLang \t  session \t - ".$session." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("setLang \t  ani \t - ".$ani." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("setLang \t  dnis \t - ".$dnis." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("setLang \t  callerdirection  \t - ".$callerdirection." - ".date("Y-m-d H:i:s"));
$wrtLg->WriteFile("setLang \t  calleridname \t - ".$calleridname." - ".date("Y-m-d H:i:s"));

$folder=substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'],"/")+1);
$nextFile="ProcessMenu.php";
//$nextURL="http://".$GLOBALS['host'].":".$GLOBALS['port'].$folder.$nextFile;
switch ($result)
        {
        case 1:
                $langMod="en";
        break;
        case 2:
                $langMod="sin";
        break;
        case 3:
                $langMod="tam";
        break;
        default:
                $langMod="en";
		$result="3";
        }
//print ("MMMMMM--".$nextURL);
$nextURL="ProcessMenu.php";

$objSetVar->SetNextUrl($nextURL);
$objSetVar->SetResult($result);
$objSetVar->SetParams('{"LastDigit":"'.$result.'","FunctionRepeat":"false"}');
$objSetVar->SetKey("default_language");
$objSetVar->SetAttribute("$langMod");

$wrtLg->WriteFile("setLang \t callString  \t - ".$objSetVar->GetResult()." - ".date("Y-m-d H:i:s"));
print($objSetVar->GetResult());

?>
