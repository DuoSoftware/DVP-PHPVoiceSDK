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
        $wrtLg->WriteFile("CsatMenu");

//$HTTP_RAW_POST_DATA='{"session":"28372490-589c-4bb8-8dcb-59e6f1522639","direction":"inbound","ani":"18705056550","dnis":"94112375000","name":"Extension 18705056550","result":"1","dev_params":{"profile":"583fbda78c8db300010bc307","result":"2"}}';

        $calldata = json_decode($HTTP_RAW_POST_DATA,true);
        $wrtLg->WriteFile("CsatMenu \t - ".$HTTP_RAW_POST_DATA." - ".date("Y-m-d H:i:s"));

        $result= $calldata["result"];
        $session = $calldata["session"];
        $ani=$calldata["ani"];
        $dnis=$calldata["dnis"];
        $callerdirection=$calldata["direction"];
        $calleridname=$calldata["name"];

        $wrtLg->WriteFile("CsatMenu \t  result  \t - ".$result." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("CsatMenu \t  session \t - ".$session." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("CsatMenu \t  ani \t - ".$ani." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("CsatMenu \t  dnis \t - ".$dnis." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("CsatMenu \t  callerdirection  \t - ".$callerdirection." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("CsatMenu \t  calleridname \t - ".$calleridname." - ".date("Y-m-d H:i:s"));

        $folder=substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'],"/")+1);
        $nextFile="csat.php";
	$nextURL="csat.php";

        $objPlayFile->SetFile("csat.wav");
        $objPlayFile->SetNextUrl($nextFile);
        $objPlayFile->SetResult("result");
        $objPlayFile->SetErrorFile("");
	$objPlayFile->SetDisplay("csat_2");
        $objPlayFile->SetDigitTimeout("20");
        $objPlayFile->SetInputTimeout("5000");
        $objPlayFile->SetLoops("3");
        $objPlayFile->SetTerminator("#");
        $objPlayFile->SetStrip("#");
    //    $objPlayFile->SetApp("");
        $objPlayFile->SetDigits(1);
	$objPlayFile->SetEventLog(true);

        $wrtLg->WriteFile("CsatMenu \t callString  \t - ".$objPlayFile->GetResult()." - ".date("Y-m-d H:i:s"));
        print($objPlayFile->GetResult());

?>
