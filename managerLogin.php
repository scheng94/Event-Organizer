<?php
    require("support.php");
    require("database.php");
    
    if(isset($_POST["submit"])){
        $db = new database("users");
        $database = $db->connectToDB();
        
        $sqlQuery = sprintf("select * from {$db->getTable()}");
        $result = mysqli_query($database, $sqlQuery);
    
        if($result){
            $numberOfRows = mysqli_num_rows($result);
            if ($numberOfRows == 0) {
                $body = "<h2>No entries exists in the table.</h2>";
            } else {
                $body = "";
                $check = 0;
                while ($recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $email = $recordArray['email'];
                    $userPW = $recordArray['password'];
                    $accountType = $recordArray['accountType'];
                
                    if($_POST["password"] == $userPW && $_POST["email"] == $email && $accountType == 'M'){
                        header("Location: managerOptions.php");
                    }
                }
                if($check == 0){
                    $body .= "<h1>No entry exists in the database for the specified email and password.</h1><br>";
                    $body .= "<form action=\"managerLogin.php\" method=\"post\">";
                    $body .= "<input type=\"submit\" value=\"Back\"/>";
                    $body .= "</form>";
                }
            }
            mysqli_free_result($result);
        } else{
            $body = "Retrieving records failed.".mysqli_error($database);
            $body .= "<form action=\"main.php\" method=\"post\">";
            $body .= "<input type=\"submit\" value=\"Return to Main Menu\"/>";
            $body .= "</form>";
        }
    } elseif(isset($_POST["return"])){
        header("Location: main.php");
    } else{
        $body = <<<EOBODY
    <form action="managerLogin.php" method="post">
        <strong>Email: </strong><input type="email" name="email" placeholder="email@email.com"/><br><br>
        <strong>Password: </strong><input type="password" name="password"/><br><br>
        <input type="submit" name="submit" value="Submit"/><br><br>
        <input type="submit" name="return" value="Return to Main Menu"/>
    </form>

EOBODY;
    }

    $page = generatePage($body,"Manager Login");
    echo $page;

?>