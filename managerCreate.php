<?php
    require("support.php");
    
    $body = <<<EOBODY
    <form action="managerCreate2.php" method="post">
        <strong>Event Name: </strong><input type="text" name="eventName" required="required"/><br><br>
        <strong>Event ID: </strong><input type="number" min="0" max="9999" name="eventID" required="required"/><br><br>
        <strong>Date: </strong><input type="date" name="date" required="required"/><br><br>
        <strong>Picture to upload: </strong><input type="text" name="fileUpload" value="events.jpg"/><br><br>
        <strong>Event Description: </strong><br><textarea name="description" rows="8" cols="60"></textarea><br><br>
        <input type="submit" name="submit" value="Submit"/>&nbsp
        <input type="reset" name="reset" value="Reset Form"/><br><br>
        <input type="button" name="return" value="Return to Main Menu" onclick="window.location='managerOptions.php';"/>
    </form>
    
EOBODY;

    $page = generatePage($body,"Create Event");
    echo $page;

?>