<?php
 	/**
	* @var $to
	* Change the email address with your email address
	*/

	$to = "Lynn8542@gmail.com"; #you will get all mails in this address
		
	/**
	* @var $name
	* @var $from
	* @var $phone
	* @var $message
	* @var $subject
	* @var $date
	*
	* CUSTOMIZE MESSAGE BODY:
	* {$from} {$name} {$phone} {$subject} {$message}
	* You can use the tags inside the $mailBody demo
	* to make your own message structure.
	*/
		 
	$from 		= trim($_POST['email']); 	#Sender Mail
	$message 	= trim($_POST['message']); 	#Sender Message
	$name 		= trim($_POST['name']); 	#Sender Name
	$phoneNo	= trim($_POST['phone']); 	#Sender phone
	$mailTopic	= trim($_POST['subject']); 	#Subject

	//check if the sender provide phone number
	if(empty($phoneNo)){
		$phone = "N/A";
	}else{
		$phone = $phoneNo;
	}

	$subject 	= "{$mailTopic} - [CONTACT]";	#Customize subject here
	$date 		= gmdate("m/d/Y g:i A");		#Current Date & Time
		
	#Message Body
	$mailBody = "
	<html>
	<body>
	<p>
	Sender Information<br/ >
	------------------
	<br />
	<strong>NAME :</strong> {$name} <br />
	<strong>EMAIL:</strong> {$from}<br />
	<strong>PHONE:</strong> {$phone}<br />
	</p>
	<p>
	{$message}	
	<br><br><br>
	---------------------------------
	<br>Date: {$date}
	</p>
	</body>
	</html>";
	
	$headers = "Content-type: text/html\r\n";
		
	#send the mail (if not empty)
	if(!empty($from) && !empty($message) && !empty($name)){
		$success = mail($to, $subject, $mailBody, $headers, "-f$from");
		
	#redirect to success page
		if ($success){
			echo "success";
		}else{
			echo "Something went wrong.";
		}
	}else{
		echo "Invalid approach.";
	}
