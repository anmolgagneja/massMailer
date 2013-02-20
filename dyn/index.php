<?php
include 'modules.php';
if (isset($_POST['tomail']))
{
echo sendmail($_POST['tomail'],$_POST['subject'],$_POST['htmlbody']);
}
?>
<form action="index.php" method="post">
To: <input type="text" name="tomail" /><br/>
Subject: <input type="text" name="subject" /><br/>
HTML Body: <input type="text" name="htmlbody" /><br/>
<input type="submit"/>
</form>
