<?php
include('config\boot.php');
if(isset($_GET['AID'])){
	$ID = $_GET['delete'];

	// delete Untersuchung
	$db->query(sprintf("DELETE FROM untersuchung_tbl WHERE AID=%d",$ID));
	// delete Aerzt
	$sql=sprintf("DELETE FROM aerzte_tbl WHERE AID=%d",$ID);
	$db->query($sql);

	$status->info("Aerzt geloescht.");
	$status->info("SQL: $sql");
}
echo $status->html();

