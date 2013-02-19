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
// function to send mail with recep vars
function sendMessageRecipVars()
{
ch = curl_init();

  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($ch, CURLOPT_USERPWD, 'api:key-9ce6orly1j84gmsso9bxm-mw45bh43x5');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/anmolgagneja.mailgun.org/messages');
curl_setopt($ch,
              CURLOPT_POSTFIELDS,
              array('from' => 'Excited User <me@samples.mailgun.org>',
                    'to' => 'anmol@thegeekbox.com,vibhutiwari321@gnail.com',
                    'subject' => 'Hello, %recipient.first%',
                    'text' => 'If you wish to unsubscribe, click http://mailgun/unsubscribe/%recipient.id%',
                    'recipient-variables' => '{"anmol@thegeekbox.com": {"first":"Anmol", "id":1}, "vibhutiwari321@gmail.com": {"first":"Vibhu", "id": 2}}'));

  $result = curl_exec($ch);
  curl_close($ch);
return $result;
}
?>
