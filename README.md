# DVP-PHPVoiceSDK
This module provides an HTTP based Telephony API using a Duo Voice application interface as well as a cached http file format interface.
It can use to create Custom IVR, send instructions to Duo voice application such as play file, dial number, voicemail etc.
it will communicate with http post methods and json strings.
Duo Voice application always send following parameters from post method.
      ________________________________________________________________________
      |  session          |     	Session Id                                  |
      |  ani              |	      Automatic Number Identification             |
      |  dnis             |	      Destination number Identification Service   |
      |  callerdirection  |	      Incomming  / outgoing                       |
      |  calleridname 	  |       Caller id                                           |
      |  result	DTMF      |       DTMF                                        |
      |_______________________________________________________________________|
                              Figure 1.0

http application has to reply  json string to the Duo Voice application with some parameters as follows,

       _____________________________________________________________
      |                                                             |
      |  {                                                          |
      |     "action": "playandgetdigits",                           |
      |     "file": "Duo_IVR_Menu.wav",                             |
      |     "nexturl": "http://ivr.veery.cloud/IVR/Process.php",      |
      |     "result": "result",                                     |
      |     "errorfile": "",                                        |
      |     "digittimeout": "20",                                   |
      |     "inputtimeout": "100",                                  |
      |     "loops": "2",                                           |
      |     "terminator": "#",                                      |
      |     "strip": "#",                                           |
      |     "maxdigits"3",                                          |
      |     "digits": "1"                                           |
      | }                                                           |
      |_____________________________________________________________|
                      Figure 1.1
                      
there were key parameters has in this string like “action”,”nexturl”
“action” -> this is a command what Duo voice application have to do now.
”nexturl” -> this is the instruction what duo voice application go to the next.

You can create a htttp scrip, what we have to do next and send it Duo Voice application from json string (Figure 1.1) as “nexturl”.
The Duo voice application do the process of json string (figure1.0) and sends parameters (Figure1.0) for the page which mentioned “nexturl” of json string (figure 1.1).


PHPVoiceLibrary

Usage

PHPVoiceLibrary has php classes to send instructions for the duo voice application to handle the incoming call as user needs, such as play file, dial number, voicemail etc.

         _                             _                           _
        | |                           | |                         | |
        | |                           | | <--------1------------- | |
        | |                           | | ---------2------------> | |
        | |                           | | <--------3------------- | |
        | | <---------4-------------- | |                         | |
        | | ----------5-------------> | |                         | |
        | |                           | | ---------6------------> | |
        |_|                           |_|                         |_|
      PHPVoiceLibrary             User Application            Duo Voice Application

	
1-> Duo Voice Application call the start page of User Created application
	It send following properties to start page using http post method
        result
        session ani
        dnis
        callerdirection
        calleridname


2 -> Start page returns a json string to the Duo Voice application as follows.

      “{
        "action":"playandgetdigits",
        "file":"Duo_IVR_Menu.wav",
        "nexturl":"http://ivr.veery.cloud/IVR/Process.php",
        "result":"result",
        "errorfile":"",
        "digittimeout":"20",
        "inputtimeout":"100",
        "loops":"2",
        "terminator":"#",
        "strip":"#",
        "maxdigits:"3",
        "digits":"1"
      }”

3 -> Duo Voice Application call the next page of User Created application (get from nexturl ) 
      ex:"nexturl":"http://ivr.veery.cloud/IVR/Process.php",
      And send following properties to that page using http post method
        result
        session ani
        dnis
        callerdirection
        calleridname
        
4 -> Set parameters and get result from Dialnumber script of phpvoice library.  

        $dialNum = new DialExtension ();
                
        $dialNum->SetNextUrl("http://ivr.veery.cloud/IVR/end.php");
        $dialNum->SetContext("TestInternalPbx");
        $dialNum->SetDialplan("XML");
        $dialNum->SetCallerName("1000");
        $dialNum->SetCallerNumber("1000");
        $dialNum->SetNumber("2001");
                 
        $result = $dialNum->GetResult();


5 -> 2nd page returns a json string to the User Application as follows.

      “{
        "action": "dialextension",
        "context": "TestInternalPbx",
        "nexturl": "http://ivr.veery.cloud/IVR/end.php",
        "dialplan": "XML",
        "callername": "1000", 
        "callernumber" : "1000", 
        "number" : "2001"
      }”


6 -> User Application returns a json string to the Duo Voice application as follows.

      “{
        "action": "dialextension",
        "context": "TestInternalPbx",
        "nexturl": "http://ivr.veery.cloud/IVR/end.php",
        "dialplan": "XML",
        "callername": "1000", 
        "callernumber" : "1000", 
        "number" : "2001"
      }”



