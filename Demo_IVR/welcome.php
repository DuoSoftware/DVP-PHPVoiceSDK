<?php

/**
 * @author achintha
 * @copyright 2014
 */

        require_once("PHPVoiceLibrary/class.PlayFile.php");
        require_once("config.php");
        include_once("WriteLog.php");

        $objPlayFile = new PlayFile();
        $wrtLg = new WriteLog();
        $wrtLg->WriteFile("welcome");

        $calldata = json_decode($HTTP_RAW_POST_DATA,true);
        $wrtLg->WriteFile("welcome \t - ".$HTTP_RAW_POST_DATA." - ".date("Y-m-d H:i:s"));

        $result= $calldata["result"];
        $session = $calldata["session"];
        $ani=$calldata["ani"];
        $dnis=$calldata["dnis"];
        $callerdirection=$calldata["direction"];
        $calleridname=$calldata["name"];

        $wrtLg->WriteFile("welcome \t  result  \t - ".$result." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("welcome \t  session \t - ".$session." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("welcome \t  ani \t - ".$ani." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("welcome \t  dnis \t - ".$dnis." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("welcome \t  callerdirection  \t - ".$callerdirection." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("welcome \t  calleridname \t - ".$calleridname." - ".date("Y-m-d H:i:s"));

        $folder=substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'],"/")+1);
        $nextFile="menu.php";
//      $nextURL="ProcessStartMenu.php";

        $objPlayFile->SetFile("Duo_IVR_welcome.wav");
        $objPlayFile->SetNextUrl($nextFile);
        $objPlayFile->SetResult("result");
        $objPlayFile->SetErrorFile("");
        $objPlayFile->SetDigitTimeout("0");
        $objPlayFile->SetInputTimeout("0");
        $objPlayFile->SetLoops("0");
        $objPlayFile->SetTerminator("#");
        $objPlayFile->SetStrip("#");
        $objPlayFile->SetApp("");
        $objPlayFile->SetDigits(1);

        $wrtLg->WriteFile("welcome \t callString  \t - ".$objPlayFile->GetResult()." - ".date("Y-m-d H:i:s"));
        print($objPlayFile->GetResult());

?>
