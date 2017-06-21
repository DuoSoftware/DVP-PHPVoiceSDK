<?php

/**
 * @author achintha
 * @copyright 2014
 */
/*require_once("config.php");
        include_once("WriteLog.php");
$wrtLg = new WriteLog();
        $wrtLg->WriteFile("Csat");
*/
        require_once("PHPVoiceLibrary/class.Csat.php");
        require_once("config.php");
        include_once("WriteLog.php");

//        $objCsat = new Csat();
        $wrtLg = new WriteLog();
        $wrtLg->WriteFile("Csat");
	$objProcesCsat = new ProcessCsat();

//	$HTTP_RAW_POST_DATA='{"session":"28372490-589c-4bb8-8dcb-59e6f1522639","direction":"inbound","ani":"18705056550","dnis":"94112375000","name":"Extension 18705056550","result":"1","dev_params":{"profile":"583fbda78c8db300010bc307","result":"2"}}';

        $calldata = json_decode($HTTP_RAW_POST_DATA,true);
        $wrtLg->WriteFile("Csat \t - ".$HTTP_RAW_POST_DATA." - ".date("Y-m-d H:i:s"));

        $result= $calldata["result"];
        $session = $calldata["session"];
        $ani=$calldata["ani"];
        $dnis=$calldata["dnis"];
        $callerdirection=$calldata["direction"];
        $calleridname=$calldata["name"];

$time= date("H.i");  

      $wrtLg->WriteFile("Csat \t  result  \t - ".$result." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("Csat \t  session \t - ".$session." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("Csat \t  ani \t - ".$ani." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("Csat \t  dnis \t - ".$dnis." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("Csat \t  callerdirection  \t - ".$callerdirection." - ".date("Y-m-d H:i:s"));
        $wrtLg->WriteFile("Csat \t  calleridname \t - ".$calleridname." - ".date("Y-m-d H:i:s"));

	$result = $objProcesCsat->ProcessDigits($result,$session,$ani,$dnis,$callerdirection,$calleridname,$time);
//$result = $objProcesCsat->ProcessDigits("1","sasasassa","123","234","inbound","sss","sss");
	$wrtLg->WriteFile("ProcessCsat \t Csat.php \t -".$result."  - ".date("Y-m-d H:i:s"));
	print ($result);


  //      $folder=substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'],"/")+1);
//        $nextFile="RecordVoiceMail.php";
        $nextFile="end.php";
      $nextURL="end.php";
//	$result='{"action": "csat","nexturl": "end.php","result": "result","satisfaction":"bad","display": "SALES","profile": "test","company": "103","tenant": "1"}';
//	print('{"action": "csat","nexturl": "end.php","result": "result","satisfaction":"bad","display": "SALES","profile": "test","company": "103","tenant": "1"}');
//$wrtLg->WriteFile($result);
//print($result);
//        $objPlayFile->SetFile("voicemail.wav");

Class ProcessCsat
{

    function ProcessDigits($result,$session,$ani,$dnis,$callerdirection,$calleridname,$time)
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
                                $string = $this->Csat($nexFile,"result","","csat_good","good","test",true);
		                $wrtLg->WriteFile("ProcessCsat>>>>>>>>>>>case 1 >>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
		                return $string;
                            break;
                            
                            case 2:
				//PROJECT AND IMPLEMENTATION		
        	                $nextFile="Hangup.php";
                                $string = $this->Csat($nexFile,"result","","csat_bad","bad","test");
                                $wrtLg->WriteFile("ProcessCsat>>>>>>>>>>>case 2 >>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
                                return $string;
                            break;
                            
                            case 3:
				//SALSE AND MARKETING	
	                        $nextFile="Hangup.php";
				$string = $this->Csat($nexFile,"result","","csat_refused","refused","test");
                                $wrtLg->WriteFile("ProcessCsat>>>>>>>>>>>case 3 >>>>>>>>> -".$string."  - ".date("Y-m-d H:i:s"));
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
                $wrtLg->WriteFile("ProcessCsat>>>>>>>>>>> catch ----  >>>>>>>>> -".$ex."  - ".date("Y-m-d H:i:s"));
                return $ex;
            }
            
        }

 function Csat($nexturl,$result,$param,$display,$satisfaction,$profile)
        {
            try
             {
		$objCsat = new Csat();

	        $objCsat->SetNextUrl($nextFile);
	        $objCsat->SetResult($result);
	        $objCsat->SetParams('{"Params_Test":"test"}');
	        $objCsat->SetDisplay($display);
	        $objCsat->SetSatisfaction($satisfaction);
	        $objCsat->SetProfile($profile);
	        $objCsat->SetCompany("1");
	        $objCsat->SetTenant("1");

		$result = $objCsat->GetResult();
                return $result;
       
  	     }
            catch(exception $ex)
             {
                return $ex;
             }
        }

//        $wrtLg->WriteFile("csat \t callString  \t - ".$objCsat->GetResult()." - ".date("Y-m-d H:i:s"));
//        print($objCsat->GetResult());
}
?>

