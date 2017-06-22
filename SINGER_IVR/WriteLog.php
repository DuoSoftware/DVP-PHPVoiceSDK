<?php

/**
 * @author achintha
 * @copyright 2014
 */
 
 class WriteLog
 {
    function WriteFile($text)
    {
        $File = "process.log"; 
        $Handle = fopen($File, 'a');
 
        fwrite($Handle, $text."\n"); 
        fclose($Handle);
    }
 }

 

?>