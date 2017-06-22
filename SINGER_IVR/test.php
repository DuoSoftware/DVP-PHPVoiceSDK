<?php

$str = "Hello world!";
print ("\n".stristr($str," ",true)."\n");
print ("\n".trim(strrchr($str," "))."\n");

//echo chunk_split($str," ");

?>
