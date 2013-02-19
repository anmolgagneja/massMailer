<?php
// function to send the mail, enter comma seperated emails in to for batch send
function send_message($to,$subject,$htmlbody)
{
$curlini=curl_init();
curl_setopt($curlini,CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curlini,CURLOPT_USERPWD,'api:key-9ce6orly1j84gmsso9bxm-mw45bh43x5');
curl_setopt($curlini,CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curlini,CURLOPT_URL,'https://api.mailgun.net/v2/anmolgagneja.mailgun.org/messages');
curl_setopt($curlini,CURLOPT_POSTFIELDS,array ('from'=>'Anmol <postmaster@anmolgagneja.mailgun.org>','to'=>$to,'subject'=>$subject,'html'=>$htmlbody));
$result=curl_exec($curlini);
curl_close($curlini);
return $result;
}
?>
