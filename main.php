<?php
    require("support.php");
    
    if(isset($_POST["managerLogin"])){
        header("Location: managerLogin.php");
    } elseif(isset($_POST["participantLogin"])){
        header("Location: participantLogin.php");
    } elseif(isset($_POST["signUp"])){
        header("Location: signUp.html");
    }

    $body = <<<EOBODY
    <h2>Plan and Join Events Near You!</h2>
    <form action="main.php" method="post">
        <input type="submit" name="managerLogin" value="Event Manager Login"/><br><br>
        <input type="submit" name="participantLogin" value="Participant Login"/><br><br>
        <input type="submit" name="signUp" value="Sign up for free!"/>
    </form>

EOBODY;

    $page = generatePage($body,"Event Organizer");
    echo $page;
?>