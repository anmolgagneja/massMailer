<?php
include 'modules.php';
if (isset($_POST['to']))
{
echo send_message($_POST['to'],$_POST['subject'],$_POST['htmlbody']);
}
sendMessageRecipVars();
?>
<form action="index.php" method="post">
To: (comma separated) <input type"text" name="to"><br/>
Subject: <input type="text" name="subject"/><br/>
HTML Body: <input type="text" name="htmlbody"/><br/>
<input type="submit"/>
</form>
