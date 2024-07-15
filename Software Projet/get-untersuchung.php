<?php
include('config/boot.php');

$aerzt_aid = $_GET['id'] + 0;

$dbcursor = $db->query("
	SELECT AID
	FROM Aerzte_TBL
	WHERE AID = '$aerzt_aid'
	");

$aerzt = $dbcursor->fetch_object();

$dbcursor = $db->query("
   SELECT U.UntID, U.AID, P.PID
   FROM Untersuchung_TBL U, Patient_TBL P
   WHERE U.AID='$aerzt_aid' AND U.PID = P.PID
   ");

$untersuchungen = [];
while($helpuntersuchungen = $dbcursor->fetch_object()) $untersuchungen[] = $helpuntersuchungen;

$response = new stdClass();
$response->aerzt = $aerzt;
$response->untersuchungen = $untersuchungen;

echo json_encode($response);
?>
