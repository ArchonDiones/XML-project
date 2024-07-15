<?php
include('config/boot.php');

if(isset($form['aerzt']))
	{
	$form = $_POST['aerzt'];
	}
if(isset($form['AID']))
    {
    $AID = $form['AID']+0;
    }
else
    {
    $AID = $_GET['AID']+0;
    }

if($AID == 0)
    { // new aerzt, no data
    $title = "Add New Aerzt";
    $aerzt = array();
    }
else if(isset($form))
    { // save/update aerzt
    $title = "Edit aerzt";
    }
else
    { // edit aerzt
    $title = "Edit aerzt";
    $result = $db->query("
		SELECT *
		FROM Aerzte_TBL
		WHERE AID = ".($AID)."
	    ");
    $aerzt = $result->fetch_assoc();
   }

if(isset($_POST['aerzt']))
    { // if any data posted -> validate and update data
		$form = $_POST['aerzt'];
		if(strlen(trim($form['FName']))<=3)
			$status->error("FName should be more than 3 character.");
		
		if(strlen(trim($form['LName']))<=4)
			$status->error("ADDRESS should be more than 4 characters.");

		if($status->success())
		{
			//if($AID == 0)
			//{ // no AID -> insert
			//$db->query(sprintf(
			//	"INSERT INTO Aerzte_TBL(FName, LName, Fach, EIdN) VALUES('%s','%s','%s','%s')",
			//	db_escape($form['FName']),
			//	db_escape($form['LName']),
			//	db_escape($form['Fach']),
			//	db_escape($form['EIdN']),
			//	));

			//$status->info("Aerzt successfully saved.");
			//}
			//	else
			//	{ // update
			$db->query(sprintf(
				"UPDATE Aerzte_TBL
				SET FName='%s', LName='%s', Fach='%s', EIdN='%s'
				WHERE AID=%d",
				$db->real_escape_string(trim($form['FName'])),
				$db->real_escape_string(trim($form['LName'])),
				$db->real_escape_string(trim($form['Fach'])),
				$db->real_escape_string(trim($form['EIdN'])),
				$AID
				));
			$status->info("Aerzt successfully updated.");
			//}
		}
	}
else
	{ // if no data submitted -> fill the form with data from the DB
	$form = $aerzt; 
	}

echo "<h1>$title</h1>";
echo $status->html();

echo "<form aid='aerzt-edit-form' action='aerzt-edit.php' enctype='multipart/form-data' method='post'>";
echo "<input type='hidden' name='aerzt[AID]' value='".htmlspecialchars($form['AID'])."'/>";
echo "<p><label>FName</label><input name='aerzt[FName]' class='txt medium' value='".htmlspecialchars($form['FName'])."'/></p>";
echo "<p><label>LName</label><input name='aerzt[LName]' class='txt medium' value='".htmlspecialchars($form['LName'])."'/></p>";
echo "<p><label>Fach</label><input name='aerzt[Fach]' class='txt medium' value='".htmlspecialchars($form['Fach'])."'/></p>";
echo "<p><label>EIdN</label><input name='aerzt[EIdN]' class='txt medium' value='".htmlspecialchars($form['EIdN'])."'/></p>";
echo "<p><input type='submit' value='Save'/></p>";
echo "</form>";
