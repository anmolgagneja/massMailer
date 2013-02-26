<?php

include 'modules.php';

$unsubscribesJSONString=getUnsubscribes();
echo $unsubscribesJSONString."<br/><br/>";

$unsubscribesJSONArray=json_decode($unsubscribesJSONString,true);
echo "List of Addresses<br/>";
foreach ($unsubscribesJSONArray['items'] as $indiviUnsubDetail) {
	echo $indiviUnsubDetail['address']."<br/>";
	}
 
?>
