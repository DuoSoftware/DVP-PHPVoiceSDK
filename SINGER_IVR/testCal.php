<?php
/*$time= date("H:i");
print($timei."\n");
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");
*/

$day = getdate()[weekday];


echo $day;
//>>>>>>>>>>>>>>>>>>>>>>>>>
$company = "2";
if ($day != "Saturday" && $day != "Sunday")
{
$IVRStatus = IsRunIVR($company);
}
else
{
echo "VOICE MAIL WEEKEND >>>>>>>"
}



function IsRunIVR($company)
{
	switch($company)
	{
	case 1:
        return 'myCSVFile.csv';
	break;

	case 2:
        return 'myCSVFile.csv';
        break;

	default:
	return 'myCSVFile.csv';
	}
}


//>>>>>>>>>>>>>>>>>>>>>>>>>>
$d=date("Y-m-d");
//$d="2017-03-12";
$fileName='myCSVFile.csv';
$ary=getHoliday($d,$fileName);

print_r($ary);

if($ary)
{
$t=date("H:i");
	if($ary[1] <= $t && $t <= $ary[2])
	{
	echo "VOICEMAIL >>>>>>";
	}
	else
	{
	echo "HALF DAY IVR >>>>>>";
	}
}
else
{
echo "RUN>>>>>>>>>>>>>>>>>>>>";
}



function getHoliday($d,$fileName)
{
$file = fopen($fileName, 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  //$line is an array of the csv elements
if($line[0]==$d)
{
//  print_r($line);
//exit;
return $line;
}
}
fclose($file);
}
?>
