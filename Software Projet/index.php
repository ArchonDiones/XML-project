<?php
include('config/boot.php');

$res = $db->query("
	SELECT *
	FROM Aerzte_TBL 
	ORDER BY AID
	");
$aerzte = array();
while($a = $res->fetch_object()) $aerzte[] = $a;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Aerzte</title>
	
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<link rel="stylesheet" type="text/css" href="css/default.css">

	<script type="text/javascript" src="js/jquery-2.1.3.js"></script>
	<script type="text/javascript" src="js/application.js"></script>
</head>
<body>
	<table class='layout'>
		<tr>
			<td class='panel'>
			<h1>Aerzte</h1>
			<table class='grid'>
				<tr>
					<th>AID</th>
					<th>FName</th>
					<th>LName</th>
					<th>Fach</th>
				<tr>
				<?php
					foreach($aerzte as $a) {
						echo "<tr>
							<td>".$a->AID."</td>
							<td>".$a->FName."</td>
							<td>".$a->LName."</td>
							<td>".$a->Fach."</td>
							<td>
								<a href='get-untersuchung.php?id=".$a->AID."' class='icon view_icon aerzt-show-untersuchung'>Zeigt Untersuchungen</a>
							</td>
							<td>
								<a href='aerzt-edit.php?id=".$a->AID."' class='icon edit_icon aerzt-edit'>Edit</a>
							</td>
							<td>
								<a href='aerzte-delete.php?id=".$a->AID."' class='icon delete_icon aerzt-delete'>Delete</a>
							</td>
						</tr>";
					}
				?>
			</table>
			<p>
				<a href='person-edit.php' class='icon add_icon person-edit'>Add new person</a>
				<a href='./' class='icon refresh_icon'>Refresh</a>
			</p>
			</td>
			<td class='panel'>
				<div id='Untersuchungen'>
				</div>
			</td>
		</tr>
		<tr>
			<td class='panel'>
				<h1>Verkaeufe</h1>
				<div id='verkaeufe-list'>
					<p class='icon info_icon'>Waehlen Sie eine Untersuchung, um ... .</p>
				</div>
			</td>
			<td class='panel'>
				<div id='verkauf-details'>
				</div>
			</td>
		</tr>
	</table>
</body>
</html>