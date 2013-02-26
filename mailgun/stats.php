<?php

include 'modules.php';

// opens data
$opensJsonString=getOpens();
echo "Opens JSON : ".$opensJsonString."</br>";
$opensJsonArray=json_decode($opensJsonString,true);
echo "Total Opens = ".$opensJsonArray['items'][0]['total_count']."</br></br>";

//clicks daa
$clicksJsonString=getClicks();
echo "Clicks JSON : ".$clicksJsonString."</br>";
$clicksJsonArray=json_decode($clicksJsonString,true);
?>
