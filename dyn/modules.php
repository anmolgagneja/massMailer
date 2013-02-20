<?php
function sendMail($tomail,$subject,$htmlbody)
{
// Define values
$type = 'POST';
$returnTypes = array('xml' => 'text/xml',
'json' => 'application/json', 'html' => 'text/html' );
$data='apikey=904ac55d21c773185063394e9deb9161&from=anmol@thegeekbox.com&to='.$tomail.'&subject='.$subject.'&bodyhtml='.$htmlbody;
// Set up request
$ch = curl_init();
try
{
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_URL, 'http://emailapi.dynect.net/rest/json/send');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Accept: ' .
$returnTypes[$returnType]));

// Send request
$responseBody = curl_exec($ch);

// Get additional request information
$responseInfo = curl_getinfo($ch);

curl_close($ch);
}
catch (InvalidArgumentException $e)
{
curl_close($ch);
throw $e;
}
catch (Exception $e)
{
curl_close($ch);
throw $e;
}
return $responseBody;
}
