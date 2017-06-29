<?php
    require("support.php");
    require("database.php");
    
    session_start();
    
    $db = new database("events");
	$database = $db->connectToDB();
    
    $fileToInsert = $_POST["fileUpload"];
    $eventID = $_POST["eventID"];
    $eventName = $_POST["eventName"];
    $date = $_POST["date"];
    $description = $_POST["description"];
    
    $fileData = addslashes(file_get_contents($fileToInsert));
    
    $sqlQuery = sprintf("insert into {$db->getTable()} (eventID, eventName, date, description, picture, email) values (%s, '%s', '%s', '%s', '%s', '%s')",
                        $eventID, $eventName, $date, $description, $fileData, $_SESSION["email"]);
    $result = mysqli_query($database, $sqlQuery);
    
    if($result){
        $body = "<h2>The following event has been created:</h2>";
        $body .= "<strong>ID: </strong>$eventID<br>";
        $body .= "<strong>Event Name: </strong>$eventName<br>";
        $body .= "<strong>Date: </strong>$date<br>";
        $body .= "<strong>Description: </strong>$description<br><br>";
    } else{
        $body = "<h2>Failed to add event</h2>";
    }
    
    $button = <<<EOBODY
    <form action="managerOptions.php" method="post">
        <input type="submit" value="Back to Options"/>
    </form>
EOBODY;

    $page = generatePage($body.$button,"Create Event");
    echo $page;
    
?>