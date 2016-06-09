<?php
// curl --header "Authorization: key=AIzaSyBcBNme0IqKYrO2WALhlR70D7dOjdXZbFU" --header "Content-Type:application/json" https://android.googleapis.com/gcm/send -d "{\"registration_ids\":[\"d7KshEoyFvA:APA91bHQyMpBfu2-7OcB7NrbVzaMrn9xEf0T9ZxPCdoM7mQkzS3FIagBXnbxI3lXTgUUTC9tUdgfpWQDMKpEMd2Hji9Iccoqa4VnBGaiLPRFDK0QLfh_Mosc940IJ5onBaBxfa-blaDS\"]}"
//Send Google cloud notification
define("GOOGLE_API_KEY", "AIzaSyBcBNme0IqKYrO2WALhlR70D7dOjdXZbFU");
define("GOOGLE_GCM_URL", "https://android.googleapis.com/gcm/send");

function send_gcm_notify($reg_ids, $message) {
 	echo "sending...\n";
    $fields = array(
		'registration_ids'  => $reg_ids,
		'data'              => array( "message" => $message ),
	);
				
	$headers = array(
		'Authorization: key=' . GOOGLE_API_KEY,
		'Content-Type: application/json'
	);
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, GOOGLE_GCM_URL);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

	$result = curl_exec($ch);
	if ($result === FALSE) {
		die('Problem occurred: ' . curl_error($ch));
	}
	curl_close($ch);
	echo "sended.\n";
 }
 $reg_ids = "d7KshEoyFvA:APA91bHQyMpBfu2-7OcB7NrbVzaMrn9xEf0T9ZxPCdoM7mQkzS3FIagBXnbxI3lXTgUUTC9tUdgfpWQDMKpEMd2Hji9Iccoqa4VnBGaiLPRFDK0QLfh_Mosc940IJ5onBaBxfa-blaDS";
 $message = "kuku epta";
 send_gcm_notify($reg_ids, $message);
?>