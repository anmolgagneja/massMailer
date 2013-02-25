<?php

// function to send mail with recep vars
function sendMessageRecipVars($tostring,$recipvarstring,$subject,$body)
{
  	$ch = curl_init();

 	 curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  	curl_setopt($ch, CURLOPT_USERPWD, 'api:key-9ce6orly1j84gmsso9bxm-mw45bh43x5');
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  	curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/anmolgagneja.mailgun.org/messages');
  	curl_setopt(
      			$ch,
      			CURLOPT_POSTFIELDS,
      			array(
          			'from' => 'Saliraganar <email@saliraganar.com>',
	  			'to' => $tostring,
	  			'subject' => $subject,
	  			'html' => $body,
	  			'recipient-variables' => $recipvarstring));
 
  	$result = curl_exec($ch);
  	curl_close($ch);
	return $result;
}
function getOpens()
{
	$ch = curl_init();
 	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  	curl_setopt($ch, CURLOPT_USERPWD, 'api:key-9ce6orly1j84gmsso9bxm-mw45bh43x5');
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  	curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/anmolgagneja.mailgun.org/stats?event=opened');
	$result = curl_exec($ch);
	curl_close();
	return $result;	
}
function getClicks()
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  	curl_setopt($ch, CURLOPT_USERPWD, 'api:key-9ce6orly1j84gmsso9bxm-mw45bh43x5');
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  	curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/anmolgagneja.mailgun.org/stats?event=clicked');
	$result = curl_exec($ch);
	curl_close();
	return $result;	
}
?>
