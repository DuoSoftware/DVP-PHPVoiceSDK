<?php

/**
 * @author duosoft
 * @copyright 2016
 */
$conf = parse_ini_file('config.inc');
//$GLOBALS['host']=$conf['host'];
if($conf['port'] =='')
{
    $conf['port']='80';
}
if($conf['host'] =='')
{
    $conf['host']='127.0.0.1';
}
if($conf['context'] =='')
{
    $conf['context']='default';
}

$GLOBALS['port']=$conf['port'];
$GLOBALS['host']=$conf['host'];
$GLOBALS['context']=$conf['context'];

//print ($_SERVER['REQUEST_URI']);
//echo substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'],"/")+1);


?>
