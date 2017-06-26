<?php

/**
 * @author achintha
 * @copyright 2014
 */

        require_once("PHPVoiceLibrary/class.GetVar.php");
        require_once("config.php");
        include_once("WriteLog.php");

        $objGetVar = new GetVar();
        $wrtLg = new WriteLog();
        $wrtLg->WriteFile("GetVar");

//$HTTP_RAW_POST_DATA='{"session":"28372490-589c-4bb8-8dcb-59e6f1522639","direction":"inbound","ani":"18705056550","dnis":"94112375000","name":"Extension 18705056550","result":"1","dev_params":{"profile":"583fbda78c8db300010bc307","result":"2"}}';

        $calldata = json_decode($HTTP_RAW_POST_DATA,true);
        $wrtLg->WriteFile("Var \t - ".$HTTP_RAW_POST_DATA." - ".date("Y-m-d H:i:s"));

        $result= $calldata["result"];
        $session = $calldata["session"];
        $ani=$calldata["ani"];
        $dnis=$calldata["dnis"];
        $callerdirection=$calldata["direction"];
        $calleridname=$calldata["name"];

        $wrtLg->WriteFile("Var \t  result  \t - ".$result." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("Var \t  session \t - ".$session." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("Var \t  ani \t - ".$ani." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("Var \t  dnis \t - ".$dnis." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("Var \t  callerdirection  \t - ".$callerdirection." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("Var \t  calleridname \t - ".$calleridname." - ".date("Y-m-d H:i:s"));

        $folder=substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'],"/")+1);
        $nextFile="IVRMenu.php";
//      $nextURL="ProcessStartMenu.php";

        $objGetVar->SetNextUrl($nextFile);
        $objGetVar->SetName("effective_caller_id_number");
        $objGetVar->SetPermanent("true");

        $wrtLg->WriteFile("Var \t callString  \t - ".$objGetVar->GetResult()." - ".date("Y-m-d H:i:s"));
        print($objGetVar->GetResult());

?>
