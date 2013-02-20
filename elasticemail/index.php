<?php
class BaseElasticEmail
{
	
	private $userName  = "vibhutiwari321@gmail.com";
	private $apiKey = "ae0d2070-ee37-4f31-a077-1266c909ea47";
	
	function __construct($userName=NULL,$apiKey=NULL)
	{
		if($userName != NULL) $this->userName = $userName;
		if($apiKey != NULL)   $this->apiKey = $apiKey;
	}

	function uploadAttachment($content, $fileName)
	{
		$res = "";
		$header = "PUT /attachments/upload?username=".urlencode($this->userName)."&api_key=".urlencode($this->apiKey)."&file=".urlencode($fileName)." HTTP/1.0\r\n";
		$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$header .= "Content-Length: " . strlen($content) . "\r\n\r\n";
		$fp = @fsockopen("ssl://api.elasticemail.com", 443, $errno, $errstr, 30);
		if(!$fp)
		{
			return "ERROR. Could not open connection";
		}
		else
		{
			fputs ($fp, $header.$content);
			while (!feof($fp))
			{
				$res .= fread ($fp, 1024);
			}
			fclose($fp);
		}
                $res=substr($res,-9);
		return $res;
	}

	/**
	 * Sending emails with Elastic MailMerge
	 * @param string $csv Content of the CSV File to send
	 * @param string $from
	 * @param string $fromName
	 * @param string $subject
	 * @param string $bodyText
	 * @param string $bodyHTML
	 */
	function mailMerge($csv, $from, $fromName, $subject, $bodyText, $bodyHTML=NULL)
	{
		$csvName = 'mailmerge.csv';
		$attachID = $this->uploadAttachment($csv, $csvName);
		$res = "";
		$data = "username=".urlencode($this->userName);
		$data .= "&api_key=".urlencode($this->apiKey);
		$data .= "&from=".urlencode($from);
		$data .= "&from_name=".urlencode($fromName);
		$data .= "&subject=".urlencode($subject);
		$data .= "&data_source=".urlencode($attachID);
		if($bodyHTML) $data .= "&body_html=".urlencode($bodyHTML);
		if($bodyText) $data .= "&body_text=".urlencode($bodyText);

		$header = "POST /mailer/send HTTP/1.0\r\n";
		$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$header .= "Content-Length: " . strlen($data) . "\r\n\r\n";
		$fp = @fsockopen('ssl://api.elasticemail.com', 443, $errno, $errstr, 30);
		if(!$fp)
		{
			return "ERROR. Could not open connection";
		}
		else
		{
			fputs ($fp, $header.$data);
			while (!feof($fp))
			{
				$res .= fread ($fp, 1024);
			}
			fclose($fp);
		}
		return $res;
	}
}

# Demo :
$ee = new BaseElasticEmail();

$csv  = '"ToMail","Title","FirstName","LastName"'."\n";
$csv .= '"anmol@thegeekbox.com","Mr","Anmol","Gagneja"'."\n";
$csv .= '"armaan@thegeekbox.com","Mr","Armaan","Gagneja"'."\n";

$text = 'Hello {Title} {LastName}, your first name is {FirstName}.';

echo $ee->mailMerge($csv, "demo@example.com", "Demo", "Demo Mail Merge", $text);
?>
