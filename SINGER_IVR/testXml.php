<?php
$number="1234567";

        $url= 'http://192.168.4.7/DVP-PHPVoiceSDK/BOC/decodeXml.php?xmlData='.$number;
//        $url= 'http://192.168.4.7/DVP-PHPVoiceSDK/BOC/decodeXml.php?xmlData='.$d;
//      $url= 'http://requestb.in/u1z3l8u1??xmlData="'.$d.'"';
/*      $url= 'http://192.168.4.7/DVP-PHPVoiceSDK/BOC/decodeXml.php?xmlData="<?xml version="1.0"?><boc><header><mobileno>'.$number.'</mobileno><txncode>3440000</txncode><tkn>BOC9999999</tkn><pdate>20170308</pdate><seqno>9999</seqno><prefix>3</prefix><msgtype>0200</msgtype><sendto>QueueName</sendto><replyto>QueueName</replyto></header></boc>"';*/
print($url."\n");
//Get Url data From file_get_content
        $data = file_get_contents($url);
print("gggggggggggggggg".$data."\n");
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
        print_r($array["details"]["body"]["accno"]);
	print ("\ncount = ".count($array["details"]["body"]["accno"])."\n");

?>
