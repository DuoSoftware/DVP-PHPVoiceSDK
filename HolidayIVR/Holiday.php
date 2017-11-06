<?php
require_once("CheckHolyday.php");

$objHolidayCalander = new IsHolyday();
$date=date("Y-m-d");
$result = $objHolidayCalander->IsVoicemail($date,"myCSVFile.csv","5:45","6:00");
if($result=="true")
{
 // forward to voicemail
echo "OFF\n";
}
else
{
echo "WORK\n";
}

?>
