<?php
/*$time= date("H:i");
print($timei."\n");
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");
*/
Class IsHolyday
{
function IsVoicemail($date,$holydayFile,$startTime,$endTime)
{
 $dateget=getdate();
$day =  $dateget['weekday'];
//	$day = getdate()[weekday];

if(strpos($startTime,":") == 1)
{
$startTime = "0".$startTime;
//print ("0".$startTime);
}
if(strpos($endTime,":") == 1)
{
$endTime = "0".$endTime;
//print ("0".$startTime);
}

	if ($day != "Saturday" && $day != "Sunday")
	{
		$ary = $this->getHoliday($date,$holydayFile);
		$t=date("H:i");
		if($ary)
		{
			$holidayStart=$ary[1];
			$holidayEnd=$ary[2];
			if(strpos($ary[1],":") == 1)
			{
			$holidayStart= "0".$ary[1];
			}
			if(strpos($ary[2],":") == 1)
                        {
                        $holidayEnd= "0".$ary[2];
                        }

		//	$t=date("H:i");
			if($t <= $startTime || $endTime <= $t)
                        {
                                //VOICEMAIL;
                                return true;
                        }
		        elseif($holidayStart <= $t && $t <= $holidayEnd)
		        {
				//VOICEMAIL;
			        return true;
		        }
		        elseif($startTime <= $t && $t <= $holidayStart)
		        {
			        //within ofc start time and holyday start time
				return false;
		        }
			elseif($holidayEnd <= $t && $t <= $endTime)
                        {
                                //within holyday end time and ofc end time
                                return false;
                        }
			else
			{
				return true;
			}
		}
		else
		{
			if ($startTime <= $t && $t <= $endTime)
			{
				//OFC hours
				return false;
			}
			else
			{
				//after OFC
				return true;
			}
//			echo "RUN>>>>>>>>>>>>>>>>>>>>";
		}
	}
	else
	{
		//Saturday and Sunday
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
}
?>
