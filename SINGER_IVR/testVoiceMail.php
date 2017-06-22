<?php
/*$time= date("H:i");
print($timei."\n");
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");
*/

//Class IsHolyday
//{
$date=$d=date("Y-m-d");
$result = IsVoicemail($date,"myCSVFile.csv","18:00","23:00");

print ("\n".$result."\n");

function IsVoicemail($date,$holydayFile,$startTime,$endTime)
{
	$day = getdate()[weekday];

	if ($day != "Saturday" && $day != "Sunday")
	{
		$ary = getHoliday($date,$holydayFile);
		$t=date("H:i");
		if($ary)
		{
		//	$t=date("H:i");
		        if($ary[1] <= $t && $t <= $ary[2])
		        {
				//VOICEMAIL;
				return "VM T within configured leave time";
			        return true;
		        }
		        elseif($startTime <= $t && $t <= $ary[1])
		        {
			        //within ofc start time and holyday start time
				return "within ofc start time and holyday start time";
				return false;
		        }
			elseif($ary[2] <= $t && $t <= $endTime)
                        {
                                //within holyday end time and ofc end time
				return "within holyday end time and ofc end time";
                                return false;
                        }
			else
			{
				return "VM T holyday other times ";
				return true;
			}

		}
		else
		{
			if ($startTime <= $t && $t <= $endTime)
			{
				//OFC hours
				return "OFC hours";
				return false;
			}
			else
			{
				//after OFC
				return "VM T after OFC";
				return true;
			}
//			echo "RUN>>>>>>>>>>>>>>>>>>>>";
		}
	}
	else
	{
		//Saturday and Sunday
		return "VM T Saturday and Sunday";
		return true;
	}
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

//}
?>
