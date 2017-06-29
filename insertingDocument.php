<?php
	/* Inserts image */
	require_once("support.php");	

	$host = "localhost";
	$user = "student";
	$password = "goodbyeWorld";
	$database = "myDB";
	$table = "docs";
	$db = connectToDB($host, $user, $password, $database);
	
	$fileToInsert = "JimHenson.jpg";
	$docMimeType = "image/jpeg";
	
	$fileData = addslashes(file_get_contents($fileToInsert));
	
	$sqlQuery = "insert into $table (docName, docMimeType, docData) values ";
	$sqlQuery .= "('{$fileToInsert}', '{$docMimeType}', '{$fileData}')";
	$result = mysqli_query($db, $sqlQuery);
	if ($result) {
		$body = "<h3>Document $fileToInsert has been added to the database.</h3>";
	} else { 				   ;
		$body = "<h3>Failed to add document $fileToInsert: ".mysqli_error($db)." </h3>";
	}
		
	/* Closing */
	mysqli_close($db);
	
	echo generatePage($body);

function connectToDB($host, $user, $password, $database) {
	$db = mysqli_connect($host, $user, $password, $database);
	if (mysqli_connect_errno()) {
		echo "Connect failed.\n".mysqli_connect_error();
		exit();
	}
	return $db;
}
?>