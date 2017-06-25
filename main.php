<?php
    require("support.php");
    
    if(isset($_POST["managerLogin"])){
        header("Location: managerLogin.php");
    } elseif(isset($_POST["participantLogin"])){
        header("Location: participantLogin.php");
    }

    $body = <<<EOBODY
    <h2>Plan and Join Events Near You!</h2>
    <form action="main.php" method="post">
        <input type="button" name="managerLogin" value="Event Manager Login"/><br><br>
        <input type="button" name="participantLogin" value="Participant Login"/>
    </form>

EOBODY;

    $page = generatePage($body,"Event Organizer");
    echo $page;
?>