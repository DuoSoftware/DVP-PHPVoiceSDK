<?php

/**
 * @author achintha
 * @copyright 2014
 */

        require_once("PHPVoiceLibrary/class.Profile.php");
        require_once("config.php");
        include_once("WriteLog.php");

        $objProf = new Profile();
        $wrtLg = new WriteLog();
        $wrtLg->WriteFile("prof");

//$HTTP_RAW_POST_DATA='{"session":"28372490-589c-4bb8-8dcb-59e6f1522639","direction":"inbound","ani":"18705056550","dnis":"94112375000","name":"Extension 18705056550","result":"1","dev_params":{"profile":"583fbda78c8db300010bc307","result":"2"}}';

        $calldata = json_decode($HTTP_RAW_POST_DATA,true);
        $wrtLg->WriteFile("prof \t - ".$HTTP_RAW_POST_DATA." - ".date("Y-m-d H:i:s"));

        $result= $calldata["result"];
        $session = $calldata["session"];
        $ani=$calldata["ani"];
        $dnis=$calldata["dnis"];
        $callerdirection=$calldata["direction"];
        $calleridname=$calldata["name"];

        $wrtLg->WriteFile("prof \t  result  \t - ".$result." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("prof \t  session \t - ".$session." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("prof \t  ani \t - ".$ani." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("prof \t  dnis \t - ".$dnis." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("prof \t  callerdirection  \t - ".$callerdirection." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("prof \t  calleridname \t - ".$calleridname." - ".date("Y-m-d H:i:s"));

        $folder=substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'],"/")+1);

	$nextFile = "Vars.php";

        $objProf->SetNextUrl($nextFile);
        $objProf->SetResult("Profile");
        $objProf->SetParams('{"FirstMenu":"A"}');
        $objProf->SetDisplay("Customer Profile Search");
        $objProf->SetKey("tags");
        $objProf->SetAttribute("tags");
//        $objProf->SetDigits(1);
        $objProf->SetEventLog(true);

	$wrtLg->WriteFile("prof \t callString  \t - ".$objProf->GetResult()." - ".date("Y-m-d H:i:s"));
        print($objProf->GetResult());


?>
