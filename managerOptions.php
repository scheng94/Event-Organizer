<?php
    require("support.php");
    
    session_start();
    
    if(isset($_POST["create"])){
        header("Location: managerCreate.php");
    } elseif(isset($_POST["view"])){
        header("Location: managerView.php");
    } elseif(isset($_POST["return"])){
        header("Location: main.php");
    }
    
    $body = <<< EOBODY
    <h2>Welcome {$_SESSION['firstName']}!</h2>
    <form action="managerOptions.php" method="post">
        <input type="submit" name="create" value="Create Event"/><br><br>
        <input type="submit" name="view" value="View My Events"/><br><br>
        <input type="submit" name="return" value="Log Out"/>
    </form>
EOBODY;

    $page = generatePage($body,"Manager Options");
    echo $page;
?>