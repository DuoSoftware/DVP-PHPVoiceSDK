<?php
//$target_path = "C:/wamp/www/IVR/upload/";

require_once('../PHPMailer/class.phpmailer.php');


class UploadFile
{ 
    private $fileName="";
    private $tmpName="";
    private $sessionid="";
    private $error="";
    private $location="uploads/";

function SET($fileArray,$request)
    {    
    /* print_r($array);
     print("<br/>");
     print_r($request);
     print("<br/>");
        */
       if(array_key_exists('sessionid', $request))  
        {    
          if($request['sessionid']!="")
          { 
            if(!empty($fileArray)&&($fileArray['filename']['size']>0))
            {
                if((array_key_exists('name', $fileArray['filename']))&&(array_key_exists('type', $fileArray['filename'])))
                {
                    $this->fileName=$fileArray['filename']['name'];
                    $this->tmpName=$fileArray['filename']['tmp_name'];
                    $this->sessionid=$request['sessionid'];
                }
                else
                {
                   $this->error= "missing file array parameter";
                    //return 
                }                
            }
            else
            {
                //return 
                 $this->error="no file to upload";
            }          
          }
          else
          {
            $this->error="missing sessionid";
            //return 
          }  
        }
        else
        {
            $this->error= "request array empty";
        }    
    }


function getResult()
    {
        return ($this->fileName."-------".$this->tmpName."-------------".$this->sessionid);
    }


function MoveFile($location)
    {
    try
      { 
        if($this->error =="")
        {
          //print $this->tmpName;
            if(move_uploaded_file($this->tmpName, $location.$this->fileName)) 
              {
                 //echo "The file ". $this->fileName." has been uploaded";
                 return true;
              }
            else
              {
                 //echo "There was an error uploading the file, please try again!";
                 //$wrtLg->WriteFile("UploadFile - ".$target_path."- error uploading the file - ".date("Y-m-d H:i:s"));
                 return false;   
              }
        }
        else
        {
            return $this->error;
        }
        
      }
    catch(exception $ex)
      {
       return $ex;
      }
    }


public function GetSessionID()
    {
     try
      {
        if($this->error=="")
        {
            return $this->sessionid;
        }
        else
        {
            return $this->error;
        }     
      }
     catch(exception $ex)
      {
       return $ex;
      }         
    }


public function GetFileName()
    {
     try
      {
        if($this->error=="")
        {
            return $this->fileName;
        }
        else
        {
            return $this->error;
        }     
      }
     catch(exception $ex)
      {
       return $ex;
      }         
    }
    
    
public function GetTemparyFileName()
    {
     try
      {
        if($this->error=="")
        {
            return $this->tmpName;
        }
        else
        {
            return $this->error;
        }     
      }
     catch(exception $ex)
      {
       return $ex;
      }         
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////
/*
function Email($file,$callerID,$emailAddress)
    {
      //$wrtLg = new WriteLog();
      try
        {                 
          $mail = new PHPMailer();
        
            $body ="you have a Voice-mail from ".$callerID." at ".date("Y-m-d H:i:s");
            //$body             = eregi_replace("[\]",'',$body);
    
                $mail->IsSMTP(); // telling the class to use SMTP
                //$mail->Host       = "mail.yourdomain.com"; // SMTP server
                //$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                                           // 1 = errors and messages
                                                           // 2 = messages only
                $mail->SMTPAuth   = true;                  // enable SMTP authentication
                $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
                $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
                $mail->Port       = 587;                   // set the SMTP port for the GMAIL server
                $mail->Username   = "chathurangani.mihiri@gmail.com";  // GMAIL username
                $mail->Password   = "mihiri123456";            // GMAIL password
                
                $mail->SetFrom('achinthau@gmail.com', 'Voice-mail');
                
                //$mail->AddReplyTo("name@yourdomain.com","First Last");
                
                //$mail->Subject    = "Voice-mail to e-mail";
                $mail->Subject    = "From ".$callerID." at ".date("Y-m-d H:i:s");
                
                //$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
                
                $mail->MsgHTML($body);
                
                $address = "achintha@duosoftware.com";
                $mail->AddAddress($address, "sukitha");
                
                $mail->AddAttachment($file);      // attachment
                //$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
    
            if(!$mail->Send())
             {
              return "Mailer Error: " . $mail->ErrorInfo;
             } 
             else 
             {
              return "Message sent!";
             }
       
       }
      catch(exception $ex)
       {
        $wrtLg->WriteFile("Catch Error - ".$ex." - ".date("Y-m-d H:i:s"));
       }
    }
*/
//////////////////////////////////////////////////////////////////////////////////////////////////////

}
?>