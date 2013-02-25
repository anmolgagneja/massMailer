<?php
include 'modules.php';

$adresestring='Anmol,anmol@thegeekbox.com Vibhu,vibhutiwari92@yahoo.in Armaan,armaan@thegeekbox.com XYZ,xyz@thegeekbox.com ABC,abc@thegeekbox.com';
$adreses=explode(' ',$adresestring);
foreach ($adreses as $indadres) {
	$indadresarr=explode(',',$indadres);
	$names[]=$indadresarr[0];
	$mails[]=$indadresarr[1];
      }
$tostring=implode(',',$mails);
foreach($mails as $key=>$xx) {
	$recipsdataarr[$xx]['first']=$names[$key];
      }
$recipVarString=json_encode($recipsdataarr);
echo sendMessageRecipVars($tostring,$recipVarString,'Sample Mailgun E-mail with unsubscribe link','<html>Sample Mailgun HTML E-mail with unsubscribe link included</html>');
	
?>

  
