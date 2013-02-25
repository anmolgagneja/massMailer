<?php

include 'modules.php';

$opensJsonString=getOpens();
$opensJsonArray=json_decode($opensJsonString,true);

echo $opensJsonArray['items'][0]['total_count'];

?>
