<?php
	require_once('MySQLDB.class.php');
	global $db_connector;
	$mode = isset($_GET["mode"]) ? $_GET["mode"] : "";
	if ($mode == "getnote") {
		$date = $_GET["date"];

		$retrive_note = "SELECT * FROM notes WHERE date='".$date."'";
		$notes = $db_connector->query($retrive_note);
		$jsonData = array();
		while($row = $notes->fetch_assoc() ) {
			$jsonData[] = $row;
		}
		echo json_encode($jsonData);
	} else if ($mode == "savenote") {
		$date = $_GET["date"];
		$note1 = $_GET["note1"];
		$note2 = $_GET["note2"];
		$note3 = $_GET["note3"];
		$retrive_note = "SELECT * FROM notes WHERE date='".$date."'";
		$notes = $db_connector->query($retrive_note);
		if($notes->num_rows > 0) {
			$q = "UPDATE notes SET note_1='{$note1}', note_2='{$note2}', note_3='{$note3}' WHERE date='{$date}'";
			$result = $db_connector->query($q);
		} else {
			$q = "INSERT INTO notes(date, note_1, note_2, note_3) VALUES ('{$date}', '{$note1}', '{$note2}', '{$note3}')";
			$result = $db_connector->query($q);
		}
		
		echo json_encode(array('result'=>$result));
	}
