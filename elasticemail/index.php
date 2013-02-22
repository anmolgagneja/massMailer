<?php
include 'modules.php';
# Demo :
$ee = new BaseElasticEmail();

if (isset($_POST['towithrecip']))
  {
    $adresestring=trim($_POST['towithrecip']);
    $adreses=explode(' ',$adresestring);
    $csv  = '"ToMail","FirstName"'."\n";
    foreach ($adreses as $indadres)
      {
	$indadresarr=explode(',',$indadres);
	$names[]=$indadresarr[0];
	$mails[]=$indadresarr[1];
      }
    $tostring=implode(',',$mails);
    foreach($mails as $key=>$xx)
      {
	$csv.='"'.$xx.'","'.$names[$key].'"'."\n";
      }


echo $ee->mailMerge($csv, "email@saliraganar.com", "Saliraganar",$_POST['subjectwithrecip'], $_POST['htmlbodywithrecip']);    
  }


?>
<form action="index.php" method="post">
Use {FirstName} for first name<br/>
  To. (comma seperated and space seperated like Anmol,anmol@thegeekbox.com Vibhu,vibhutiwari321@gmail.com do not use spaces in first name) <input type"text" name="towithrecip"/><br/>
Subject <input type="text" name="subjectwithrecip"/><br/>
HTML Body <input type="text" name="htmlbodywithrecip"/></br/>
<input type="submit"/>
</form>
