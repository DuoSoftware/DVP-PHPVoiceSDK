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
			        return true;
		        }
		        elseif($startTime <= $t && $t <= $ary[1])
		        {
			        //within ofc start time and holyday start time
				return false;
		        }
			elseif($ary[2] <= $t && $t <= $endTime)
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
			if ($startTime <= $t <= $endTime)
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
