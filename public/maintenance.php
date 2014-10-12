<?php

$mysqli = new mysqli('127.0.0.1', 'root', 'root', 'westie');
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->query("UPDATE events SET event_status = 'suspended' WHERE event_end_date < NOW() AND event_status != 'archived'");
$res = $mysqli->query("SELECT * FROM events WHERE (event_end_date BETWEEN DATE_SUB(NOW(), INTERVAL 1 DAY) AND NOW() AND event_status = 'suspended');");

while ($eventModel = $res->fetch_object()) {
	if ($eventModel->event_contact_email ) {
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: cara.mcilnay@gmail.com'."\r\n";
		
		$message = "
			<html>
			<head>
			   <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
			   <title>Time to renew your event</title>
			</head>
			<body>
			   <p>It has been a while since the west coast swing event you created on thewestiemap.com has been updated and we want to make sure that all of the details are still up to date.</p>
			   <p>Please note that you must review your event (by clicking the link below) if you want others to be able to see it.</p>
			   <p>To review your event, click <a href='http:\/\/westie.localhost/events/review/$eventModel->event_id'>HERE</a></p>
			</body>
			</html>
		";
		mail($eventModel->event_contact_email, 'Time to renew your event', $message,$headers);
	} else $mysqli->query("UPDATE events SET event_status = 'archived' WHERE event_id = $eventModel->event_id".";");
}