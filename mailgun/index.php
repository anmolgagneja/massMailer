<?php
include 'modules.php';
if (isset($_POST['to']))
{
echo send_message($_POST['to'],$_POST['subject'],$_POST['htmlbody']);
}
if (isset($_POST['towithrecip']))
  {
    $adresestring=trim($_POST['towithrecip']);
    $adreses=explode(' ',$adresestring);
    foreach ($adreses as $indadres)
      {
	$indadresarr=explode(',',$indadres);
	$names[]=$indadresarr[0];
	$mails[]=$indadresarr[1];
      }
    $tostring=implode(',',$mails);
    foreach($mails as $key=>$xx)
      {
	$recipsdataarr[$xx]['first']=$names[$key];
      }
    $recipVarString=json_encode($recipsdataarr);
    echo sendMessageRecipVars($tostring,$recipVarString,$_POST['subjectwithrecip'],$_POST['htmlbodywithrecip']);
  }

?>
<form action="index.php" method="post">
To: (comma separated) <input type"text" name="to"><br/>
Subject: <input type="text" name="subject"/><br/>
HTML Body: <input type="text" name="htmlbody"/><br/>
<input type="submit"/>
</form>

Trans mail with recip variables
  (use %recipient.first% for recipients first name)
<form action="index.php" method="post">
  To. (comma seperated and space seperated like Anmol,anmol@thegeekbox.com Vibhu,vibhutiwari321@gmail.com do not use spaces in first name) <input type"text" name="towithrecip"/><br/>
Subject <input type="text" name="subjectwithrecip"/><br/>
HTML Body <input type="text" name="htmlbodywithrecip"/></br/>
<input type="submit"/>
</form>

  
